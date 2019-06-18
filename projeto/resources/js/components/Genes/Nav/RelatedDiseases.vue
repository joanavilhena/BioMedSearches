<template>
    <div>
        <h3>Related Diseases</h3>
        <br>
        <div sytle="float:left;">
                <div class="mt-3"  v-for="(disease,index) in diseases" :key="index">
                    <b-card-group deck> 
                        <b-card border-variant="primary"
                            header-bg-variant="primary"
                            header-text-variant="white"
                            :header="'Related Disease: '+disease.RelatedDiseases + ' Annotation ID:'+disease.ClinicalAnnotationID">
                            <b-card-text>Location: {{disease.Location}}</b-card-text>
                            <b-card-text>Gene: {{disease.Gene}}</b-card-text>
                            <b-card-text>Level of Evidence: {{disease.LevelofEvidence}}</b-card-text>
                            <b-card-text>Clinical Annotation Types: {{disease.ClinicalAnnotationTypes}}</b-card-text>
                         <!--   <b-card-text>Genotype-PhenotypeIDs: {{disease.Genotype-PhenotypeIDs}}</b-card-text> -->
                            <b-card-text>Annotation Text: {{disease.AnnotationText}}</b-card-text>
                            <b-card-text>Variant Annotations IDs: {{disease.VariantAnnotationsIDs}}</b-card-text>
                            <b-card-text>PMIDs: {{disease.PMIDs}}</b-card-text>
                            <b-card-text>EvidenceCount: {{disease.EvidenceCount}}</b-card-text>
                            <b-card-text>RelatedChemicals: {{disease.RelatedChemicals}}</b-card-text>
                            <b-card-text>RelatedDiseases: {{disease.RelatedDiseases}}</b-card-text>
                        </b-card>
                    </b-card-group>
                </div>
                
              <br>

                <div class="overflow-auto">
                    <b-pagination  align="center" size="md-c"  v-model="page" :limit="5" :total-rows="this.total"  :per-page="5" @input="getRelatedDiseases(page)"></b-pagination>
                </div>
              
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
            axios.get('/api/genes/relatedDiseases?page='+this.page,{params: {search:this.id}})
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
