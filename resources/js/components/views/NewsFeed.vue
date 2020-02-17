<template>
    <div class="flex flex-col items-center py-4">

        <Product />

        <NewPost />

        <p v-if="loading">Loading posts...</p>

        <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post" />
    </div>
</template>

<script>
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

        data: () => {
            return {
                posts: [],
                loading: true
            }
        },

        mounted() {
            axios.get('/api/posts')
                .then(res => {
                    this.posts = res.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.log('Unable to fetch posts');
                    this.loading = false;
                });
        }
    }
</script>

<style scoped>
</style>
