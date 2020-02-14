<template>
    <div class="flex flex-col items-center py-4">
        <NewPost />
    </div>
</template>

<script>
    import NewPost from '../posts/NewPost';
    import Post from '../posts/Post';

    export default {
        name: "NewsFeed",

        components: {
            NewPost,
            Post
        },

        data: () => {
            return {
                posts: null,
            }
        },

        mounted() {
            axios.get('/api/posts')
                .then(res => {
                    this.posts = res.data;
                })
                .catch(error => {
                    console.log('Unable to fetch posts');
                });
        }
    }
</script>

<style scoped>
</style>
