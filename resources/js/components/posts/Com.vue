<template>
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
        </div>
    </div>
</template>

<script>
    export default {
        name: "Com",

        props: [
            'comment'
        ],

        data: () => {
            return {
                like: 'ถูกใจ',
                reply: 'ตอบกลับ'
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>
