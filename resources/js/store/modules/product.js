const state = {
    postProduct: '',
};

const getters = {
    postProduct: state => {
        return state.postProduct;
    }
};

const actions = {
    postProduct({commit, state}) {
        // commit('setPostsStatus', 'loading');

        axios.post('/api/products', { name: state.postProduct })
            .then(res => {
                console.log('add product success', res)
                // commit('pushPost', res.data);
                // commit('setPostsStatus', 'success');
                commit('updateProduct', '');
            })
            .catch(error => {
            });
    },
};

const mutations = {
    updateProduct(state, message) {
        state.postProduct = message;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
