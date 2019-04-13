<template>
<div class = "container">
    
<div  opcity="0.8">
    <br>
    <br>
    <h1>Drugs</h1>
    <br>
</div>
  <table class="table table-hover table-dark">
    <thead>
        <tr table-light>
            <th>PharmaGKBID</th>
            <th>Name</th>
            <th>Generic Names</th>
            <th>Trade Names</th>
            <th>Brand Mixtures</th>
            <th>Type</th>
            <th>Actions</th>
      

            
        </tr>
    </thead>
    <p>

    <tbody>
       <tr v-for="(drug,index) in drugs" :key="drug.idp">
           <td>{{drug.idp}}</td>
           <td>{{drug.name}}</td>
           <td>{{drug.genericNames}}</td>
           <td>{{drug.tradeNames}}</td>
           <td>{{drug.brandMixtures}}</td>
           <td>{{drug.type}}</td>
           <td><button v-on:click.prevent="showItem(item)" class="btn btn-xs btn-light"><i class="fas fa-eye"></i></button></td>
  


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
            drugs: [],
            page:1,
            last:1,
            total:1,
        }
        },
        methods: {
            getDrugs(page)
            {
                axios.get('api/drugs?page='+this.page)
                .then((response) => {

               // this.$set(this,'drugs',response['data']['data']);
                    console.log(response.data);
                    
                this.drugs= response.data.data;
                this.last = response.data.meta.last_page;
                this.total = response.data.meta.total;
                 

                    console.log(this.drugs);
              
                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            },

            showItem(item)
            {

            },

           
        },
        created()
        {
            

        },
        mounted()
        {
            this.getDrugs();
            console.log("Criado");
        }
    };
</script>
<style>

</style>

