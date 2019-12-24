<template>
    <div>
        <div v-if="showModal">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Preview Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" @click="showModal = false">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" v-html="this.body">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="showModal = false">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </transition>
        </div>
        <button type="button" class="btn btn-info" @click="preview">Preview Post In Window</button>
    </div>
 </template>

<script>
    export default {
        data: function() {
           return { 
                showModal: false,
                body: ""
            };
        },

        methods: {
            preview: function() {
                this.showModal = true;
                const body = document.getElementById("body").value;

                axios.post('/article/preview', { body: body })
                    .then(({ data }) => {
                        this.body = data;
                    })
                    .catch(errors => {
                        if (errors.response.status !== 200) {
                            this.body = "Could not generate preview from Markdown given."
                        }
                    });
            }
        }
    }
</script>

<style>
    .modal-dialog {
      max-width: 800px;
    }

    .modal-content {
      max-height: 800px;
      overflow-y: auto;
    }

    .modal-mask {
      position: fixed;
      z-index: 9998;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, .5);
      display: table;
      transition: opacity .3s ease;
    }

    .modal-wrapper {
      display: table-cell;
      vertical-align: middle;
    }

    img {
      display: block;
      margin: 0 auto;
      max-width: 100%;
    }
</style>