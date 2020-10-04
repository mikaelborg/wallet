/*

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
});
*/

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(VueRouter)

import App from './views/App'
import Dashboard from './views/Dashboard'
import Login from './views/Login'
import Register from './views/Register'
import Wallets from './views/Wallets'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/wallets',
            name: 'wallets',
            component: Wallets,
        },
    ],
});

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');