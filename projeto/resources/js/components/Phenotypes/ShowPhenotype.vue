<template>
    <div class="container">

       <b-jumbotron bg-variant="">
        <template slot="header">Phenotype: {{currentPhenotype.name}}</template>
        <h3>PharmGKB ID: {{currentPhenotype.idp}}</h3>
       </b-jumbotron>
        

        <showclinicalvariants></showclinicalvariants>

        <br>
        <b-button  @click="back">Back Home</b-button>  
    </div>      
</template>
<script>

export default {
 
    data: function () {
        return {
            genericNames: [],
            references: [],
            id: this.$route.params.id,
            currentPhenotype:[],
            
        }
    },
    methods:
    {
              back()
              {
                  this.$router.push('/phenotypes');
              }   
    },
    created()
    {
     
     /* */

      console.log(this.$route.params.id);
      axios.get('api/phenotype/'+this.$route.params.id)
                .then((response) => {        
                    this.currentPhenotype= response.data.data;  
                    //console.log(response.data)              
        
                })
                .catch(function (error) {     
                    console.log(error);
                })
    
    },


    


}
</script>

<style>
a:link {
  text-decoration: none;
  color: gray;
}

a:visited {
  text-decoration: none;
  color: gray;
}

a:hover {
  text-decoration: underline;
  color: gray;
}

a:active {
  text-decoration: underline;
  color: gray;
}
</style>

