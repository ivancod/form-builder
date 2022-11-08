<?php

/**
 * VSFB_Email class will create the page to load the table
 */

class VSFB_Settings_Email
{
    public $view_path = ABSPATH . 'wp-content/plugins/form-builder/admin/views';

    /**
     * Get the table data
     *
     * @return String
     */

    public function view()
    { 
        require_once ($this->view_path . '/settings/email.php');
    }
}