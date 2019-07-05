<template>
<div class="footcontainer">
  <br>
    <div id="footer">
<div class="container mt-5 mb-5">
<footer>
    <table>
      <tr>
        <th><img src="storage/assets/logo.png"/></th>
        <th>About</th>
        <th>Suport</th>
        <th>Contacts</th>
        </tr>
        <tr>
          <td></td>
          <td>
            <router-link  to="/aboutus">
              <a>About Us</a>
            </router-link>
          </td>
           <td><router-link  to="/contact">
              <a>Contact</a>
            </router-link></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
           <td><router-link  to="/terms">
              <a>Terms of Use</a>
            </router-link></td>
           <td></td>
          
           <td></td>
          </tr>
          <tr>
            <td></td>
        <td>
          <router-link  to="/privacy">
              <a>Privacy Policy</a>
            </router-link></td>
        <td></td>
          </tr>
    </table>
  
</footer>

</div>
<p class="container">Copyrigh © 2019. All rigths reserved. </p>
<br>
</div>
</div>
</template>

<script>
export default {
  
  data: function () {
    return{

    }
  },
  methods:
  {
    goAbout()
    {
      router.push('aboutus');
    }
  }


}
</script>

<style>
.footcontainer {
  
  background: rgb(238, 238, 238);
}
</style>
