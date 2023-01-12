const { createApp } = Vue;

const TMP_Blocks = {
  title: { title: "", type: 'title' },
  desc:  { title: "", type: 'desc' },
  text:  { title: "", type: 'text', text_type: "email" },
  rating:{ title: "", type: 'rating', list: [""] },
  check: { title: "", type: 'check', list: [""] },
};

createApp({

  data: () => ({
    id: 0,
    title: "",
    desc: "",
    select_type_block: "title",
    isSaving: 0,
    blocks: [ { label: "(no label)", show: false, type: 'title', required: 0, title: "" } ]
  }),

  methods: {
    deleteBlock(i) {
      if(this.blocks.length < 2) return;

      this.blocks.splice(i, 1);
    },
    copyBlock(i) {
      const block = Object.assign(this.blocks[i], {});

      this.blocks.splice(i, 0, block);
    },
    addBlock() {
      const block = Object.assign(
        TMP_Blocks[ this.select_type_block ], 
        { label: "(no label)", show: false, required: 0 }
      );

      this.blocks.push( block );
    },

    // Rating ---
    addRatingItem(list) {
      if(list.length > 4) return;

      list.push("");
    },
    deleteRatingItem(list, item) {
      if(list.length < 2) return;

      list.splice(item, 1);
    },

    // Check ---
    addCheckItem(list) {
      if(list.length > 4) return;

      list.push("");
    },
    deleteCheckItem(list, item) {
      if(list.length < 2) return;

      list.splice(item, 1);
    },

    // Button
    saveQuest() {
      const action = this.id ? "update_form" : "create_form"
      this.isSaving = 1

      jQuery.ajax({
        method: "POST",
        url: ajaxurl,
        data: {
          action,
          quest: { 
            id: this.id,
            title: this.title,
            desc: this.desc,
          },
          blocks: Object.assign(this.blocks, {}),
        },
        success: res => { 
          if( res.status !== "success" ) {
            return alert(res.data);
          }
          this.isSaving = 0
        }
      })
    },
  },
  beforeMount () {
    let params = (new URL(document.location)).searchParams; 
    let quest_id = params.get("edit");

    if( !quest_id ) {
      return
    }

    this.id = quest_id

    jQuery.ajax({
      method: "GET",
      url: ajaxurl,
      data: {
        action:"get_form",
        id: quest_id,
      },
      success: res => { 
        if( res.status !== "success" ) {
          return alert(res.data);
        }
        console.log(res);
        this.title  = res.data.quest.title;
        this.desc   = res.data.quest.desc;
        this.blocks = res.data.blocks.map( i => {
          if(i.type === "rating" || i.type === "check") {
            i.list = [];
            if(i.ask_0) i.list.push(i.ask_0);
            if(i.ask_1) i.list.push(i.ask_1);
            if(i.ask_2) i.list.push(i.ask_2);
            if(i.ask_3) i.list.push(i.ask_3);
            if(i.ask_4) i.list.push(i.ask_4);
          }
          return { show: false, ...i };
        });
        console.log(this);
      }
    })
  }
}).mount('#vsfb-builder');

const changeStatus = (input, quest_id) => {
  let newValue = input.value == 0 ? 1 : 0;

  jQuery.ajax({
    method: "POST",
    url: ajaxurl,
    data: {
      action:"change_quest_status",
      id: quest_id,
      status: newValue
    },
    success: res => { 
      if( res.status !== "success" ) {
        return alert(res.data);
      }
      input.value = newValue
      input.check = !!newValue
    }
  })
}

const deleteQuest = quest_id => {
  jQuery.ajax({
    method: "POST",
    url: ajaxurl,
    data: {
      action:"delete_form",
      id: quest_id,
    },
    success: res => {
      if( res.status !== "success" ) {
        return alert(res.data);
      }
      location.reload();
    }
  })
}
// 
