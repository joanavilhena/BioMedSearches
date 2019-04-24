<template>
<div class ='container'>
<nav class="navbar navbar-expand-sm justify-content-end">
     <a class="navbar-brand" href="#/home">
    <img src="storage/assets/logo.png" alt="">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0 ml-auto mr-1" id="navbarSupportedContent">
        <ul class="navbar-nav text-right ">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="api/drugs">News</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">Publications</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">About Us</a>
            </li>
             <li class="nav-item ">
                <a class="nav-link" href="#">Contacts</a>
            </li>
            <li>
              <button type="button" class="btn btn-outline-info">Login</button>
              </li>
                 <li>
              <button type="button" class="btn btn-outline-info">Sign Up</button>
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
