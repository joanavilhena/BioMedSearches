<template>
<div class ='container'>
<nav class="navbar navbar-expand-sm justify-content-end">
     <a class="navbar-brand" href="/#/home">
    <img src="storage/assets/logo.png" alt="">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0 ml-auto mr-1" id="navbarSupportedContent">
        <ul class="navbar-nav text-right ">
          <li class="nav-item active">
            <router-link class="nav-link" to="/home">Home</router-link>
          </li>
          <li class="nav-item ">
             <router-link class="nav-link" to="/genes">Genes</router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/variants">Variants</router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/drugs">Drugs</router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/chemicals">Chemicals</router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/news">News</router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/publications">Publications</router-link>
          </li>
          <li class="nav-item ">
            <router-link class="nav-link" to="/aboutus">AboustUs</router-link>
          </li>
            <li class="nav-item ">
              <router-link class="nav-link" to="/contacts">Contacts</router-link>
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
  }

    
}
</script>
 <style>
 .nav-link{
   color:black;
      
 }
 a.nav-link{
   border-top-style:solid;
   border-color: transparent;
 }
 a.nav-link:hover{
   border-color: #4acaff;
   border-radius: 5px;
 }
  a.nav-link:focus{
   border-color: #4acaff;
   border-radius: 5px;
 }


 </style>
