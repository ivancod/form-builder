<?php

/**
 * VSFB_Email class will create the page to load the table
 */

class VSFB_Settings_Email
{
    /**
     * Get the table data
     *
     * @return String
     */

    public function view()
    { 
        require_once (ABSPATH . 'wp-content/plugins/form-builder/admin/views/settings/email.php');
    }
}