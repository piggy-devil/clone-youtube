<template>
    <div>
        <div class="flex justify-between border-1 border-gray-400 m-4">
            <button class="flex justify-center py-2 rounded-lg text-sm text-gray-700 w-full  focus:outline-none"
                @click="comments = ! comments">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-5 h-5"><path d="M20.3 2H3.7C2 2 .6 3.4.6 5.2v10.1c0 1.7 1.4 3.1 3.1 3.1V23l6.6-4.6h9.9c1.7 0 3.1-1.4 3.1-3.1V5.2c.1-1.8-1.3-3.2-3-3.2zm1.8 13.3c0 1-.8 1.8-1.8 1.8H9.9L5 20.4V17H3.7c-1 0-1.8-.8-1.8-1.8v-10c0-1 .8-1.8 1.8-1.8h16.5c1 0 1.8.8 1.8 1.8v10.1zM6.7 6.7h10.6V8H6.7V6.7zm0 2.9h10.6v1.3H6.7V9.6zm0 2.8h10.6v1.3H6.7v-1.3z"/></svg>
                <p class="ml-2">Comment</p>
            </button>
        </div>
        <div v-if="comments" class="border-t border-gray-400 p-4 pt-2">
            <div class="flex">
                <input v-model="commentBody" type="text" name="comment" class="w-full pl-4 h-8 bg-gray-200 rounded-lg focus:outline-none" placeholder="Write your comment">
                <button v-if="commentBody" @click="addReply"
                    class="bg-gray-200 ml-2 px-2 py-1 rounded-lg focus:outline-none">
                    <!-- @click="$store.dispatch('commentPost', { body: commentBody, postId: post.data.post_id, postKey: $vnode.key }); commentBody = ''"> -->
                    Post
                </button>
            </div>
        </div>
    </div>
</template>


<script>
// import Avatar from 'vue-avatar'
// import Replies from './replies.vue'
export default {
    name: "Comment",

    props: [
        // 'post',
        // 'comments'
        'idPost',
    ],

    data: () => {
        return {
            comments: false,
            commentBody: '',
        }
    },

    methods: {
        addReply() {
            if (! this.commentBody) return
            axios.post(`/api/comments/${this.idPost}`, {
                // 'body' => $request->body,
                // 'post_id' => $post->id,
                // 'comment_id' => $request->comment_id
                // comment_id: this.comment.id,
                body: this.commentBody
            }).then(({ data }) => {
                console.log(data);
                this.commentBody = ''
                // this.addingReply = false
                // this.$refs.replies.addReply(data)
            })
        }
    }

}
</script>
