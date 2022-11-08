<?php

/**
 * VSFB_Settings_General class will create the page to load the table
 */

class VSFB_Settings_General
{
    public $view_path = ABSPATH . 'wp-content/plugins/form-builder/admin/views';

    /**
     * Get the table data
     *
     * @return HTML
     */

    public function view()
    { 
        require_once ($this->view_path . '/settings/general.php');
    }
}