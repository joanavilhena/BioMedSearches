<template>
<div class = "container">
    
 <div  opcity="0.8">
        <br>
        <br>
        <h1>Genes</h1>
    <br>
    </div>

<div  v-if="!showChemical">
    


 <b-container fluid>
    <!-- User Interface controls -->
    <b-row>
      <b-col md="6" class="my-1">
        <b-form-group >
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
    <div class="table-responsive table-hover" >
    <b-table 
      :fields="fields"
      :items="items"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      @filtered="onFiltered"
    >
       <template slot="Actions" slot-scope="row">
        <b-button  variant ="info" @click="go(row.item.idp)" >
              <i class="fas fa-eye"></i>
          
        </b-button>
      </template>

      
    </b-table>
    </div>
<br>
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

  </b-container>
<br>
  <br>
  <br>
  <br>
  <br>
  <br>

</div>

    <show-chemical v-on:show-chemical="closeShowChemical" v-bind:currentChemical="currentChemical" v-if="showChemical"></show-chemical>



  </div>
</template>
<script>
    module.exports = {
        
        data: function () {
        return {
            showChemical:false,
            items: [],
            fields:
            [
               'Actions',
                { key: 'idp', label: 'PharmGKB ID' },
                { key: 'name', label: 'Name' },
                { key: 'nCBIGeneID', label: 'NCBI D',  },
                { key: 'hGNCID', label: 'HGNC ID' },
                { key: 'ensemblId', label: 'Ensembl ID' },
                { key: 'symbol', label: 'Symbol' },
                { key: 'alternateNames', label: 'Alternate Names' },
                { key: 'alternateSymbols', label: 'Alternate Symbols' },
                
            ],
            page:1,
            last:1,
            total:1,
            i:0,
            results:[],
            totalRows: 1,
            currentPage: 1,
            perPage: 5,
            filter: null,
        }

        },
        methods: {
            closeShowChemical()
            {
                this.showDrug=false;
            },
            getChemicals(page)
            {
                axios.get('api/genes?page='+this.page)
                .then((response) => {

                this.items= response.data;
                this.totalRows = response.data.length;

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            },

           

            go(gene)
            {
               // this.showDrug=true;
                this.$router.push('/gene/'+gene);
    
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
              }

           
           
        },



    
       
    
        created()
        {
            

        },
        mounted()
        {
            this.getChemicals();
           
            this.totalRows = this.items.length;
        },

         computed: {
      sortOptions() {
        // Create an options list from our fields
       
      }
    },
    };
</script>
<style>

</style>

