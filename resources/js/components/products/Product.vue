<template>
    <div class="bg-white rounded shadow w-2/3 p-4 ">
        <div class="flex justify-between items-center">
            <div class="flex-1 mx-4">
                <t-input v-model="name" name="name" placeholder="กรุณากรอกชื่อพระ"/>
                <!-- <input type="text" name="body" class="w-full pl-4 h-8 bg-gray-200 rounded-full focus:outline-none focus:shadow-outline text-sm" placeholder="Add a post"> -->
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="flex-1 mx-4">
                <t-input v-model="buyprice" name="buyprice" placeholder="ราคาที่ซื้อ"/>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="flex-1 mx-4">
                <t-input v-model="buyfrom" name="buyfrom" placeholder="ซื้อจาก"/>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="flex-1 mx-4">
                <t-input v-model="sellprice" name="sellprice" placeholder="ราคาขาย"/>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="flex-1 mx-4">
                <t-input v-model="sellto" name="sellto" placeholder="ลูกค้าชื่อ"/>
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
            name: {
                get() {
                    return this.$store.getters.products.name;
                },
                set(name) {
                    this.$store.commit('updateName', name);
                },
            },
            buyprice: {
                get() {
                    return this.$store.getters.products.buyprice;
                },
                set(buyprice) {
                    this.$store.commit('updateBuyprice', buyprice);
                },
            },
            buyfrom: {
                get() {
                    return this.$store.getters.products.buyfrom;
                },
                set(buyfrom) {
                    this.$store.commit('updateBuyfrom', buyfrom);
                },
            },
            sellprice: {
                get() {
                    return this.$store.getters.products.sellprice;
                },
                set(sellprice) {
                    this.$store.commit('updateSellprice', sellprice);
                },
            },
            sellto: {
                get() {
                    return this.$store.getters.products.sellto;
                },
                set(sellto) {
                    this.$store.commit('updateSellto', sellto);
                },
            },
        },

        methods: {
            postHandler() {
                this.$store.dispatch('postProduct');
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
