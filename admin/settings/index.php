<?php
require_once ( ABSPATH . 'wp-content/plugins/form-builder/inc/Tabs.php' );
require_once __DIR__ . '/General.php';
require_once __DIR__ . '/Email.php';

$General = new VSFB_General();
$Email   = new VSFB_Email();

$Tabs = new VSFB_Tabs('form-builder-settings', [
    [ 'title' => 'General', 'content' => $General->view() ],
    [ 'title' => 'E-mail', 'content' => $Email->view() ],
]);

?>

<div class="wrap">
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>

    <? $Tabs->display() ?>
</div>