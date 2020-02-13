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
        }
    }
</script>

<style scoped>
</style>
