import Vue from 'vue';
import VueRouter from 'vue-router';
import Channel from './components/views/Channel';
import NewsFeed from './components/views/NewsFeed';
import NewComment from './components/views/NewComment';
import NewsFeedPost from './components/views/NewsFeedPost';
import UserShow from './components/users/Show';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',

    routes: [
    {
        path: '/',
        name: 'home',
        component: NewsFeed,
        meta: { title: 'News Feed' }
    },
    {
        path: '/users/:userId',
        name: 'user.show',
        component: UserShow,
        meta: { title: 'Profile' }
    },
    {
        path: '/comment',
        name: 'comment',
        component: NewComment,
        meta: { title: 'NewComment' }
    },
    {
        path: '/new',
        name: 'newpost',
        component: NewsFeedPost,
        meta: { title: 'NewsFeedPost' }
    },
    {
        path: '/channel',
        name: 'channel',
        component: Channel,
    }]
})
