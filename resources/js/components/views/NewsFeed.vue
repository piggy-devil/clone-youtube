<template>
    <div class="flex flex-col items-center py-4">

        <Product />

        <NewPost />


        <!-- <p v-if="loading">Loading posts...</p> -->
        <p v-if="newsStatus.postsStatus === 'loading'">Loading posts...</p>

        <div v-else-if="posts == null">No posts found. Get started...</div>

        <!-- <Post v-else v-for="post in posts.data" :key="'post' + post.data.post_id" :post="post" /> -->
        <Post v-else v-for="(post, postKey) in posts.data" :key="postKey" :post="post" />
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import NewPost from '../posts/NewPost';
    import Post from '../posts/Post';
    import Product from '../products/Product';

    export default {
        name: "NewsFeed",

        components: {
            NewPost,
            Post,
            Product
        },

        mounted() {
            this.$store.dispatch('fetchNewsPosts');
        },

        computed: {
            ...mapGetters({
                posts: 'posts',
                newsStatus: 'newsStatus',
            })
        }
    }
</script>

<style scoped>
</style>
