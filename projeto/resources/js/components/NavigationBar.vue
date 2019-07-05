<template>
<div id="containerNavbar">
<div>
  <b-navbar toggleable="lg" type="light" variant="">
    <b-navbar-brand href="/#/home"><a><img src="storage/assets/logo.png"  id="logo"></a></b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" class="snip1168" is-nav>
      <b-navbar-nav class="ml-auto" id="menu" >
        <b-nav-item  to="/genes">Genes</b-nav-item>
        <b-nav-item  to="/chemicals">Chemicals</b-nav-item>
         <b-nav-item  to="/phenotypes">Phenotypes</b-nav-item>
         <b-nav-item  to="/news">News</b-nav-item>
         <b-nav-item  to="/aboutus">About Us</b-nav-item>
         <b-nav-item  to="/contact">Contact Us</b-nav-item>
      </b-navbar-nav>

     
    </b-collapse>
  </b-navbar>
</div>
</div>


</template>

<script>
export default {
  data: function () {
        return {
          user:[],
        }
  },
  methods:{
  
  }
    
}



</script>

<style>
.img-responsive
{
  max-width: 100%;
   height: auto;
    display: block;
    position: fixed;
}
</style>


