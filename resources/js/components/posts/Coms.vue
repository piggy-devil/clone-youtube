<template>
    <div class="border-t border-gray-400 p-4 pt-2">
        <div v-for="(comment, index) in post.data.attributes.comments.data" :key="index">
            <Com :comment="comment"/>
            <!-- <LikeComment :entity_id="comment.data.comment_id"/> -->
        </div>

        <div class="flex">
            <input v-model="commentBody" type="text" name="comment" class="w-full pl-4 h-8 bg-gray-200 rounded-lg focus:outline-none" placeholder="Write your comment">
            <button v-if="commentBody"
                class="bg-gray-200 ml-2 px-2 py-1 rounded-lg focus:outline-none"
                @click="$store.dispatch('commentPost', { body: commentBody, postId: post.data.post_id, postKey: $vnode.key }); commentBody = ''">
                Post
            </button>
        </div>
    </div>
</template>

<script>
    import Com from './Com';
    // import LikeComment from '../comments/LikeComment'

    export default {
        name: "Coms",

        props: [
            'post',
        ],

        components: {
            Com,
            // LikeComment
        },

        data: () => {
            return {
                commentBody: '',
            }
        }
    }
</script>

<style scoped>
</style>
