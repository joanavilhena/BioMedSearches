
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


const example = Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navigation', require('./components/NavigationBar.vue').default);


//Drugs
const listdrugs=Vue.component('list-drugs', require('./components/Drugs/ListDrugs.vue').default);

const routes = [
    {path:'/', redirect:'/example'},
    {path:'/example', component:listdrugs},
];
const router = new VueRouter({
    routes: routes //ou apenas routes, pois a propriedade tem o mesmo nome da variavel. case a const routes fosse routes2 entao seria routes: routes2
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
