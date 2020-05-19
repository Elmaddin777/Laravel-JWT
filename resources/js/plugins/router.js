import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

// Define routes
import Login from '../components/auth/Login'
import Register from '../components/auth/Register'
import Logout from '../components/auth/Logout'
import Forum from '../components/forum/Forum'

const routes = [
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/forum',
        name: 'forum',
        component: Forum
    },
    {
        path: '/logout',
        name: 'logout',
        component: Logout
    }
]


const router = new VueRouter({
    mode: 'history',
    hashbang: false,
    routes
});


export default router