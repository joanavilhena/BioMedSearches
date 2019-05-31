<template>
<div id="containerNavbar">
<nav class="navbar navbar-expand-lg navbar-light  justify-content-end" id="global-nav">
     <a class="navbar-brand" href="/#/home">
    <img src="storage/assets/logo.png" alt="" id="logo">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0 ml-auto mr-1" id="navbarSupportedContent">
        <ul class="navbar-nav text-right ">
          <li class="nav-item active">
            <router-link class="nav-link" to="/home"><span v-on:click="addBackground">Home</span></router-link>
          </li>
          <li class="nav-item ">
             <router-link  class="nav-link" to="/genes"><span v-on:click="removeBackground">Genes</span></router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/variants"><span v-on:click="removeBackground">Variants</span></router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/drugs"><span v-on:click="removeBackground">Drugs</span></router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/chemicals"><span v-on:click="removeBackground">Chemicals</span></router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/news"><span v-on:click="removeBackground">News</span></router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/publications"><span v-on:click="removeBackground">Publications</span></router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/aboutus"><span v-on:click="removeBackground">AboustUs</span></router-link>
          </li>
            <li class="nav-item ">
              <router-link class="nav-link" to="/contacts"><span v-on:click="removeBackground">Contacts</span></router-link>
          </li>
          <li>
            <button v-if="user=![]" type="button" class="btn btn-outline-info">Login</button>
          </li>
          <li>
            <button v-if="user=![]" type="button" class="btn btn-outline-info">Sign Up</button>
          </li>
        </ul>
    </div>
</nav>




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
    removeBackground(){
      $( "#app" ).removeClass( "app" );
    },
    addBackground(){
      $( "#app" ).addClass( "app" );
    }
  }

    
}

</script>

