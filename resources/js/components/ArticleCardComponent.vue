<template>
    <div class="article-card col-md-4">
        <div class="article-card-contents">
            <a v-bind:href="slug">
                <div class='article-img' v-bind:style="articleImageBackground"></div>
                <h3>{{ article_title }}</h3>
                <p>{{ summary }}</p>
                <p>{{ author }}</p>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['article_title', 'article_img', 'author', 'summary', 'slug'],

        computed: {
            articleImageBackground: function() {
                return "background-image: url(" + this.article_img + ")";
            },

            altImgText: function() {
                return "Image for " + this.article_title;
            }
        }
    }
</script>

<style scoped>
    .article-card {
        margin: 0;
        height: 500px;
        max-height: 500px;
        color: black;
    }

    .article-card-contents {
        padding: 2% 3%;
    }

    .article-card a {
        color: black;
    }

    .article-card a:hover {
        text-decoration: none;
    }

    .article-img {
        max-height: 250px;
        height: 250px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin-bottom: 6%;
        overflow: hidden;
        transition: transform .2s;
        object-fit: cover;
    }

    .article-img:hover {
        transform: scale(1.1);
    }
</style>
