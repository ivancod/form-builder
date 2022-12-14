<div class="block-rating">
    <label>
        <p>Field Label</p>
        <input type="text" v-model="block.label">
    </label>
    <label>
        <p>Field Question <sup>*</sup></p>
        <input type="text" v-model="block.title">
    </label>
    <hr>
    <p class="items-label">Answers to the question</p>
    <ul class="list">
        <li class="flex" v-for="(item, index) in block.list">
            <p class="item-title flex ai-c">
                <b>{{index + 1}}. </b>
                <input type="text" v-model="block.list[index]">
                <span class="dashicons dashicons-no" @click="deleteRatingItem(block.list, index)"></span>
            </p>
            <span class="item-icons flex jc-c ai-c">
                <span class="dashicons dashicons-star-empty"></span>
                <span class="dashicons dashicons-star-empty"></span>
                <span class="dashicons dashicons-star-empty"></span>
                <span class="dashicons dashicons-star-empty"></span>
                <span class="dashicons dashicons-star-empty"></span>
            </span>
        </li>
    </ul>
    <div class="flex jc-c">
        <div @click="addRatingItem(block.list)" class="add-item">
            Add item
            <span class="dashicons dashicons-plus-alt2"></span>
        </div>
    </div>
</div>