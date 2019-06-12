<template>
        <div>
            <h1>Clinical Annotations</h1>
        <br>
      <b-container>


          <div v-for="(i,index) in ca" :key="index">
            <b-card :title="'Clinical Annotation: '+i.ClinicalAnnotationID" :sub-title="'Annotation Text: '+i.AnnotationText">
                <br>
                {{split(i.PMIDs)}}
                <b-card-text>PMIDs:</b-card-text>
                <div id="pmids" v-for="(a,index) in PMIDs" :key="index">
                    <a class="card-link" :href="'https://www.ncbi.nlm.nih.gov/pubmed/'+a">{{  a }} | </a> 
                </div>
            </b-card>
            <br>
            <br>
            
        </div>


        <b-button @click="back">Back</b-button>
      
      </b-container>
 

    </div>
</template>

<script>

export default {
props:["ca"],

    data()
    {
       
        return {
            PMIDs: [],
            showClinical:true,
          
        };
    },
    methods:
    {
        split(string)
        {
       
            this.PMIDs = string.split(",");
      
        }, 
        
        back()
        {
            
            this.$emit('backToggle');

        }
    },
    mounted()
    {
        
    }
}
</script>

<style>

</style>
