<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="privacy-settings-header" style="margin-left: -20px">
    <div class="privacy-settings-title-section">
        <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    </div>
</div>

<div id="vsfb-builder" class="flex jc-c">
    <form action="">
        <div 
            @click="saveQuest"
            class="button button-primary saveQuest"
        >
            <div v-if="isSaving === 1" class="spinner-border text-primary" role="status" ></div>
            <!-- <div v-if="isSaving === 2" class="spinner-border text-primary" role="status" ></div> -->
            Save
        </div>
        <br>
        <div class="flex fd-c">
            <label>
                <h6>Title <sup>*</sup></h6>
                <input type="text" v-model="title">
            </label>
            
            <label>
            <br>
                <h6>Description</h6>
                <textarea v-model="desc" ></textarea>
            </label>
        </div>
        <hr>
        <div class="wrap-blocks" >
            <div class="head">
                <h5>Form Questions</h5>
            </div>
            <section class="block" 
                v-bind:class="block.show ? 'active' : ''" 
                v-for="(block, index) in blocks">
                <!------------------------ TITLE ------------------------>
                <div class="block-head flex">
                    <div class="block-number">{{ index + 1 }}</div>
                    <div class="actions">
                        <h6 class="title" @click="blocks[index].show = true">{{ block.label }}</h6>
                        <div class="flex">
                            <span class="delete" @click="copyBlock(index)">Duplicate</span>
                            <span class="copy" @click="deleteBlock(index)">Delete</span>
                        </div>
                    </div>
                    <span
                        class="dashicons-before dashicons-arrow-up-alt2"
                        v-bind:class="blocks[index].show ? 'arrow-up' : 'arrow-down'"
                        @click="blocks[index].show = !blocks[index].show"
                    ></span>
                </div>

                <!------------------------ CONTENT ------------------------>
                <Transition name="slide-fade">
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
                </Transition>
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
            <div @click="addBlock" class="button button-primary add-block" style="margin-bottom: 0px;">Add block</div>
        </div>
    </form>

</div>
