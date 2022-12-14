<div class="privacy-settings-header" style="margin-left: -20px">
    <div class="privacy-settings-title-section">
        <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    </div>
</div>

<div id="vsfb-builder" class="flex jc-c">
    <div @click="saveQuest" class="button button-primary">Save</div>
    <form action="">
        <label>
            <p>Title <sup>*</sup></p>
            <input type="text" v-model="title">
        </label>
        <label>
            <p>Description</p>
            <textarea v-model="desc" ></textarea>
        </label>
        <br><br>
        <hr>
        <br>
        <!-- <pre style="position: absolute;left: 0;">{{ blocks }}</pre> -->
        
        <div class="wrap-blocks" >
            <div class="head">
                <span>Form Questions</span>
            </div>
            <section class="block" 
                v-bind:class="block.show ? 'active' : ''" 
                v-for="(block, index) in blocks">
                <!------------------------ TITLE ------------------------>
                <div class="block-head flex">
                    <div class="actions">
                        <h4 class="title" @click="blocks[index].show = true">{{ index + 1 }}  {{ block.label }}</h4>
                        <div class="flex">
                            <span class="delete" @click="copyBlock(index)">Duplicate</span>
                            <span class="copy" @click="deleteBlock(index)">Delete</span>
                        </div>
                    </div>
                    <span class="dashicons-before" v-bind:class="blocks[index].show ? 'dashicons-arrow-up-alt2' : 'dashicons-arrow-down-alt2'" @click="blocks[index].show = !blocks[index].show"></span>
                </div>

                <!------------------------ CONTENT ------------------------>
                <div class="block-content" v-if="blocks[index].show">
                    <div class="text" v-if="block.type === 'title'">
                        <? require_once ($view_path . '../blocks/title.php') ?>
                    </div>
                    <div class="text" v-if="block.type === 'desc'">
                        <? require_once ($view_path . '../blocks/desc.php') ?>
                    </div>
                    <div class="text" v-if="block.type === 'text'">
                        <? require_once ($view_path . '../blocks/text.php') ?>
                    </div>
                    <div class="text" v-if="block.type === 'rating'">
                        <? require_once ($view_path . '../blocks/rating.php') ?>
                    </div>
                    <div class="text" v-if="block.type === 'check'">
                        <? require_once ($view_path . '../blocks/check.php') ?>
                    </div>
                    <hr>
                    <div class="block-footer flex">
                        <div @click="blocks[index].show = false" class="button button-primary">Close Block</div>
                    </div>
                </div>
            </section>
        </div>
        
        <div class="wrap-add-block flex jc-c ai-c">
            <label for="page_for_privacy_policy">Select the type of block</label>
            <select  v-model="select_type_block">
                <option value="title">Title</option>
                <option value="desc">Description</option>
                <option value="text">Text field</option>
                <option value="rating">Rating</option>
                <option value="check">Checkboxes</option>
            </select>
            <div @click="addBlock" class="button button-primary add-quest" style="margin-bottom: 0px;">Add block</div>
        </div>
    </form>

</div>
