<?php

/**
 * VSFB_Settings_General class will create the page to load the table
 */

class VSFB_Settings_General
{
    public $view_path = ABSPATH . 'wp-content/plugins/form-builder/admin/views';
    
	/**
	 * This is our constructor
	 *
	 * @return void
	 */
	
    public function __construct()
    {
        $this->add_endpoints();
    }

	public function add_endpoints()
	{
		if( !isset($_POST['save_settings']) ) return;

        global $wpdb;

        try {
            foreach($_POST['form'] as $key => $val) {
                $wpdb->replace($wpdb->prefix . "fb_settings", [ 
                    'key' => $key,
                    'val' => $val,
                ]);  
            }
        } catch (Exception $err) {
            print_r($err);
        }
	}

    public function get_data($val_array)
    {
        global $wpdb;

        $TABLE = $wpdb->prefix . "fb_settings";
        $val   = implode("', '", $val_array); 

        try {
            $data = $wpdb->get_results("SELECT `key`, `val` FROM $TABLE WHERE `key` IN ( '$val' )"); 
        } catch (Exception $err) {
            print_r($err);
        }

        $result = [];
        foreach($data as $item) {
            $result[ $item->key ] = $item->val;
        }

        return $result;
    }

    /**
     * View the table data
     *
     * @return HTML
     */

    public function view()
    { 
        $data = $this->get_data([
            'email',
            'email_notify',
        ]);

        require_once ($this->view_path . '/settings/general.php');
    }
}