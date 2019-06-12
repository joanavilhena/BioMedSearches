<template>
    <div class="container">
        <b-jumbotron bg-variant="">
            <template slot="header">Drug: {{currentDrug.name}}</template>
            <h3>PharmGKB ID: {{currentDrug.idp}}</h3>
        </b-jumbotron>

        <div>
            <b-tabs content-class="mt-3" fill>
                <b-tab title="Related Chemicals" :title-link-class="'tab-title-class'"><show-drug-chemicals :currentDrug="currentDrug"></show-drug-chemicals></b-tab>
                <b-tab title="Related Diseases"><p>Related Diseases</p></b-tab>
                <b-tab title="Clinical Annotatios"><p>Clinical Annotatios</p></b-tab>
                <b-tab title="Drug Labels"><p>Drug Labels</p></b-tab>
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
            currentDrug:[],
        }
    },
    methods:
    {
        back()
        {
            this.$router.push('/drugs');
        }
               
    },
    mounted()
    {
     
     /* */

     
      axios.get('api/drug/'+this.$route.params.id)
                .then((response) => {
               
                console.log(response.data);
                    
                this.currentDrug= response.data.data;                
        
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


