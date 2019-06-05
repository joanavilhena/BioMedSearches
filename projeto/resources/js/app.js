
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



// index.js or main.js
import 'vuetify/dist/vuetify.min.css';
// main.styl


import VueBootstrapTypeahead from 'vue-bootstrap-typeahead';

// Global registration
Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead);


import VueSelect from 'vue-cool-select';

Vue.use(VueSelect, {
  theme: 'bootstrap' // or 'material-design'
});

import Vuetify from 'vuetify';

Vue.use(Vuetify);


//Home
Vue.component('navigation', require('./components/NavigationBar.vue').default);
Vue.component('feed', require('./components/MainPage/FeedNews.vue').default);
const mainPage = Vue.component('main', require('./components/MainPage/MainIndex.vue').default);
const searchbar = Vue.component('searchbar', require('./components/MainPage/SearchResults/SerachBar.vue').default);


const searchResult = Vue.component('searchResult', require('./components/MainPage/SearchResult.vue').default);


//Drugs
const listdrugs=Vue.component('list-drugs', require('./components/Drugs/ListDrugs.vue').default);
const showDrug=Vue.component('show-drug', require('./components/Drugs/ShowDrug.vue').default);
const showDrugRefs=Vue.component('show-drug-dose', require('./components/Drugs/Nav/DrugDose.vue').default);
const showDrugPubs=Vue.component('show-drug-pubs', require('./components/Drugs/Nav/DrugPubs.vue').default);
const showAssociatedChemicals=Vue.component('show-drug-chemicals', require('./components/Drugs/Nav/AssociatedChemicals.vue').default);

//Chemicals
const listchemicals=Vue.component('list-chemicals', require('./components/Chemicals/ListChemicals.vue').default);
const showChemical=Vue.component('show-chemical', require('./components/Chemicals/ShowChemical.vue').default);

//Genes
const listgenes=Vue.component('list-genes', require('./components/Genes/ListGenes.vue').default);
const showGene=Vue.component('show-gene', require('./components/Genes/ShowGene.vue').default);

//Variants

const listVariants=Vue.component('list-variants', require('./components/Variants/ListVariants.vue').default);
const showVariant=Vue.component('show-variant', require('./components/Variants/ShowVariant.vue').default);

//Phenotypes
const listPhenotypes=Vue.component('list-phenotypes', require('./components/Phenotypes/ListPhenotypes.vue').default);
const ShowPhenotype=Vue.component('show-phenotype', require('./components/Phenotypes/ShowPhenotype.vue').default);
const tableClinicalVariants = Vue.component('showclinicalvariants', require('./components/Phenotypes/ShowClinicalVariants.vue').default);


const routes = [
    {path:'/', redirect:'/home'},
    {path:'/drugs', component:listdrugs},
    {path:'/drug/:id', component:showDrug},
    {path:'/chemicals', component:listchemicals},
    {path:'/chemical/:id', component:showChemical},
    {path:'/genes', component:listgenes},
    {path:'/gene/:id', component:showGene},
    {path:'/variants', component:listVariants},
    {path:'/variant/:id', component:showVariant},
    {path:'/phenotype/:id', component:ShowPhenotype},
    {path:'/home', component:mainPage},
    {path:'/searchResult', component:searchResult},
    {path:'/index', component:searchbar},
    {path:'/phenotypes', component:listPhenotypes},
];
const router = new VueRouter({
    
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
