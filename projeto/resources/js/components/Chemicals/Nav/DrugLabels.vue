<template>
    <div>
        <br>
        <div sytle="float:left;" v-if="this.total !=0">
                <div class="mt-3"  v-for="(disease,index) in diseases" :key="index">
                    <b-card-group deck> 
                        <b-card border-variant="primary"
                            header-bg-variant="success"
                            header-text-variant="white"
                            :header="'PharmGKBID: '+disease.PharmGKBID">

                            <b-card-text>Name: {{disease.Name}}</b-card-text>
                            <b-card-text>Source: {{disease.Source}}</b-card-text>
                            <b-card-text>Biomarker Flag: {{disease.BiomarkerFlag}}</b-card-text>
                         <!--   <b-card-text>Genotype-PhenotypeIDs: {{disease.Genotype-PhenotypeIDs}}</b-card-text> -->
                            <b-card-text>Testing Level: {{disease.TestingLevel}}</b-card-text>
                        </b-card>
                    </b-card-group>
                </div>
                
              <br>

                <div class="overflow-auto">
                    <b-pagination  align="center" size="md-c"  v-model="page" :limit="5" :total-rows="this.total"  :per-page="5" @input="getResults(page)"></b-pagination>
                </div>
              
            </div>
            <div v-if="this.total ==0">
                <h3>No results founded</h3>
                <br>
            </div>


    </div>
    
</template>

<script>
import { constants } from 'crypto';
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
        getResults(page)
        {
            
            axios.get('/api/chemical/'+this.id)
            .then((response) =>
            {
                console.log("AQUIII")
                console.log(response.data.data.name);
                let name = response.data.data.name;
                console.log("OIII" + name);

                axios.get('/api/chemicals/druglabels?page='+this.page,{params: {search: name}})
                    .then((response) => {
                    
                        console.log(response);
                            this.diseases = response.data.data;
                            this.total = response.data.total;

                    })
                    .catch(function (error) {
                        console.log(error);
                    }) 
                
            })

          
           
           
        }
    },
    mounted()
    { 
      this.getResults(1);  
     
    },
    created()
    {
        this.drug = this.currentDrug;
        
  
    }

}
</script>

<style>

</style>
