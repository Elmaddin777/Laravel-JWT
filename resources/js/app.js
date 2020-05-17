require('./bootstrap');
window.Vue = require('vue');

// Import plugins
import Vuetify from "./plugins/vuetify"
import Router  from "./plugins/router"

// Import helpers
import Storage from "./helpers/Storage"
window.Storage = Storage

import Token from "./helpers/Token"
window.Token = Token

import User from "./helpers/User"
window.User = User



Vue.component('app-home', require('./components/AppHome.vue').default);

const app = new Vue({
    vuetify: Vuetify,
    router: Router,
    el: "#app"
    
});
