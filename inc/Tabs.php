<?php

/**
 * FB_Tabs class will create the tabs
 */

class FB_Tabs
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
		<div class="tab-wrap">
            <nav class="nav-tab-wrapper">
			    <? $this->nav() ?>
			</nav>

			<div class="tab-content">
				<? $this->content() ?>
			</div>
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
		echo $this->data[ $this->current ]['content'];
	}
}
