<template>
    <div>
        <div class="apporx-read-time">
            Approximate Reading Time: {{ readingTime }} minutes
        </div>
        <div class="article-body" v-html="body">
            {{ this.body }}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['body'],

        computed: {
            readingTime: function() {
                const WPM = 200;

                let textLength = this.body.split(' ').length;

                if (textLength > 0) {
                    return Math.ceil(textLength / WPM);
                }

                return 0;
            }
        }
    }
</script>

<style scoped>
    .apporx-read-time {
        color: #999;
        font-style: italic;
        font-size: 1.3em;
        margin-bottom: 1%;
    }
</style>