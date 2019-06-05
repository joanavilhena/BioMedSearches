<template>
    <div class="container">
        <div class="">
            <h1>Phenotype: {{currentPhenotype.name}}</h1>
            <br>
            <h3>PharmGKB ID: {{currentPhenotype.idp}}</h3>
            <br>
        </div>


        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-details" aria-selected="true">Clinical Variants</a>
    <a class="nav-item nav-link" id="nav-associated-chemicals-tab" data-toggle="tab" href="#nav-associated-chemicals" role="tab" aria-controls="nav-associated-chemicals" aria-selected="false">Associated Chemicals</a>
    <a class="nav-item nav-link" id="nav-dosing-info-tab" data-toggle="tab" href="#nav-dosing-info" role="tab" aria-controls="nav-dosing-info" aria-selected="false">Dosing Info</a>
    <a class="nav-item nav-link" id="nav-pubs-tab" data-toggle="tab" href="#nav-pubs" role="tab" aria-controls="nav-pubs" aria-selected="false">Pubs</a>
    <a class="nav-item nav-link" id="nav-clinical-annotations-tab" data-toggle="tab" href="#nav-clinical-annotations" role="tab" aria-controls="nav-clinical-annotations" aria-selected="false">Clinical Annotations</a>
    <a class="nav-item nav-link" id="nav-drug-annotations-tab" data-toggle="tab" href="#nav-drug-annotations" role="tab" aria-controls="nav-drug-annotations" aria-selected="false">Drug Annotations</a>
    <a class="nav-item nav-link" id="nav-variant-annotations-tab" data-toggle="tab" href="#nav-variant-annotations" role="tab" aria-controls="nav-variant-annotations" aria-selected="false">Variant Annotations</a>
    <a class="nav-item nav-link" id="nav-label-annotations-tab" data-toggle="tab" href="#nav-label-annotations" role="tab" aria-controls="nav-label-annotations" aria-selected="false">Label Annotations</a>
  </div>
</nav>


<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
      <div class="container">
        <showclinicalvariants></showclinicalvariants>
      </div>
    </div>
  <div class="tab-pane fade" id="nav-associated-chemicals" role="tabpanel" aria-labelledby="nav-associated-chemicals-tab">
      
  </div>
  <div class="tab-pane fade" id="nav-dosing-info" role="tabpanel" aria-labelledby="nav-dosing-info-tab">...</div>
  <div class="tab-pane fade" id="nav-pubs" role="tabpanel" aria-labelledby="nav-pubs-tab">...</div>
  <div class="tab-pane fade" id="clinical-annotations" role="tabpanel" aria-labelledby="nav-clinical-annotations">...</div>
  <div class="tab-pane fade" id="drug-annotations" role="tabpanel" aria-labelledby="nav-drug-annotations">...</div>
  <div class="tab-pane fade" id="variant-annotations" role="tabpanel" aria-labelledby="nav-variant-annotations">...</div>
  <div class="tab-pane fade" id="label-annotations" role="tabpanel" aria-labelledby="nav-label-annotations">...</div>


</div>
    </div>      
            
</template>
<script>

export default {
 
    data: function () {
        return {
            genericNames: [],
            references: [],
            id: this.$route.params.id,
            currentPhenotype:[],
        }
    },
    methods:
    {
               
    },
    created()
    {
     
     /* */

      console.log(this.$route.params.id);
      axios.get('api/phenotype/'+this.$route.params.id)
                .then((response) => {        
                    this.currentPhenotype= response.data.data;  
                    //console.log(response.data)              
        
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

