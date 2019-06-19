<template>
    <div>
        <br>
        <h3>Variants</h3>
        <div sytle="float:left;" v-if="this.total !=0">
                <div class="mt-3"  v-for="(disease,index) in diseases" :key="index">
                    <b-card-group deck> 
                        <b-card border-variant="primary"
                            header-bg-variant="danger"
                            header-text-variant="white"
                            :header="'Annotation ID: '+disease.idp">
                            <b-card-text>Name: {{disease.name}}</b-card-text>
                            <b-card-text>variantSymbol: {{disease.variantSymbol}}</b-card-text>
                            <b-card-text>locations: {{disease.locations}}</b-card-text>
                            <b-card-text>synonyms: {{disease.synonyms}}</b-card-text>
                           
                            
                        </b-card>
                    </b-card-group>
                </div>
                
              <br>

                <div class="overflow-auto">
                    <b-pagination  align="center" size="md-c"  v-model="page" :limit="5" :total-rows="this.total"  :per-page="5" @input="getRelatedDiseases(page)"></b-pagination>
                </div>
              
            </div>
            <div v-if="this.total==0">
                <h3>No Results founded...</h3>
            </div>
    </div>
    
</template>

<script>
export default {
   props:['currentDrug'],
    data: function () {
        return {
            diseases: [],
            drug: [],
            id: this.$route.params.id,
            page:1,
            total:1,
            
        }
    },
    methods:
    {
        getRelatedDiseases(page)
        {
            axios.get('/api/genes/variants?page='+this.page,{params: {search:this.id}})
                .then((response) => {
               this.diseases = response.data.data;
               this.total = response.data.total;

                })
                .catch(function (error) {
                    console.log(error);
                }) 
        }
    },
    mounted()
    { 
      this.getRelatedDiseases(1);  
    },
    created()
    {
        this.drug = this.currentDrug;
  
    }

}
</script>

<style>

</style>
