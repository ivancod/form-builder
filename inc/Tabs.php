<?php

/**
 * FB_Tabs class will create the tabs
 */

class VSFB_Tabs
{
	public $current = 0;
	public $page;
	public $data;
	
	/**
	 * This is our constructor
	 *
	 * @return void
	 */

	public function __construct( $page, $data ) 
	{
        $this->page = $page;
        $this->data = $data;
        $this->current = isset( $_GET['tab'] ) ? (int) $_GET['tab'] : 0;
	}
 
	/**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Void
     */

	public function display() 
	{
	  	?>
		<div class="privacy-settings-header">
			<div class="privacy-settings-title-section">
				<h1>Privacy</h1>
			</div>

			<nav class="privacy-settings-tabs-wrapper hide-if-no-js" aria-label="Secondary menu">
			    <? $this->nav() ?>
			</nav>
		</div>
		<div class="tab-content">
			<? $this->content() ?>
		</div>
	  	<?
	}

	/**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Void
     */

	public function nav() 
	{
		for($i = 0; $i < count( $this->data ); $i++) { ?>
            <a href="?page=<?= $this->page ?>&tab=<?= $i ?>" class="nav-tab <?= ($this->current === $i) ? 'nav-tab-active' : '' ?>"> 
				<?= $this->data[ $i ]['title'] ?>
			</a>
		<? }
	}

	/**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Void
     */

	public function content() 
	{
		return $this->data[ $this->current ]['content'];
	}
}
