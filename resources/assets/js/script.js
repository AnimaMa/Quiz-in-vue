import Vue from 'vue';
import VueRouter from 'vue-router';

const axios = require('axios');
const moment = require('moment');
console.log(moment().format());

moment().format();


import Home from './components/Home.vue';
import Quiz from './components/Quiz.vue';
import Quizzes from './components/Quizzes.vue';
import Competitions from './components/Competitions.vue' ;

window.moment = moment;
window.Vue = Vue;
window.axios = axios;
Vue.config.debug = true;
Vue.use(VueRouter);
const JsonUrl = 'https://api.myjson.com/bins/by3ao';
const routes = [
    {path: '/home', component: Home},
    {path: '/competitions', component: Competitions},
    {path: '/quizzes', component: Quizzes},
    {path: '/quiz', component: Quiz},
    {path: '/quiz/:id', component: Quiz, props: jsonU},
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
        Home: require('./components/Home.vue'),
        Competitions: require('./components/Competitions.vue'),

        Quiz: require('./components/Quiz.vue'),
        CountDown: require('./components/CountDown.vue'),
        SummaryTable: require('./components/SummaryTable.vue'),
        Quizzes: require('./components/Quizzes.vue')


    },

}).$mount('#app');


