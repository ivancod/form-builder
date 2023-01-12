<?php

/**
 * VSFB_List class will create the page to load the settings
 */

class VSFB_Front
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

        $form = $this->get_form($id);
        $this->view($form);
	}
    /**
     * View the table data
     *
     * @return String
     */

    public function view($form)
    { 
        $view_path = ABSPATH . 'wp-content/plugins/form-builder/front/views';
        print_r($form);

        require_once ($view_path . '/form.php');
    }

    public function get_form(int $id)
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
    
new VSFB_Front($form_id);