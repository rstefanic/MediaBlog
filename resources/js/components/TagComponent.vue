<!-- Vue component -->
<template>
  <div class='d-flex mt-3 tag-container'>
    <label>Tags</label>
    <multiselect 
      v-model="value" 
      tag-placeholder="Add this as new tag" 
      placeholder="Search or add a tag" label="name" 
      track-by="code" 
      :options="options" 
      :multiple="true" 
      :taggable="true" 
      @tag="addTag"
    ></multiselect>
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect';

export default {
  components: {
    Multiselect
  },
  data () {
    return {
      value: [],
      options: []
    }
  },
  mounted: function() {
    axios.get('/tags/all')
      .then(({ data }) => {
        this.options = data.map(tag => {
          return { name: tag.name, code: tag.id };
        })
      });
  },
  methods: {
    addTag (newTag) {
      axios.post('/tags', { name: newTag })
        .then(({ data }) => {
          const tag = {
            name: newTag,
            code: data
          };

          this.options.push(tag)
          this.value.push(tag)
        })
        .catch(err => {
          alert("An unexpected error occurred. Could not create new tag.");
        });
    }
  }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>
  div.tag-container {
    height: 40px;
  }

  label {
    margin-top: 0.5rem;
  }
</style>
