<?php


// Start up the engine
class Form_Builder
{
	public $page_slug;
	public $option_group;
	public $tab;

	/**
	 * This is our constructor
	 *
	 * @return void
	 */
	public function __construct() {
        $this->page_slug = 'form-builder';
        $this->tab = $_GET['tab'] || null;
        
        $this->add_menu_item();
 
		add_action( 'admin_init', array( $this, 'settings' ) );
	}

    public function add_menu_item() {
        add_action('admin_menu', function () {
            add_menu_page(
                'Form Builder',
                'Form Builder',
                'manage_options',
                $this->page_slug,
                array($this, 'create_page'),
                'dashicons-chart-area',
                56
            );
        });
    }

    public function create_page(){
 
	
    }

 
	public function settings(){
		register_setting( $this->option_group, 'number_of_slider_slides', 'absint' );
 
		add_settings_section( 'slider_settings_section_id', '', '', $this->page_slug );
 
		add_settings_field(
			'number_of_slider_slides',
			'Количество слайдов в слайдере',
			array( $this, 'number_input' ),
			$this->page_slug,
			'slider_settings_section_id',
			array(
				'label_for' => 'number_of_slider_slides',
				'class' => 'misha-class',
				'name' => 'number_of_slider_slides',
			)
		);
	}
 
	public function tabs( $args ){
		// check user capabilities
		if ( !current_user_can('manage_options') ) return;

	  

	  ?>
	  <!-- Our admin page content should all be inside .wrap -->
	  <div class="wrap">
	    <!-- Print the page title -->
	    <h1><?= esc_html( get_admin_page_title() ) ?></h1>
	    <!-- Here are our tabs -->
	    <nav class="nav-tab-wrapper">
	      <a href="?page=<?= $this->page_slug ?>" class="nav-tab <?= ( $this->tab === null ) ? 'nav-tab-active' :  '' ?>">Default Tab</a>
	      <a href="?page=<?= $this->page_slug ?>&tab=settings" class="nav-tab <? ( $this->tab === 'settings' ) ?  'nav-tab-active' :  '' ?>">Settings</a>
	      <a href="?page=<?= $this->page_slug ?>&tab=tools" class="nav-tab <? ( $this->tab === 'tools' ) ?  'nav-tab-active'  : '' ?>">Tools</a>
	    </nav>

	    <div class="tab-content">
	    <?php switch($tab) :
	      case 'settings':
	        echo 'Settings'; //Put your HTML here
	        break;
	      case 'tools':
	        echo 'Tools';
	        break;
	      default:
	        echo 'Default tab';
	        break;
	    endswitch; ?>
	    </div>
	  </div>
	  <?php
	}

	public function number_input( $args ){
		// получаем значение из базы данных
		$value = get_option( $args[ 'name' ] );
 
		printf(
			'<input type="number" min="1" id="%s" name="%s" value="%s" />',
			esc_attr( $args[ 'name' ] ),
			esc_attr( $args[ 'name' ] ),
			absint( $value )
		);
 
	}


}






new Form_Builder();
