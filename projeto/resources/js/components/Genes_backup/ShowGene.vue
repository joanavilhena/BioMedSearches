<template>
    <div class="container">

       <b-jumbotron bg-variant="">
        <template slot="header">Gene: {{currentGene.name}}</template>
        <h3>PharmGKB ID: {{currentGene.idp}}</h3>
       </b-jumbotron>
        



        <showclinicalvariantsGene></showclinicalvariantsGene>
        <br>
        <b-button  @click="back">Back</b-button>  
    </div>      
</template>
<script>

export default {
 
    data: function () {
        return {
            genericNames: [],
            references: [],
            id: this.$route.params.id,
            currentGene:[],
        }
    },
    methods:
    {
              back()
              {
                  this.$router.push('/genes');
              }   
    },
    created()
    {
     
     /* */

      console.log(this.$route.params.id);
      axios.get('api/gene/'+this.$route.params.id)
                .then((response) => {        
                    this.currentGene= response.data.data;               
        
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

