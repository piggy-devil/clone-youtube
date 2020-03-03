<template>
    <div class="flex my-4 items-center" >
        <div class="w-8">
            <!-- <Avatar :size="30"/> -->
            <!-- <img :src="comment.data.attributes.commented_by.data.attributes.profile_image.data.attributes.path" alt="profile image for user" class="w-8 h-8 object-cover rounded-full"> -->
        </div>
        <div class="ml-4 flex-1">
            <div class="bg-gray-200 rounded-lg p-2 text-sm">
                <a class="font-bold text-blue-700" href="#">
                    {{ comment.user_id }}
                </a>
                <p class="inline">
                    {{ comment.body }}
                </p>
                <!-- <a class="font-bold text-blue-700" :href="'/users/' + comment.data.attributes.commented_by.data.user_id">
                    {{ comment.data.attributes.commented_by.data.attributes.name }}
                </a>
                <p class="inline">
                    {{ comment.data.attributes.body }}
                </p> -->
            </div>
            <likecomment :entity_id="comment.id"/>
            <div class="p-2 text-sm">
                <a class="font-bold text-blue-700" href="#">
                    {{ like }}
                </a>
                <!-- <a class="font-bold text-blue-700" href="addReply">
                    {{ reply }}
                </a> -->
                <button @click="replies = ! replies" class="font-bold text-blue-700">
                <!-- <button class="flex justify-center py-2 rounded-lg text-sm text-gray-700 w-full  focus:outline-none" -->
                    <!-- @click="replies = ! replies"> -->
                    <p>{{ reply }}</p>
                </button>
                <!-- <div  class="font-bold text-blue-700">
                    <input v-model='commentBody' type="text" class="form-control form-control-sm w-80">
                    <button @click="addReply" class="font-bold text-blue-700">
                        <small>{{ reply }}</small>
                    </button>
                </div> -->
                <p class="inline">
                    {{ comment.created_at }}
                </p>
            </div>
            <div v-if="replies" class="flex">
                <input v-model="commentBody" type="text" class="w-full pl-4 h-8 bg-gray-200 rounded-lg focus:outline-none" placeholder="Reply your comment">
                <button v-if="commentBody"
                    @click="addReply"
                    class="bg-gray-200 ml-2 px-2 py-1 rounded-lg focus:outline-none">
                    <!-- @click="$store.dispatch('commentPost', { body: commentBody, postId: post.data.post_id, postKey: $vnode.key }); commentBody = ''"> -->
                    Reply
                </button>
            </div>
            <replies ref='replies' :comment="comment"></replies>
        </div>
    </div>
</template>


<script>
import Avatar from 'vue-avatar'
import Replies from './replies'
export default {
    name: "Comment",

    props: [
        'post',
        'comment',
    ],

    data: () => {
        return {
            replies: false,
            commentBody: '',
            like: 'ถูกใจ',
            reply: 'ตอบกลับ'
        }
    },

    components: {
         Avatar,
         Replies
     },

    methods: {
        addReply() {
            if (! this.commentBody) return

            axios.post(`/api/comments/${this.post}`, {
                comment_id: this.comment.id,
                body: this.commentBody
            }).then(({ data }) => {
                this.commentBody = ''
                // this.addingReply = false
                this.$refs.replies.addReply(data)
            })
        }
    }

}
</script>
