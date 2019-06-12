<template>
    <div>
        

          
      <b-container>
      <h1>Variant Annotations</h1>
        <br>
        <br>
        <br>

        <div>
 

          <div v-for="(i,index) in ca" :key="index">
            <b-card :title="'Annotation ID: '+i.AnnotationID + ' StudyParammeters:'+i.StudyParameters" :sub-title="'Annotation Text: '+i.Notes">
                <br>
                {{split(i.Chemical)}}
                <b-card-text>Chemicals:</b-card-text>
                <div id="" v-for="(a,index) in chemicals" :key="index">
                    {{replace(a) }}
                    <a class="card-link" :href="'https://www.ncbi.nlm.nih.gov/pubmed/'+a">{{  a }} | </a> 
                </div>
                <b-card-text>Gene: {{i.Gene}}</b-card-text>
              <b-card-text>PMID: {{i.PMID}}</b-card-text>
              <b-card-text>Race(s): {{i.Races}}</b-card-text>
              <b-card-text>Study Cases: {{i.StudyCases}}</b-card-text>
              <b-card-text>Study Type: {{i.StudyType}}</b-card-text>
              <b-card-text>Variant: {{i.Variant}}</b-card-text>
                </b-card>
              
            <br>
            <br>
            
        </div>
      
 

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
            chemicals: [],
        }
    },
    methods:
    {
        split(string)
        {
            this.chemicals = string.split(",");
           
          
      
        },
        replace(string)
        {
          //  this.a = string.replace('','JJ');
        }, 
        
        back()
        {
            
            this.$emit('backToggle');

        }
    }

}
</script>

<style>

</style>
