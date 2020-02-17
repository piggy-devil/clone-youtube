const state = {
    name: '',
    buyprice: '',
    buyfrom: '',
    sellprice: '',
    sellto: '',
};

const getters = {
    products: state => {
        return {
            name: state.name,
            buyprice: state.buyprice,
            buyfrom: state.buyfrom,
            sellprice: state.sellprice,
            sellto: state.sellto,
        }
    }
};

const actions = {
    postProduct({commit, state}) {
        // commit('setPostsStatus', 'loading');

        axios.post('/api/products', {
            name: state.name,
            buyprice: state.buyprice,
            buyfrom: state.buyfrom,
            sellprice: state.sellprice,
            sellto: state.sellto,
        })
            .then(res => {
                console.log('add product success', res)
                // commit('pushPost', res.data);
                // commit('setPostsStatus', 'success');
                commit('updateName', '');
                commit('updateBuyprice', '');
                commit('updateBuyfrom', '');
                commit('updateSellprice', '');
                commit('updateSellto', '');
            })
            .catch(error => {
            });
    },
};

const mutations = {
    updateName(state, message) {
        state.name = message;
    },
    updateBuyprice(state, message) {
        state.buyprice = message;
    },
    updateBuyfrom(state, message) {
        state.buyfrom = message;
    },
    updateSellprice(state, message) {
        state.sellprice = message;
    },
    updateSellto(state, message) {
        state.sellto = message;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
