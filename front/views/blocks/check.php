<div class="block-check">
    <p>Field Question</p>
    <hr>
    <ul class="list">
        <li class="flex" v-for="(item, index) in block.list">
            <p class="item-title flex ai-c">
                <b>{{index + 1}}. </b>
                <span class="dashicons dashicons-no" @click="deleteCheckItem(block.list, index)"></span>
            </p>
        </li>
    </ul>
</div>