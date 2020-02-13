import Vue from 'vue';
import VueRouter from 'vue-router';
import Start from './components/views/Start';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',

    routes: [{
        path: '/start',
        name: 'home',
        component: Start,
    }]
})
