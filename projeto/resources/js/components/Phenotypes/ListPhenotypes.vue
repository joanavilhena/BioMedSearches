<template>
  <div class="container">
    <div  opcity="0.8">
        <br>
        <br>
        <h1>Phenotypes</h1>
    <br>
    </div>

     <div class="input-group mb-3">
        <input class="form-control"  placeholder="Search for name or PharmaGKB ID..." type="text" v-model="search">
        <button class="btn btn-primary" @click="getSearchResults">Search</button>
    </div>


    <b-table responsive :fields="fields" :items="items"  fixed class=".table-responsive">

      <template slot="show_details" slot-scope="row">
        <b-button  size="sm" @click="go(row)" class="btn btn-xs btn-light">
          Clinical Variations  <i class="fas fa-eye"></i>
         
        </b-button>
      </template>
    </b-table>


    <div class="overflow-auto">
   <b-pagination  align="center" size="md-c"  v-model="page" :limit="5" :total-rows="this.total"  :per-page="5" @input="getPhenotypes(page)"></b-pagination>
  </div>

   
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
          search:'',
          fields: [
          { key: 'idp', label: 'ID' },
          { key: 'name', label: 'Name' },
          'show_details',
          ],


        }
  },
  methods:{
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
      getPhenotypes(page)
      {
                axios.get('api/phenotypes?page='+this.page)
                .then((response) => {
                    
                this.items= response.data.data;
                this.last = response.data.meta.last_page;
                this.total = response.data.meta.total;

        
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
      this.getPhenotypes(1);
  }

  
    
}
</script>
