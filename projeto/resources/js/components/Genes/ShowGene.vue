<template>
    <div class="container">
        <b-jumbotron bg-variant="dark" text-variant="white">
            <template slot="header">Gene: {{currentGene.name}}</template>
            <h3>PharmGKB ID: {{currentGene.idp}}</h3>
        </b-jumbotron>

        <div>
            <b-tabs class="tab" content-class="mt-3" fill>
                <b-tab  title="Variants"><show-gene-variants></show-gene-variants></b-tab>
                <b-tab title="Related Diseases"><show-gene-diseases></show-gene-diseases></b-tab>
                <b-tab title="Var_Drug Annotations"><show-vardrug-ann-gene></show-vardrug-ann-gene></b-tab>
                <b-tab title="Var_Fa Annotations"><show-varfa-ann-gene></show-varfa-ann-gene></b-tab>
                <b-tab title="Var_Phenno Associations"><show-varpheno-ann-gene></show-varpheno-ann-gene></b-tab>
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
    mounted()
    {
     
     /* */

     
      axios.get('api/gene/'+this.$route.params.id)
                .then((response) => {
               
                console.log(response.data);
                    
                this.currentGene= response.data.data;                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
      

    }
    


}
</script>
<style>

</style>


