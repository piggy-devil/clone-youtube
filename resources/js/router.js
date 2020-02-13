import Vue from 'vue';
import VueRouter from 'vue-router';
import NewsFeed from './components/views/NewsFeed';
import Channel from './components/views/Channel';

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
        path: '/channel',
        name: 'channel',
        component: Channel,
    }]
})
