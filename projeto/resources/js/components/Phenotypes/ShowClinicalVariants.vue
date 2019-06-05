<template>
  <b-container fluid>
    <!-- User Interface controls -->

    <h2>Clinical Variants</h2>
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

    <!-- Main table element -->
    <b-table
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
        <a :href="'#/variant/' + row.item.variant">{{ row.item.variant}}</a> 
      </template>
       <template slot="gene" slot-scope="row">
           {{getGeneID(row.item.gene)}}
        <a :href="'#/gene/' + geneID">{{ row.item.gene}}</a>
      </template>
      <template slot="chemicals" slot-scope="row">
        {{ row.item.chemicals}}
      </template>
      
    

     
      

      
    </b-table>

    <b-row>
      <b-col md="6" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>

    <!-- Info modal -->
    <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
      <pre>{{ infoModal.content }}</pre>
    </b-modal>
  </b-container>
</template>

<script>
  export default {
    data() {
      return {
        items: [],
        fields: [
          { key: 'variant', label: 'Variant' },
          { key: 'gene', label: 'Gene'},
          { key: 'type', label: 'Type' },
          { key: 'level of evidence', label: 'Level of Evidence', class: 'text-center' },
          { key: 'chemicals', label: 'Chemicals' }
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
        isVariant:false
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
         // this.idGene=1;
        
         //console.log("Hello")
        // console.log(name);

           axios.get('api/getID',{ params: { search: name } })
                .then((response) => {

               
           // console.log(response.data.data[0].idp);
                    
               this.geneID= response.data.data[0].idp;
                //this.last = response.data.last_page;
                //this.total = response.data.total;

                //console.log(this.drugs);
              
                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })




      }
    },
    created()
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

        
        
    }


  }
</script>