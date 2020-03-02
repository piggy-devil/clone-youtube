<template>
    <!-- <div class="bg-white rounded shadow w-2/3 mt-6 overflow-hidden">
        <avatar username="muupa" class='mr-3' :size="30"></avatar>
        <div class="px-4 pt-2 flex justify-between text-gray-700 text-sm">
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-5 h-5"><path d="M20.8 15.6c.4-.5.6-1.1.6-1.7 0-.6-.3-1.1-.5-1.4.3-.7.4-1.7-.5-2.6-.7-.6-1.8-.9-3.4-.8-1.1.1-2 .3-2.1.3-.2 0-.4.1-.7.1 0-.3 0-.9.5-2.4.6-1.8.6-3.1-.1-4.1-.7-1-1.8-1-2.1-1-.3 0-.6.1-.8.4-.5.5-.4 1.5-.4 2-.4 1.5-2 5.1-3.3 6.1l-.1.1c-.4.4-.6.8-.8 1.2-.2-.1-.5-.2-.8-.2H3.7c-1 0-1.7.8-1.7 1.7v6.8c0 1 .8 1.7 1.7 1.7h2.5c.4 0 .7-.1 1-.3l1 .1c.2 0 2.8.4 5.6.3.5 0 1 .1 1.4.1.7 0 1.4-.1 1.9-.2 1.3-.3 2.2-.8 2.6-1.6.3-.6.3-1.2.3-1.6.8-.8 1-1.6.9-2.2.1-.3 0-.6-.1-.8zM3.7 20.7c-.3 0-.6-.3-.6-.6v-6.8c0-.3.3-.6.6-.6h2.5c.3 0 .6.3.6.6v6.8c0 .3-.3.6-.6.6H3.7zm16.1-5.6c-.2.2-.2.5-.1.7 0 0 .2.3.2.7 0 .5-.2 1-.8 1.4-.2.2-.3.4-.2.6 0 0 .2.6-.1 1.1-.3.5-.9.9-1.8 1.1-.8.2-1.8.2-3 .1h-.1c-2.7.1-5.4-.3-5.4-.3H8v-7.2c0-.2 0-.4-.1-.5.1-.3.3-.9.8-1.4 1.9-1.5 3.7-6.5 3.8-6.7v-.3c-.1-.5 0-1 .1-1.2.2 0 .8.1 1.2.6.4.6.4 1.6-.1 3-.7 2.1-.7 3.2-.2 3.7.3.2.6.3.9.2.3-.1.5-.1.7-.1h.1c1.3-.3 3.6-.5 4.4.3.7.6.2 1.4.1 1.5-.2.2-.1.5.1.7 0 0 .4.4.5 1 0 .3-.2.6-.5 1z"/></svg>
                <p>likes1</p>
            </div>

            <div>
                <input v-model="commentBody" type="text" class="w-full pl-4 h-8 bg-gray-200 rounded-lg focus:outline-none" placeholder="Reply comment">
                <button v-if="commentBody" @click="addReply"
                    class="bg-gray-200 ml-2 px-2 py-1 rounded-lg focus:outline-none">
                    Post
                </button>
            </div>
        </div>
        <div v-if="comment" class="border-t border-gray-400 p-4 pt-2">
            <div class="flex my-4 items-center" v-for="(comment, index) in post.data.attributes.comments.data" :key="index">
            <div class="flex my-4 items-center" >
                <div class="w-8">
                    <img :src="comment.data.attributes.commented_by.data.attributes.profile_image.data.attributes.path" alt="profile image for user" class="w-8 h-8 object-cover rounded-full">
                </div>
                <div class="ml-4 flex-1">
                    <div class="bg-gray-200 rounded-lg p-2 text-sm">
                        <a class="font-bold text-blue-700" :href="'/users/' + comment.data.attributes.commented_by.data.user_id">
                            {{ comment.data.attributes.commented_by.data.attributes.name }}
                        </a>
                        <p class="inline">
                            {{ comment.body }}
                        </p>
                    </div>
                    <div class="text-xs pl-2">
                        <p>{{ comment.created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="media my-3">

        <avatar class='mr-3' :size="30"></avatar>

        <div class="media-body">
            <h6 class="mt-0">
                {{ comment.body }}
            </h6>
            <small>
                {{ comment.created_at }}
            </small>

            <div class="d-flex">
                <!-- <votes :default_votes="comment.votes" :entity_id="comment.id" :entity_owner="comment.user.id"></votes> -->
                <!-- <button @click="addingReply = !addingReply" class="btn btn-sm ml-2" :class="{ 'btn-default': !addingReply, 'btn-danger': addingReply }">
                    {{ addingReply ? 'Cancel' : 'Add Reply' }}
                </button> -->
            </div>

            <!-- <div v-if="addingReply" class="form-inline my-4 w-full"> -->
            <div  class="form-inline my-4 w-full">
                <input v-model='commentBody' type="text" class="form-control form-control-sm w-80">
                <button @click="addReply" class="btn btn-sm btn-primary">
                    <small>Add reply</small>
                </button>
            </div>

            <!-- <replies ref='replies' :comment="comment"></replies> -->
        </div>
    </div>
</template>


<script>
import Avatar from 'vue-avatar'
// import Replies from './replies.vue'
export default {
    name: "Comment",

    props: [
        'post',
        'comment',
    ],

    data: () => {
        return {
            comments: false,
            commentBody: '',
        }
    },

    components: {
         Avatar,
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
                // this.$refs.replies.addReply(data)
            })
        }
    }

}
</script>
