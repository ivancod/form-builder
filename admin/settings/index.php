<?php
require_once ( ABSPATH . 'wp-content/plugins/form-builder/admin/inc/Tabs.php' );

$Tabs = new FB_Tabs('form-builder-settings', [
    [ 'title' => 'General', 'content' => 'General' ],
    [ 'title' => 'E-mail', 'content' => 'email' ],
]);

?>

<div class="wrap">
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>

    <? $Tabs->display() ?>
</div>