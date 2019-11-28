<template>
    <div class="panel-body">
        <div class="d-flex align-items-center">
            <img class="user-picture" v-bind:src="profile_picture" alt="Commentator's profile picture">
            <textarea class="form-control" type="text" placeholder="Leave a comment..." v-model="comment"></textarea>
        </div>
        <br>
        <button class="btn btn-info float-right" @click="postComment">Comment</button>
        <div class="clearfix"></div>
    </div>
</template>

<script>
    export default {
        props: ['articleId', 'profile_picture', 'username'],

        data() {
            return {
                comment: ''
            }
        },

        methods: {
            postComment() {
                axios.post('/comment/' + this.articleId, {comment: this.comment})
                    .then(response => {
                        window.location.reload();
                    })
                    .catch(errors => {
                        if (errors.response.status === 401) {
                            window.location = '/login';
                        }
                    });
            }
        }
    }
</script>

<style scoped>
    img.user-picture {
        border-radius: 10px;
        max-width: 50px;
        margin-right: 2%;
    }

    textarea {
        resize: none;
    }
</style>
