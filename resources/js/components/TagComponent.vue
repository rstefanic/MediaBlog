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
      value: [
        { name: 'Simpsons', code: '2' }
      ],
      options: [
        { name: 'Story Arcs', code: '1' },
        { name: 'Simpsons', code: '2' },
        { name: 'Criticism', code: '3' }
      ]
    }
  },
  methods: {
    addTag (newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      this.options.push(tag)
      this.value.push(tag)
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
