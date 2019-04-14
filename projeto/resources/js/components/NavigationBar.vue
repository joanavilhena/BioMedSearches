<template>
  <div>
      <nav id="na" class="navbar navbar-expand-xl navbar-dark " style="color=black">
        <a class="navbar-brand" href="#"><img src="storage/assets/logo.png" height="50%" width="50%" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

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
             <router-link style="color:black; font-size: 16px;" class="nav-link" to="/users">About us</router-link>
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

