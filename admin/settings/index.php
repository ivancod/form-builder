<?php
require_once ( ABSPATH . 'wp-content/plugins/form-builder/inc/Tabs.php' );
require_once __DIR__ . '/General.php';
require_once __DIR__ . '/Email.php';

$General = new VSFB_General();
$Email   = new VSFB_Email();

$Tabs = new VSFB_Tabs('form-builder-settings', [
    [ 'title' => 'General', 'content' => $General ],
    [ 'title' => 'E-mail', 'content' => $Email ],
]);

?>

    

<div class="privacy-settings-header" style="margin-left: -20px">
    <div class="privacy-settings-title-section">
        <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    </div>

    <nav class="privacy-settings-tabs-wrapper hide-if-no-js" aria-label="Secondary menu">
        <? $Tabs->nav() ?>
    </nav>
</div>

<div class="tab-content">
    <? $Tabs->content()->view() ?>
</div>


