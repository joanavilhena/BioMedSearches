<template>
    <div class="container">
        <b-jumbotron bg-variant="dark" text-variant="white">
            <template slot="header">Chemicals: {{currentChemical.name}}</template>
            <h3>PharmGKB ID: {{currentChemical.idp}}</h3>
        </b-jumbotron>

        <div>
            <b-tabs content-class="mt-3" fill>
                <b-tab title="Related Diseases"><show-chemical-diseases></show-chemical-diseases></b-tab>
                <b-tab title="Drug Labels"><show-chemical-labels></show-chemical-labels></b-tab>
                <b-tab title="Var_Drug Annotations"><show-vardrug-ann></show-vardrug-ann></b-tab>
                <b-tab title="Var_Fa Annotations"><show-varfa-ann></show-varfa-ann></b-tab>
                <b-tab title="Var_Phenno Associations"><show-varpheno-ann></show-varpheno-ann></b-tab>
            </b-tabs>
        </div>

        <b-button @click="back">Back</b-button>
        
  
    </div>        
</template>
<script>

export default {
 
    data: function () {
        return {
            genericNames: [],
            references: [],
            id: this.$route.params.id,
            currentChemical:[],
        }
    },
    methods:
    {
        back()
        {
            this.$router.push('/chemicals');
        }
               
    },
    mounted()
    {
     
     /* */

     
      axios.get('api/chemical/'+this.$route.params.id)
                .then((response) => {
               
                console.log(response.data);
                    
                this.currentChemical= response.data.data;                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
      

    }
    


}
</script>
<style>
.tabs.mytabs .nav-tabs {
    background-color: #aabbcc !important;
}
</style>


