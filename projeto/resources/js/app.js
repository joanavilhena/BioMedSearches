
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import VueRouter from 'vue-router';
Vue.use(VueRouter);


import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';




//Home
Vue.component('navigation', require('./components/NavigationBar.vue').default);
Vue.component('feed', require('./components/MainPage/FeedNews.vue').default);
const mainPage = Vue.component('example-component', require('./components/MainPage/Main.vue').default);



//Drugs
const listdrugs=Vue.component('list-drugs', require('./components/Drugs/ListDrugs.vue').default);
const showDrug=Vue.component('show-drug', require('./components/Drugs/ShowDrug.vue').default);
const showDrugRefs=Vue.component('show-drug-dose', require('./components/Drugs/DrugDose.vue').default);
const showDrugPubs=Vue.component('show-drug-pubs', require('./components/Drugs/DrugPubs.vue').default);

//Chemicals
const listchemicals=Vue.component('list-chemicals', require('./components/Chemicals/ListChemicals.vue').default);

const routes = [
    {path:'/', redirect:'/home'},
    {path:'/drugs', component:listdrugs},
    {path:'/chemicals', component:listchemicals},
    {path:'/home', component:mainPage},
];
const router = new VueRouter({
    //mode:'history',
    routes: routes 
  });




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: router,
    
});
