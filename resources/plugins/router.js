import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

// Define routes
import Login from '../js/components/auth/Login'

const routes = [
     {
         path: '/login',
         name: 'login',
         component: Login
     }
]


const router = new VueRouter({
    mode: 'history',
    hashbang: false,
    routes
});


export default router