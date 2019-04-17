import Vue from 'vue';
import VueRouter from 'vue-router';
import Content from '../components/Content.vue';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Content',
            component: Content
        }
    ]
});