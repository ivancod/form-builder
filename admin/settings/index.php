<?php
require_once ( ABSPATH . 'wp-content/plugins/form-builder/admin/Tabs.php' );
require_once __DIR__ . '/General.php';
require_once __DIR__ . '/Email.php';

$General = new VS_General();
$Email   = new VS_Email();

$Tabs = new FB_Tabs('form-builder-settings', [
    [ 'title' => 'General', 'content' => $General->view() ],
    [ 'title' => 'E-mail', 'content' => $Email->view() ],
]);

?>

<div class="wrap">
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>

    <? $Tabs->display() ?>
</div>