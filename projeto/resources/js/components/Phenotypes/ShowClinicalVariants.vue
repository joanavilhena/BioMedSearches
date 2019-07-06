<template>
<div>
  <b-container fluid>
    <!-- User Interface controls -->

   <div v-if="showClinicalVariations">
    <br>
    <h3>Clinical Variations</h3>
    <br>
    <b-row>
      <b-col md="6" class="my-1">
        <b-form-group>
          <b-input-group>
            <b-form-input v-model="filter" placeholder="Type to Search"></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

   

    </b-row>
    <br>

     <div >
        
      </div>

    <!-- Main table element -->
    <b-table class=".table-responsive"
      show-empty
      striped 
      fixed
      responsive
      stacked="md"
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      @filtered="onFiltered"
    >
   
        
      <template slot="variant" slot-scope="row">
       <a @click="goVariant(row.item.variant)" >{{ row.item.variant}}</a>
      </template>

       <template slot="gene" slot-scope="row">
           
        <a @click="goGene(row.item.gene)" >{{ row.item.gene}}</a>
      </template>

      <template slot="chemicals" slot-scope="row">
        {{ row.item.chemicals}}
      </template>

      <template slot="Actions" slot-scope="row">
       <b-button size="sm" @click="showClinnicalAnn(row.item)" variant ="info">
          Clinical Annotations  <i class="fas fa-eye"></i>
        </b-button>

        <br>

        <!--  <b-button size="sm" @click="showStudyParams(row.item)" variant ="info">
          Variant Annotations <i class="fas fa-eye"></i>
        </b-button>-->
      </template>
      
    

     
      

      
    </b-table>

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

    <!-- Info modal -->
    <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
      <pre>{{ infoModal.content }}</pre>
    </b-modal>
    </div>
  
    


    <div  > <!-- Falta validar isto (No Data found)  -->

      <h5></h5>
    </div>

 <!-- Clinical Annotations-->
    <div v-if="showClinicalAnnotations">
      <show-clinical-annotations :ca="ca"  @backToggle="backToggle"></show-clinical-annotations>
    </div>

     <!-- Variant Annotations-->
    <div v-if="showVariantAnnotations">
      <show-variant-annotations :ca="ca"  @backToggle="backToggle"></show-variant-annotations>
    </div>

   

  </b-container>
    </div>
  
</template>

<script>
import { constants } from 'crypto';
  export default {
    data() {
      return {
        items: [],
        ca:[],
        fields: [
          { key: 'gene', label: 'Gene'},
          { key: 'variant', label: 'Variant' },
          { key: 'type', label: 'Type' },
          { key: 'levelofevidence', label: 'Level of Evidence', class: 'text-center' },
          { key: 'chemicals', label: 'Chemicals' },
          'Actions',
        ],
        

        totalRows: 1,
        currentPage: 1,
        perPage: 5,
        sortBy: null,
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        infoModal: {
          id: 'info-modal',
          title: '',
          content: ''
        },
        geneID:0,
        idVariant:0,
        isVariant:false,
        phenotype :'',
        showClinnical: true,
        PMIDs: '',
        showClinicalVariations:true,
        showVariantAnnotations:false,
        showClinicalAnnotations:false,
      }
    },
    computed: {
      sortOptions() {
        // Create an options list from our fields
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      }
    },
    mounted() {
      // Set the initial number of items
      this.totalRows = this.items.length
    },
    methods: {
    
      goGene(name)
      {
        //console.log(name);

        let id;
        axios.get('api/getGeneID',{ params: { search: name } })
                .then((response) => {

             id= response.data.data[0].idp;
               this.$router.push('/gene/'+id);
            // console.log(id);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })

        

             
      },
    goVariant(name)
      {
        console.log(name);

        let id;
        axios.get('api/getVariantID',{ params: { search: name } })
                .then((response) => {
        
             id  = response.data.data[0].idp;
               this.$router.push('/variant/'+id);
     
                })
                .catch(function (error) {
                 

                })

        

             
      },

      info(item, index, button) {
        this.infoModal.title = `Row index: ${index}`
        this.infoModal.content = JSON.stringify(item, null, 2)
        this.$root.$emit('bv::show::modal', this.infoModal.id, button)
      },
      resetInfoModal() {
        this.infoModal.title = ''
        this.infoModal.content = ''
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      getGeneID(name)
      {


           axios.get('api/getGeneID',{ params: { search: name } })
                .then((response) => {

               
         
                    
               this.geneID= response.data.data[0].idp;

                })
                .catch(function (error) {
                 
                })




      },
      back()
      {
        this.showClinnical = false;
      },
      backToggle()
      {
       
        this.showClinicalVariations = true;
        this.showClinicalAnnotations = false;
        this.showVariantAnnotations = false;
        console.log("estou no backToggle ");
      },

   
      showClinnicalAnn(item)
      {
        console.log(item);
        var jsonString = JSON.stringify(item);
   

                
                    this.showClinicalVariations = false;
                    this.showClinicalAnnotations = true;
                    this.showVariantAnnotations = false;

       this.ca = [
                         item.gene,
                        item.chemicals,
                        item.level_of_evidence,
                        this.phenotype,
                        item.type,
                        item.variant 
                    ];
              
    


      },
      showStudyParams(item)
      {
        
         console.log(item.chemicals);
         let chemicals = item.chemicals.replace(',','%');
         console.log(chemicals);
        var jsonString = JSON.stringify(item.chemicals);

                this.showClinicalVariations = false;
                    this.showClinicalAnnotations = false;
                    this.showVariantAnnotations = true;
        this.ca = [
         item.gene,
          chemicals,
         
        item.variant
        ]
   
 

     
            

      },
     
    },
    mounted()
    {
        
      axios.get('api/phenotype/'+this.$route.params.id+'/clinicalVariants')
                .then((response) => {        
                    this.items= response.data;  
                    this.totalRows = response.data.length;
                    
                    console.log(response.data)              
        
                })
                .catch(function (error) {     
                    console.log(error);
                });
                
      axios.get('api/phenotype/'+this.$route.params.id)
        .then((response)=>
        {
            console.log(response.data.data.name);
           this.phenotype = response.data.data.name;
            console.log(this.phenotype);
        });


      this.showClinnical = false;
        
        
    }


  }
</script>
<style>
#pmids
{
  display: inline-block;
}
</style>
