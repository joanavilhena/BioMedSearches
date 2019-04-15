<template>
  <div>
      <nav id="na" class="  navbar navbar-expand-xl navbar-dark " style="color=black">
       <router-link class="navbar-brand" to="/home"><img src="storage/assets/logo.png" height="50%" width="50%" alt=""></router-link>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
          <ul class="navbar-nav">
            <li class="nav-item">
             <router-link style="color:black; font-size: 16px;" class="nav-link" to="/drugs">Drugs</router-link>
            </li>
            <li class="nav-item">
             <router-link style="color:black; font-size: 16px;" class="nav-link" to="/chemicals">Chemicals</router-link>
            </li>
            <li class="nav-item">
             <router-link style="color:black; font-size: 16px;" class="nav-link" to="/genes">Genes</router-link>
            </li>
            <li class="nav-item">
             <router-link style="color:black; font-size: 16px;" class="nav-link" to="/about">About us</router-link>
            </li>
    
          
      
            </ul>
          </div>
        </nav>
  </div>    
</template>

<script>
export default {
    
}
</script>
<style>


.navbar-custom {
  opacity: 0.8;
  filter: alpha(opacity=80); /* For IE8 and earlier */
 border-radius: 0px;
 border-color:violet;
}



</style>

