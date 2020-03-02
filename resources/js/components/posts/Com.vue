<template>
    <!-- <div class="bg-white rounded shadow w-2/3 mt-6 overflow-hidden"> -->
        <!-- <div v-if="comments" class="border-t border-gray-400 p-4 pt-2"> -->
        <div class="border-t border-gray-400 p-4 pt-2">

            <div class="flex my-4 items-center" v-for="(comment, index) in post.data.attributes.comments.data" :key="index">
                <div class="w-8">
                    <img :src="comment.data.attributes.commented_by.data.attributes.profile_image.data.attributes.path" alt="profile image for user" class="w-8 h-8 object-cover rounded-full">
                </div>
                <div class="ml-4 flex-1">
                    <div class="bg-gray-200 rounded-lg p-2 text-sm">
                        <a class="font-bold text-blue-700" :href="'/users/' + comment.data.attributes.commented_by.data.user_id">
                            {{ comment.data.attributes.commented_by.data.attributes.name }}
                        </a>
                        <p class="inline">
                            {{ comment.data.attributes.body }}
                        </p>
                    </div>
                    <div class="p-2 text-sm">
                        <a class="font-bold text-blue-700" href="#">
                            {{ like }}
                        </a>
                        <a class="font-bold text-blue-700" href="#">
                            {{ reply }}
                        </a>
                        <p class="inline">
                            {{ comment.data.attributes.commented_at }}
                        </p>
                    </div>
                    <!-- <div class="text-xs pl-2">
                        <p>{{ comment.data.attributes.commented_at }}</p>
                    </div> -->
                </div>
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
    <!-- </div> -->
</template>

<script>
    export default {
        name: "Post",

        props: [
            'post',
            // 'comments'
        ],

        data: () => {
            return {
                comments: false,
                commentBody: '',
                like: 'ถูกใจ',
                reply: 'ตอบกลับ'
            }
        }
    }
</script>

<style scoped>
</style>
