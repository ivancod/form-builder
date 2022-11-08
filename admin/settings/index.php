<?php
require_once ( ABSPATH . 'wp-content/plugins/form-builder/inc/Tabs.php' );
require_once __DIR__ . '/General.php';
require_once __DIR__ . '/Email.php';
require_once __DIR__ . '/Styles.php';

/**
 * VSFB_Settings class will create the page to load the settings
 */

class VSFB_Settings
{
    public $view_path = ABSPATH . 'wp-content/plugins/form-builder/admin/views';

	/**
	 * This is our constructor
	 *
	 * @return void
	 */

	public function __construct() 
	{
        $Tabs = new VSFB_Tabs('form-builder-settings', [
            [
                'title' => 'General',
                'content' => new VSFB_Settings_General(),
            ],
            [
                'title' => 'Styles',
                'content' => new VSFB_Settings_Styles(),
            ],
            [
                'title' => 'E-mail',
                'content' => new VSFB_Settings_Email(),
            ],
        ]);

        $this->view($Tabs);
	}

    /**
     * Get the table data
     *
     * @return String
     */

    public function view($Tabs)
    { 
        require_once ($this->view_path . '/settings/index.php');
    }
}
    
new VSFB_Settings();
