<template>
    <div>
        <div class="">
            <h1>{{currentDrug.name}}</h1>
            <br>
            <h3>Details</h3>
        </div>

         <nav id="na" class=" navbar-custom navbar navbar-expand-xl navbar-dark " style="color=black">
        
     

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
          <ul class="navbar-nav">
            <li class="nav-item">
             <router-link style="color:white; font-size: 16px;" class="nav-link" to="/drugs">Detailss</router-link>
            </li>
            <li class="nav-item">
             <router-link style="color:white; font-size: 16px;" class="nav-link" to="/chemicals">Chemicals</router-link>
            </li>
            <li class="nav-item">
             <router-link style="color:white; font-size: 16px;" class="nav-link" to="/genes">Genes</router-link>
            </li>
            <li class="nav-item">
             <router-link style="color:white; font-size: 16px;" class="nav-link" to="/users">About us</router-link>
            </li>
    
          
      
            </ul>
          </div>
        </nav>



        <div id="content">
            <span>
                    <th><h5>PharmGKB ID:</h5></th>
                    <td> <h6> {{currentDrug.idp}}</h6></td>
            </span>
            <br>
            <th><h5>Generic Names:</h5></th>

                <ul class="list-group" v-for="(name,index) in genericNames" :key="index">
                    <li class="list-group-item">{{name}}</li>
                
                </ul>
            <div >
              
                        
                        <td> <p> </p></td>
              
            </div>
           


        </div>

        <button @click="atum()" >Voltar atras</button>





    </div>
</template>
<script>

export default {
    props:['currentDrug'],
    data: function () {
        return {
            genericNames: this.currentDrug.genericNames,
        }
    },
    methods:
    {
        atum()
        {
            console.log("atum");
            this.$router.push('/drugs');
            this.$emit('show-drug',false);
        }
    },
    created()
    {
     
      if(this.genericNames!=null)
      {
           let res = this.genericNames.split(",");
           this.genericNames=res;
           console.log(this.genericNames);
     
      }

    }
    

}
</script>
<style>


.navbar-custom {
background-color: black;

}

.list-group{
    width:50%;
    height:50%;
  
}



</style>
