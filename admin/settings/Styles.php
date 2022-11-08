<?php

/**
 * VSFB_Styles class will create the page to load the table
 */

class VSFB_Settings_Styles
{
    public $view_path = ABSPATH . 'wp-content/plugins/form-builder/admin/views';

    /**
     * Get the table data
     *
     * @return String
     */

    public function view()
    { 
        require_once ($this->view_path . '/settings/styles.php');
    }
}