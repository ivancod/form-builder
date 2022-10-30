<div class="privacy-settings-header" style="margin-left: -20px">
    <div class="privacy-settings-title-section">
        <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    </div>
</div>

<div class="tab-wrap">
    <nav class="nav-tab-wrapper">
        <? $Tabs->nav() ?>
    </nav>
</div>

<div class="tab-content">
    <? $Tabs->content()->view() ?>
</div>