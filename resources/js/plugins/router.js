import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

// Define routes
import Login from '../components/auth/Login'
import AppHome from '../components/AppHome'

const routes = [
    // {
        // path: '/',
        // name: 'home',
        // component: AppHome
    // },
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