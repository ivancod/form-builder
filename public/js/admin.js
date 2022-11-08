const { createApp } = Vue;

const TMP_Blocks = {
  title: { 
    show: true,
    type: 'title',
    required: false,
    value: "",
  },
  desc: {
    show: true,
    type: 'desc',
    value: "",
  },
  rating: {
    show: true,
    type: 'rating',
    title: "",
    list: [ "" ],
  },
  text: {
    show: true,
    type: 'text',
    title: "",
    text_type: "email",
  },
  check:{
    show: true,
    type: 'check',
    title: "",
    list: [ "" ],
  },
};

createApp({
  data() {
    return {
      title: "заголовок",
      desc: "desc",
      select_type_block: "title",
      blocks: [ { show: true, type: 'title', required: false, value: "" } ]
    }
  },
  methods: {
    deleteBlock(i) {
      if(this.blocks.length < 2) return;

      this.blocks.splice(i, 1);
    },
    copyBlock(i) {
      this.blocks.splice(i, 0, this.blocks[i])
    },
    addBlock() {
      const block = Object.assign(TMP_Blocks[ this.select_type_block ], {})

      this.blocks.push( block );
    },

    // Rating ---
    addRatingItem(list) {
      if(list.length > 9) return;

      list.push("");
    },
    deleteRatingItem(list, item) {
      if(list.length < 2) return;

      list.splice(item, 1);
    },

    // Check ---
    addCheckItem(list) {
      if(list.length > 9) return;

      list.push("");
    },
    deleteCheckItem(list, item) {
      if(list.length < 2) return;

      list.splice(item, 1);
    },
  }
}).mount('#vsfb-builder')