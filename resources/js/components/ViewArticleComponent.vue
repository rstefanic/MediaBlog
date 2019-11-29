<template>
    <div class="article-container">
        <div class="hero" v-bind:style="heroImageStyle">
            <div class="hero-text">
                <h1>{{ this.title }}</h1>
                <h2>{{ this.summary }}</h2>
                <h4>By: {{ this.author }}</h4>
                <div class="apporx-read-time">
                    Approximate Reading Time: {{ readingTime }} minutes
                </div>
            </div>
        </div>
        <div class="article-body container py-4" v-html="this.body">
        </div>
    </div>
 </template>

<script>
    export default {
        props: ['title', 'summary', 'author', 'main_img', 'body'],

        computed: {
            readingTime: function() {
                const WPM = 200;

                let textLength = this.body.split(' ').length;

                if (textLength > 0) {
                    return Math.ceil(textLength / WPM);
                }

                return 0;
            },

            heroImageStyle: function() {
                return { 
                    "background-image": "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('" + this.main_img + "')" 
                }; 
            }
        }
    }
</script>

<style scoped>
    .apporx-read-time {
        color: #eee;
        font-style: italic;
        font-size: 1.3em;
        margin-bottom: 1%;
    }
</style>