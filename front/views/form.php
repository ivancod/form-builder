
<div id="vsfb-builder" class="flex jc-c">
    <form action="">
        <div class="wrap-blocks" >
            <div class="head">
                <span><?= $form['quest']['title'] ?></span>
                <br>
                <span><?= $form['quest']['desc'] ?></span>
            </div>
            <section class="block" >
                <!------------------------ CONTENT ------------------------>
                <? foreach($form['blocks'] as $block) { ?>
                    <div class="block-content">
                    <? 
                        if($block['type'] == 'title') {
                            require_once ($view_path . '/blocks/title.php');
                        }
                        if($block['type'] == 'desc') {
                            require_once ($view_path . '/blocks/desc.php');
                        }
                        if($block['type'] == 'text') {
                            require_once ($view_path . '/blocks/text.php');
                        }
                        if($block['type'] == 'rating') {
                            require_once ($view_path . '/blocks/rating.php'); 
                        }
                        if($block['type'] == 'check') {
                            require_once ($view_path . '/blocks/check.php');
                        }
                    ?>
                    </div>
                <? } ?>
            </section>
        </div>
        <div @click="saveQuest" class="button button-primary saveQuest">Send</div>
    </form>
</div>
