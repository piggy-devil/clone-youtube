<template>
    <div class="border-t border-gray-400 p-4 pt-2">
        <div v-for="(comment, index) in comments.data" :key="index">
            <!-- <Com :comment="comment"/> -->
            <Comment :comment="comment" :post="comment.post_id"/>
        </div>

        <div class="flex">
            <input v-model="newComment" type="text" name="comment" class="w-full pl-4 h-8 bg-gray-200 rounded-lg focus:outline-none" placeholder="Write your comment">
            <button v-if="newComment"
                @click="addComment"
                class="bg-gray-200 ml-2 px-2 py-1 rounded-lg focus:outline-none">
                <!-- @click="$store.dispatch('commentPost', { body: commentBody, postId: post.data.post_id, postKey: $vnode.key }); commentBody = ''"> -->
                Post
            </button>
        </div>
    </div>
</template>

<script>
    import Comment from './Comment.vue'

    export default {
        name: "Comments",

        data: () => ({
            comments: {
                data: []
            },
            newComment: '',
            commentBody: '',
        }),

        props: ['post'],

        components: {
            Comment
        },

        mounted() {
            this.fetchComments()
        },

        // computed: {
        //     auth() {
        //         return __auth()
        //     }
        // },

        methods: {
            fetchComments() {
                axios.get(`/api/posts/${this.post}/comments`)
                .then(({ data }) => {
                    this.comments = {
                        ...data,
                        data: [
                            ...this.comments.data,
                            ...data.data
                        ]
                    }
                    console.log(this.comments)
                })
                // const url = this.comments.next_page_url ? this.comments.next_page_url : `/videos/${this.video.id}/comments`

                // axios.get(url).then(({ data }) => {
                //     this.comments = {
                //         ...data,
                //         data: [
                //             ...this.comments.data,
                //             ...data.data
                //         ]
                //     }
                // })
            },
            addComment() {
                if (! this.newComment) return

                axios.post(`/api/comments/${this.post}`, {
                    body: this.newComment
                })
                .then(({ data }) => {
                    this.newComment = ''
                })
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>
