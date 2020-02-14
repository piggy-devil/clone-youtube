import Vue from 'vue';
import VueRouter from 'vue-router';
import Channel from './components/views/Channel';
import NewsFeed from './components/views/NewsFeed';
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
        path: '/channel',
        name: 'channel',
        component: Channel,
    }]
})
