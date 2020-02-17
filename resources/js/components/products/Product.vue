<template>
    <div class="bg-white rounded shadow w-2/3 p-4 ">
        <div class="flex justify-between items-center">
            <div class="flex-1 mx-4">
                <t-input v-model="postProduct" name="name" placeholder="กรุณากรอกชื่อพระ"/>
                <!-- <input type="text" name="body" class="w-full pl-4 h-8 bg-gray-200 rounded-full focus:outline-none focus:shadow-outline text-sm" placeholder="Add a post"> -->
            </div>
        </div>
        <div>
            <button class="flex justify-right rounded-full w-10 h-10 bg-gray-200" @click="postHandler">
                ตกลง
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Product",

        computed: {
            postProduct: {
                get() {
                    return this.$store.getters.postProduct;
                },
                set(postProduct) {
                    this.$store.commit('updateProduct', postProduct);
                },
            }
        },

        methods: {
            postHandler() {
                console.log('Handler')
                this.$store.dispatch('postProduct');
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
