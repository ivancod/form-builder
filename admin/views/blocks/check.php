<div class="block-check">
    <label>
        <p>Field Label</p>
        <input type="text" v-model="block.label">
    </label>
    <label>
        <p>Field Question <sup>*</sup></p>
        <input type="text" v-model="block.title">
    </label>
    <hr>
    <ul class="list">
        <li class="flex" v-for="(item, index) in block.list">
            <p class="item-title flex ai-c">
                <b>{{index + 1}}. </b>
                <input type="text" v-model="block.list[index]">
                <span class="dashicons dashicons-no" @click="deleteCheckItem(block.list, index)"></span>
            </p>
        </li>
    </ul>
    <div class="flex jc-c">
        <div @click="addCheckItem(block.list)" class="add-item">
            Add item
            <span class="dashicons dashicons-plus-alt2"></span>
        </div>
    </div>
</div>