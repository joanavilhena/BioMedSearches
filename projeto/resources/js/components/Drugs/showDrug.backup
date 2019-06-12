<template>
    <div class="container">
        <div class="">
            <h1>Drug: {{currentDrug.name}}</h1>

            <br>
        </div>

        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-details" aria-selected="true">Details</a>
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
      <p><strong> ID: </strong>{{currentDrug.idp}}</p>
      <p><strong>Type:  </strong>{{currentDrug.type}} </p>
      <p><strong>Name: </strong>{{currentDrug.name}}</p> 
      <span><strong>Generic Names: </strong></span>
      <ul style="list-style-type:none;" v-for="(name,index) in genericNames" :key="index">
                    <li>{{name}}</li>        
    </ul>
     <span v-if="genericNames==' '">No generic names</span>
      </div>
    </div>
  <div class="tab-pane fade" id="nav-associated-chemicals" role="tabpanel" aria-labelledby="nav-associated-chemicals-tab"></div>
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
            currentDrug:[],
        }
    },
    methods:
    {
               
    },
    created()
    {
     
     /* */

      console.log(this.$route.params.id);
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

