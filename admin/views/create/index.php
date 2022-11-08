<div class="privacy-settings-header" style="margin-left: -20px">
    <div class="privacy-settings-title-section">
        <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    </div>
</div>

<div id="vsfb-builder" class="flex jc-c">
    <form action="">
        <table class="form-table" role="presentation">
            <tbody>
                <tr class="form-field form-required">
                    <th scope="row"><label for="title">Title<span class="description"> *</span></label></th>
                    <td><input type="text" v-model="title"></td>
                </tr>
                <tr class="form-field">
                    <th scope="row"><label for="desc">Description<span class="description"></span></label></th>
                    <td><textarea name="desc"  v-model="desc"></textarea></td>
                </tr>
            </tbody>
        </table>
        <pre style="position: absolute;left: 0;">{{ blocks }}</pre>
        
        <hr>
        <h2> -- Questions -- </h2>
        <div class="wrap-blocks" v-for="(block, index) in blocks">
            <section class="block block-title">
                <!------------------------ TITLE ------------------------>
                <div class="block-head flex">
                    <h4 class="title">{{ index + 1 }} Block {{ block.type }}</h4>
                    <span class="delete" @click="deleteBlock(index)"> <span class="dashicons dashicons-trash"></span> </span>
                    <span class="copy" @click="copyBlock(index)">Copy <span class="dashicons dashicons-copy"></span></span>
                    <span class="dashicons-before dashicons-arrow-{{ block.show ? 'down' : 'up' }}-alt2" @click="block.show = !block.show"></span>
                </div>

                <!------------------------ CONTENT ------------------------>
                <div class="block-content" v-if="block.show">
                    <div class="text"  v-if="block.type === 'title'">
                        <? require_once ($view_path . '../blocks/title.php') ?>
                    </div>
                    <div class="text"  v-if="block.type === 'desc'">
                        <? require_once ($view_path . '../blocks/desc.php') ?>
                    </div>
                    <div class="text"  v-if="block.type === 'text'">
                        <? require_once ($view_path . '../blocks/text.php') ?>
                    </div>
                    <div class="text"  v-if="block.type === 'rating'">
                        <? require_once ($view_path . '../blocks/rating.php') ?>
                    </div>
                    <div class="text"  v-if="block.type === 'check'">
                        <? require_once ($view_path . '../blocks/check.php') ?>
                    </div>
                </div>
            </section>
        </div>

        
        <div class="privacy-settings-title-section">
            <label for="page_for_privacy_policy">Select the type of block</label>
            <select style="margin:10px 15px" v-model="select_type_block">
                <option value="title">Title</option>
                <option value="desc">Description</option>
                <option value="text">Text field</option>
                <option value="rating">Rating</option>
                <option value="check">Checkboxes</option>
            </select>
            <div @click="addBlock" class="button button-primary">Add block</div>
        </div>
    </form>

</div>