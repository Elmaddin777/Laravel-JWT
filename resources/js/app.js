require('./bootstrap');
window.Vue = require('vue');

// Import plugins
import Vuetify from "../plugins/vuetify"
import Router  from "../plugins/router"




Vue.component('app-home', require('./components/AppHome.vue').default);


const app = new Vue({
    vuetify: Vuetify,
    router: Router,
    el: "#app"
    
});
