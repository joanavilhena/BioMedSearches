
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
const mainPage = Vue.component('mainPage', require('./components/MainPage/MainIndex.vue').default);
const searchbar = Vue.component('searchbar', require('./components/MainPage/SearchResults/SerachBar.vue').default);
const aboutUs = Vue.component('aboutus', require('./components/AboutUs.vue').default);


const searchResult = Vue.component('searchResult', require('./components/MainPage/SearchResult.vue').default);


//Drugs
//const listdrugs=Vue.component('list-drugs', require('./components/Drugs/ListDrugs.vue').default);
//const showDrug=Vue.component('show-drug', require('./components/Drugs/ShowDrug.vue').default);
//const showDrugRefs=Vue.component('show-drug-dose', require('./components/Drugs/Nav/DrugDose.vue').default);
//const showDrugPubs=Vue.component('show-drug-pubs', require('./components/Drugs/Nav/DrugPubs.vue').default);
//const showRelatedDiseases=Vue.component('show-drug-diseases', require('./components/Drugs/Nav/RelatedDiseases.vue').default);

//Chemicals
const listchemicals=Vue.component('list-chemicals', require('./components/Chemicals/ListChemicals.vue').default);
const showChemical=Vue.component('show-chemical', require('./components/Chemicals/ShowChemical.vue').default);
const showDrugRefs=Vue.component('show-chemical-labels', require('./components/Chemicals/Nav/DrugLabels.vue').default);
//const showChemicalClinicalAnnotations=Vue.component('show-chemical-clinical-annotations', require('./components/Chemicals/Nav/ClinicalAnnotations.vue').default);
const showRelatedDiseases=Vue.component('show-chemical-diseases', require('./components/Chemicals/Nav/RelatedDiseases.vue').default);
const showVarDrugAnn =Vue.component('show-vardrug-ann', require('./components/Chemicals/Nav/Var_Drug_Annotations.vue').default);
const showVarPhennoAnn =Vue.component('show-varpheno-ann', require('./components/Chemicals/Nav/Var_Pheno_Ann.vue').default);
const showVarFaAnn =Vue.component('show-varfa-ann', require('./components/Chemicals/Nav/Var_Fa_Ann.vue').default);

//Genes
const listgenes=Vue.component('list-genes', require('./components/Genes/ListGenes.vue').default);
const showGene=Vue.component('show-gene', require('./components/Genes/ShowGene.vue').default);
//const tableClinicalVariantsGenes = Vue.component('showclinicalvariantsGene', require('./components/Genes/ShowClinicalVariants.vue').default);
//const geneVariantAnnotations = Vue.component('show-variant-annotations', require('./components/Genes/VariantAnnotations.vue').default);
//const geneClinicalVariantions = Vue.component('show-clinical-annotations', require('./components/Genes/showClinicalAnnotations.vue').default);
const showRelatedDiseasesGene=Vue.component('show-gene-diseases', require('./components/Genes/Nav/RelatedDiseases.vue').default);
const showVarDrugAnnGene =Vue.component('show-vardrug-ann-gene', require('./components/Genes/Nav/Var_Drug_Annotations.vue').default);
const showVarPhennoAnnGene =Vue.component('show-varpheno-ann-gene', require('./components/Genes/Nav/Var_Pheno_Ann.vue').default);
const showVarFaAnnGene =Vue.component('show-varfa-ann-gene', require('./components/Genes/Nav/Var_Fa_Ann.vue').default);
const showVariants =Vue.component('show-var-gene', require('./components/Genes/Nav/Variants.vue').default);


//Variants

const listVariants=Vue.component('list-variants', require('./components/Variants/ListVariants.vue').default);
const showVariant=Vue.component('show-variant', require('./components/Variants/ShowVariant.vue').default);

//Phenotypes
const listPhenotypes=Vue.component('list-phenotypes', require('./components/Phenotypes/ListPhenotypes.vue').default);
const ShowPhenotype=Vue.component('show-phenotype', require('./components/Phenotypes/ShowPhenotype.vue').default);
const tableClinicalVariants = Vue.component('showclinicalvariants', require('./components/Phenotypes/ShowClinicalVariants.vue').default);
const phenotypeVariantAnnotations = Vue.component('show-variant-annotations', require('./components/Phenotypes/VariantAnnotations.vue').default);
const phenotypeClinicalVariantions = Vue.component('show-clinical-annotations', require('./components/Phenotypes/ShowClinicalAnnotations.vue').default);

//Feed
const feed=Vue.component('feed-news', require('./components/NewsFeed.vue').default);


const routes = [
    {path:'/', redirect:'/home'},
    //{path:'/chemicals', component:listdrugs},
    {path:'/aboutus', component:aboutUs},
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
    {path:'/clinicalAnnotation/:id', component:phenotypeClinicalVariantions},
    {path:'/news', component:feed},
];
const router = new VueRouter({
    
    routes: routes 
  });


const app = new Vue({
    el: '#app',
    router: router,
    
});
