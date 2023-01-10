<?php

/**
 * VSFB_Styles class will create the page to load the table
 */

class VSFB_Settings_Styles
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
        if( !isset($_POST['save_styles']) ) return;

        global $wpdb;

        try {
            $wpdb->replace($wpdb->prefix . "fb_settings", $_POST['form']);  
        } catch (Exception $err) {
            print_r($err);
        }
    }

    public function get_data($fields_array)
    {
        global $wpdb;

        $SETTINGS   = $wpdb->prefix . "fb_settings";
        $fields_str = implode(", ", $fields_array); 
        $result = [];

        try {
            $data = $wpdb->get_results("SELECT key, val FROM $SETTINGS WHERE key IN( $fields_str )"); 
        } catch (Exception $err) {
            print_r($err);
        }

        foreach($data as $item) {
            $result[ $item->key ] = $item->val;
        }

        return $result;
    }

    /**
     * View the table data
     *
     * @return String
     */

    public function view()
    { 
        $data = $this->get_data([ 'styles' ]);

        require_once ($this->view_path . '/settings/styles.php');
    }
}