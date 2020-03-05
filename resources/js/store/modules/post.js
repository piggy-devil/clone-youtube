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
    fetchUserPosts({commit, dispatch}, userId) {
        commit('setPostsStatus', 'loading');

        axios.get('/api/users/' + userId + '/posts')
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
    likePost({commit, state}, data) {
        axios.post('/api/posts/' + data.postId + '/like')
            .then(res => {
                commit('pushLikes', { likes: res.data, postKey: data.postKey });
            })
            .catch(error => {
            });
    },
    likeP({commit, state}, data) {
        console.log(data.entity_id)
        console.log(data.type)
        axios.post(`/api/likes/${data.entity_id}/${data.type}`)
        // axios.post('/api/likes/' + data.entity_id + '/up')
        // axios.post('/api/posts/' + data.postId + '/like')
            .then(res => {
                // commit('pushLikes', { likes: res.data, postKey: data.postKey });
                console.log(res);
            })
            .catch(error => {
            });
    },
    commentPost({commit, state}, data) {
        axios.post('/api/posts/' + data.postId + '/comment', { body: data.body })
            .then(res => {
                commit('pushComments', { comments: res.data, postKey: data.postKey });
            })
            .catch(error => {
            });
    }
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
    pushLikes(state, data) {
        state.posts.data[data.postKey].data.attributes.likes = data.likes;
    },
    pushComments(state, data) {
        state.posts.data[data.postKey].data.attributes.comments = data.comments;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
