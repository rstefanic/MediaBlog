<template>
    <div class="article-card col-md-4">
        <div class="article-img">
            <a v-bind:href="slug">
                <img class="article-img" v-bind:src="article_img" alt="Image of article">
                <h3>{{ article_title }}</h3>
                <p>{{ summary }}</p>
                <p>{{ author }}</p>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['article_title', 'article_img', 'author', 'summary', 'slug']
    }
</script>

<style scoped>
    img {
        display: block;
    }
</style>
