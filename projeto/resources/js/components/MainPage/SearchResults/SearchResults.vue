<template>
    <div class="container">
         <table class="table table-hover table-dark">
    <thead>
        <tr table-light>
           
            <th>Name</th>
            <th>Generic Names</th>
            <th>Type</th>
            <th>Actions</th>
      

            
        </tr>
    </thead>

    <tbody>
       <tr v-for="(drug,index) in drugs" :key="index">
          
           <td>{{drug.name}}</td>
           
           <td>{{drug.genericNames}}</td>
           <td>{{drug.type}}</td>
           <td><button v-on:click.prevent="showItem(drug)" class="btn btn-xs btn-light"><i class="fas fa-eye"></i></button></td>



       </tr>
         

    </tbody>    
  </table>

  <div class="overflow-auto">
   <b-pagination  align="center" size="md-c"  v-model="page" :limit="5" :total-rows="this.total"  :per-page="5" @input="getDrugs(page)"></b-pagination>
  </div>


    </div>
</template>

<script>
module.exports = {
  data: function () {
    return {

      results:[],
      page:1,
      last:1,
      total:1,
        
    }

  },
  methods: {

     getResults(page)
            {
                axios.get('api/search?page='+this.page)
                .then((response) => {
                    
                this.results= response.data.data;
                this.last = response.data.meta.last_page;
                this.total = response.data.meta.total;

                console.log(this.results);

                })
               
            },

   
  },
  mounted()
  {

  }



}
</script>

<style>

</style>
