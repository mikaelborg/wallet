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
import store from '../assets/js/store'

Vue.use(BootstrapVue)
Vue.use(VueRouter)

import App from './views/App'
import Register from './views/Register'
import Wallets from './views/Wallets'
import SignIn from './views/SignIn'
import Users from './views/Users'

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'signin',
            component: SignIn
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
        },
        {
            path: '/signin',
            name: 'signin',
            component: SignIn,
        },
        {
            path: '/wallets',
            name: 'wallets',
            component: Wallets,
        },
        {
            path: '/users',
            name: 'users',
            component: Users,
        },
    ],
});

store.dispatch('auth/me').then(() => {
    new Vue({
        router,
        store,
        render: h => h(App)
    }).$mount('#app')
})
