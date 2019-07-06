<template>
        <div>
            <h1>Clinical Annotations</h1>
        <br>
      <b-container>


          <div v-for="(i,index) in items" :key="index">
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
 <b-row>
      <b-col md="6" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          class="my-0"
        >
        </b-pagination>



      </b-col>
    </b-row>

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
            items:[],
            PMIDs: [],
            showClinical:true,
            totalRows: 1,
            currentPage: 1,
            perPage: 5,
          
        };
    },
    methods:
    {
        getClinicalAnnotations()
        {
                 axios.get('api/clinicalAnn',{ params: { gene: this.ca[0], chemicals: this.ca[1], le: this.ca[2], phenotypes: this.ca[3],
          type: this.ca[4], variant: this.ca[5] } })
                .then((response) => {
                    console.log(response.data);
                   
                    this.items= response.data;
                    this.totalRows = response.data.length;
                    //this.$router.push('/clinicalAnnotation/'+response.ClinicalAnnotationID);
                    

                });
        },
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
        console.log(this.ca)
        this.getClinicalAnnotations();
    }
}
</script>

<style>

</style>
