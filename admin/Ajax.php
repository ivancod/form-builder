<?php

// Start up the engine
class VS_Ajax
{
    public $quest        = 'fb_quest';
    public $quest_blocks = 'fb_quest_blocks';
    public $block_title  = 'fb_block_title';
    public $block_desc   = 'fb_block_desc';
    public $block_text   = 'fb_block_text';
    public $block_rating = 'fb_block_rating';
	public $block_check  = 'fb_block_check';
	
	/**
	 * This is our constructor
	 *
	 * @return void
	 */
	
	public function __construct() 
	{
        global $wpdb;
        $pr = $wpdb->prefix;

        $this->quest        = $pr . $this->quest;
        $this->quest_blocks = $pr . $this->quest_blocks;
        $this->block_title  = $pr . $this->block_title;
        $this->block_desc   = $pr . $this->block_desc;
        $this->block_text   = $pr . $this->block_text;
        $this->block_rating = $pr . $this->block_rating;
        $this->block_check  = $pr . $this->block_check;

        $this->form_actions();
        $this->setting_actions();
	}

    public function form_actions()
	{   
        // CREATE
        add_action( 'wp_ajax_nopriv_create_form', array($this, 'create_form') );
        add_action( 'wp_ajax_create_form', array($this, 'create_form') );
        // GET
        add_action( 'wp_ajax_nopriv_get_form', array($this, 'get_form') );
        add_action( 'wp_ajax_get_form', array($this, 'get_form') );
        // UPDATE
        add_action( 'wp_ajax_nopriv_update_form', array($this, 'update_form') );
        add_action( 'wp_ajax_update_form', array($this, 'update_form') );
        // DELETE
        add_action( 'wp_ajax_nopriv_delete_form', array($this, 'delete_form') );
        add_action( 'wp_ajax_delete_form', array($this, 'delete_form') );
    }

    public function create_form()
	{
        global $wpdb;
        global $wpdbx;

        $title  = $_POST['quest']['title'];
        $desc   = $_POST['quest']['desc'];
        $blocks = $_POST['blocks'];
        $user_id = get_current_user_id();

        try {
            $wpdb->insert( $this->quest, [
                'title' => $title,
                'desc' => $desc,
                'user_id' => $user_id,
                'cteated_at' => time(),
            ]);
        } catch (Exception $err) {
            wp_send_json([ 'status' => 'error', 'data' => $err ]);
        }

        $quest_id = $wpdb->insert_id;

        $quest_blocks = [];
        foreach($blocks as $block) {
            $tmp_block = [
                'label'     => $block['label'],
                'title'     => $block['title'],
                'quest_id'  => $quest_id,
            ];

            switch( $block['type'] ) {
                case 'text':
                    $tmp_block['required'] = $block['required'] ?? '';
                    $tmp_block['type'] = $block['text_type'];
                break;
                case 'rating':
                    $tmp_block['required'] = $block['required'] ?? '';
                    $tmp_block['ask_0'] = $block['list'][0] ?? '';   
                    $tmp_block['ask_1'] = $block['list'][1] ?? '';
                    $tmp_block['ask_2'] = $block['list'][2] ?? '';
                    $tmp_block['ask_3'] = $block['list'][3] ?? '';
                    $tmp_block['ask_4'] = $block['list'][4] ?? '';
                break;
                case 'check':
                    $tmp_block['required'] = $block['required'] ?? '';
                    $tmp_block['ask_0'] = $block['list'][0] ?? '';
                    $tmp_block['ask_1'] = $block['list'][1] ?? '';
                    $tmp_block['ask_2'] = $block['list'][2] ?? '';
                    $tmp_block['ask_3'] = $block['list'][3] ?? '';
                    $tmp_block['ask_4'] = $block['list'][4] ?? '';
                break;
            }

            try {
                $wpdb->insert($this->{'block_' . $block['type']}, $tmp_block);
            } catch (Exception $err) {
                wp_send_json([ 'status' => 'error', 'data' => $err ]);
            }

            $quest_blocks[] = [
                'block_id' => $wpdb->insert_id,
                'quest_id' => $quest_id,
                'type' => $block['type'],
            ];
        }

        try {
           $wpdbx->insert_multiple( $this->quest_blocks, $quest_blocks );
        } catch (Exception $err) {
            wp_send_json([ 'status' => 'error', 'data' => $err ]);
        }

        wp_send_json([ 'status' => 'success' ]);
        wp_die(); 
    }

    public function update_form()
	{
        global $wpdb;
        global $wpdbx;

        $title  = $_POST['quest']['title'];
        $desc   = $_POST['quest']['desc'];
        $blocks = $_POST['blocks'];
        $user_id = get_current_user_id();

        try {
            $wpdb->insert( $this->quest, [
                'title' => $title,
                'desc' => $desc,
                'user_id' => $user_id,
                'cteated_at' => time(),
            ]);
        } catch (Exception $err) {
            wp_send_json([ 'status' => 'error', 'data' => $err ]);
        }
        
        $quest_id = $wpdb->insert_id;

        $quest_blocks = [];
        foreach($blocks as $block){
            $tmp_block = [
                'label'     => $block['label'],
                'title'     => $block['title'],
                'quest_id'  => $quest_id,
            ];

            switch($block['type']) {
                case 'text':
                    $tmp_block['required'] = $block['required'] ?? '';
                    $tmp_block['type'] = $block['text_type'];
                break;
                case 'rating':
                    $tmp_block['required'] = $block['required'] ?? '';
                    $tmp_block['ask_0'] = $block['list'][0] ?? '';   
                    $tmp_block['ask_1'] = $block['list'][1] ?? '';
                    $tmp_block['ask_2'] = $block['list'][2] ?? '';
                    $tmp_block['ask_3'] = $block['list'][3] ?? '';
                    $tmp_block['ask_4'] = $block['list'][4] ?? '';
                break;
                case 'check':
                    $tmp_block['required'] = $block['required'] ?? '';
                    $tmp_block['ask_0'] = $block['list'][0] ?? '';   
                    $tmp_block['ask_1'] = $block['list'][1] ?? '';
                    $tmp_block['ask_2'] = $block['list'][2] ?? '';
                    $tmp_block['ask_3'] = $block['list'][3] ?? '';
                    $tmp_block['ask_4'] = $block['list'][4] ?? '';
                break;
            }

            try {
               $wpdb->insert($this->{'block_' . $block['type']}, $tmp_block);
            } catch (Exception $err) {
                wp_send_json([ 'status' => 'error', 'data' => $err ]);
            }

            $quest_blocks[] = [
                'block_id' => $wpdb->insert_id,
                'quest_id' => $quest_id,
                'type' => $block['type'],
            ];
       
        }

        try {
           $wpdbx->insert_multiple( $this->quest_blocks, $quest_blocks );
        } catch (Exception $err) {
            wp_send_json([ 'status' => 'error', 'data' => $err ]);
        }

        wp_send_json([ 'status' => 'success' ]);
        wp_die(); 
    }

    public function get_form()
	{
        global $wpdb;

        $res = $this->get_quest( $_GET['id'] );

        wp_send_json([ 'status' => 'success', 'data' => $res ]);
        wp_die(); 
    }

    public function delete_form()
	{
        // $_POST['data']
        wp_send_json([ 'post' => $_POST, 'get' => $_GET ]);
        wp_die();
    }

    // ---------------------------------------------------------------

    public function setting_actions()
	{
        // CREATE
        // add_action( 'wp_ajax_nopriv_create_form', array($this, 'create_form') );
        // add_action( 'wp_ajax_create_form', array($this, 'create_form') );
    }


    public function get_quest(int $id)
    {
        if( !$id ) return [];

        global $wpdb;

        $result = [
            'quest'  => $wpdb->get_row("SELECT * FROM {$this->quest} WHERE id = $id", ARRAY_A),
            'blocks' => $wpdb->get_results("SELECT * FROM {$this->quest_blocks} WHERE quest_id = $id"),
        ];

        $blocks = [];
        foreach($result['blocks'] as $block) {
            $db_responce = $wpdb->get_row("SELECT * FROM " . $this->{'block_' . $block->type} . " WHERE id = " . $block->block_id, ARRAY_A);
            $db_responce['type'] = $block->type;
            $blocks[] = $db_responce;
        }

        $result['blocks'] = $blocks;

        return $result;
    }
}

new VS_Ajax();
