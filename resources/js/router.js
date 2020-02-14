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
    },
    {
        path: '/users/:userId',
        name: 'user.show',
        component: UserShow,
    },
    {
        path: '/channel',
        name: 'channel',
        component: Channel,
    }]
})