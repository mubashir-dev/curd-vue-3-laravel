require('./bootstrap');
window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router});
