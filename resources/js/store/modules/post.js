const state = {
    posts: null,
    postsStatus: null,
    message: '',
};

const getters = {
    posts: state => {
        return state.posts;
    },
    newsStatus: state => {
        return {
            postsStatus: state.postsStatus,
        }
    },
    postMessage: state => {
        return state.message;
    },
};

const actions = {
    fetchNewsPosts({commit, state}) {
        commit('setPostsStatus', 'loading');

        axios.get('/api/posts')
            .then(res => {
                commit('setPosts', res.data);
                commit('setPostsStatus', 'success');
            })
            .catch(error => {
                commit('setPostsStatus', 'error');
            });
    },
    postMessage({commit, state}) {
        commit('setPostsStatus', 'loading');

        axios.post('/api/posts', { description: state.message })
            .then(res => {
                commit('pushPost', res.data);
                commit('setPostsStatus', 'success');
                commit('updateMessage', '');
            })
            .catch(error => {
            });
    },
};

const mutations = {
    setPosts(state, posts) {
        state.posts = posts;
    },
    updateMessage(state, msg) {
        state.message = msg;
    },
    setPostsStatus(state, status) {
        state.postsStatus = status;
    },
    pushPost(state, data) {
        state.posts.data.unshift(data);
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
