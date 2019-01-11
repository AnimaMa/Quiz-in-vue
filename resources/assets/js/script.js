import Vue from 'vue';
import VueRouter from 'vue-router';

const axios = require('axios');

import Home from './components/Home.vue';
import Quiz from './components/Quiz.vue';


window.Vue = Vue;
window.axios = axios;
Vue.config.debug = true;
Vue.use(VueRouter);
const JsonUrl = 'https://api.myjson.com/bins/t0zvc';
const routes = [
    {path: '/home', component: Home},
    {path: '/quiz', component: Quiz}
];

const router = new VueRouter({
    routes

});

// const urlForAxios = 'https://swapi.co/api/people/10';

const app = new Vue({

    el: '#app',
    // template: '#app',

    router,
    components: {
        // VueHeader: require('./components/VueHeader.vue'),
        // Detail: require('./components/Detail.vue'),
        Home: require('./components/Home.vue'),
        Quiz: require('./components/Quiz.vue')
        // Search: require('./components/Search.vue'),
    },

}).$mount('#app');

