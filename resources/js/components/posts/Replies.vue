<template>
    <div >
        <div v-for="reply in replies.data" class="flex my-4 items-center">
            <div class="w-8">
                <!-- <Avatar :size="30"/> -->
                <!-- <img :src="comment.data.attributes.commented_by.data.attributes.profile_image.data.attributes.path" alt="profile image for user" class="w-8 h-8 object-cover rounded-full"> -->
            </div>
            <div class="ml-4 flex-1">
                <div class="bg-gray-200 rounded-lg p-2 text-sm">
                    <a class="font-bold text-blue-700" href="#">
                        {{ reply.user_id }}
                    </a>
                    <p class="inline">
                        {{ reply.body }}
                    </p>
                    <!-- <likecomment :entity_id="reply.user_id"/> -->
                </div>
                <div class="p-2 text-sm">
                    <!-- <a class="font-bold text-blue-700" href="#">
                        {{ like }}
                    </a>
                    <button @click="replies = ! replies" class="font-bold text-blue-700">
                        <p>{{ reply }}</p>
                    </button>
                    <p class="inline">
                        {{ comment.created_at }}
                    </p> -->
                </div>
            </div>
        </div>
        <div v-if="comment.repliesCount > 0 && replies.next_page_url"
            class="text-center">
            <button @click="fetchReplies" class="btn btn-info btn-sm">Load Replies</button>
        </div>
    </div>
</template>

<script>
    // import LikeComment from '../comments/LikeComment'

    export default {
        name: "Replies",

        props: ['comment'],

        // comments: {
        //     LikeComment
        // },

        data() {
            return {
                replies: {
                    data: [],
                    next_page_url: `/api/comments/${this.comment.id}/replies`
                }
            }
        },

        methods: {
            fetchReplies() {
                // axios.get(`/api/comments/${this.comment.id}/replies`)
                // .then(({ data }) => {
                axios.get(this.replies.next_page_url).then(({ data }) => {
                    this.replies = {
                        ...data,
                        data: [
                            ...this.replies.data,
                            ...data.data
                        ]
                    }
                    console.log('replies', this.replies.data);
                })
            },
            addReply(reply) {
                this.replies = {
                    ...this.replies,
                    data: [
                        reply,
                        ...this.replies.data
                    ]
                }
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>
