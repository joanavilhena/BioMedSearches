<template>
  <div class="container">
    <div  opcity="0.8">
        <br>
        <br>
        <h1>Phenotypes</h1>
        
    <br>
    </div>

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



    <b-table responsive
      
      :fields="fields"
      :items="items"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      @filtered="onFiltered">

      <template slot="show_details" slot-scope="row">
        <b-button  size="sm" @click="go(row)" class="btn btn-xs btn-light">
          Clinical Variations  <i class="fas fa-eye"></i>
         
        </b-button>
      </template>
    </b-table>


     <b-row>
      <b-col md="6" class="my-1">
        <b-pagination
          allign="center"
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>

   
  </div>
</template>

<script>
export default {

  data: function () {

    

        return {
          items:[],
          total:1,
          last:1,
          page:1,
          perPage: 5,
          currentPage:1,
          search:'',
          filter:null,
          fields: [
          { key: 'idp', label: 'ID' },
          { key: 'name', label: 'Name' },
          'show_details',
          ],


        }
  },
  methods:{
     resetInfoModal() {
        this.infoModal.title = ''
        this.infoModal.content = ''
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      info(item, index, button) {
              this.infoModal.title = `Row index: ${index}`
              this.infoModal.content = JSON.stringify(item, null, 2)
              this.$root.$emit('bv::show::modal', this.infoModal.id, button)
      },
      getSearchResults(){
           axios.get('api/phenotypessearch',{ params: { search: this.search } })
                .then((response) => {

               
            console.log(response);
                    
                this.items= response.data.data;
                this.last = response.data.last_page;
                this.total = response.data.total;

                })
                .catch(function (error) {
                   
                    console.log(error);
                })
          
      },
      getPhenotypes()
      {
                axios.get('api/phenotypes')
                .then((response) => {
                    
                this.items= response.data;
                this.totalRows = response.data.length;
        
                })
                .catch(function (error) {
                 
                    console.log(error);
                })
      },
      go(row)  
      {
          this.$router.push('/phenotype/'+row.item.idp);
         //console.log(row.item.idp);
      }
   
  },
  beforeMount()
  {
      this.getPhenotypes();
  }

  
    
}
</script>
