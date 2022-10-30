<?php

/**
 * VSFB_Settings_General class will create the page to load the table
 */

class VSFB_Settings_General
{
    /**
     * Get the table data
     *
     * @return HTML
     */

    public function view()
    { 
        require_once (ABSPATH . 'wp-content/plugins/form-builder/admin/views/settings/general.php');
    }
}