<template>
<div class = "container">
    
<div  opcity="0.8">
    <br>
    <br>
    <h1>Chemicals</h1>
    <br>
</div>

<div  v-if="!showChemical">

    <div class="input-group mb-3">
        <input class="form-control"  placeholder="Search for name or PharmaGKB ID..." type="text" v-model="search">
        <button class="btn btn-primary" @click="getSearchResults">Search</button>
    </div>


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
       <tr v-for="(chemical,index) in chemicals" :key="index">
          
           <td>{{chemical.name}}</td>
           
           <td>{{chemical.genericNames}}</td>
           <td>{{chemical.type}}</td>
           <td><button v-on:click.prevent="showItem(chemical)" class="btn btn-xs btn-light"><i class="fas fa-eye"></i></button></td>



       </tr>
         

    </tbody>    
  </table>

  <div class="overflow-auto">
   <b-pagination  align="center" size="md-c"  v-model="page" :limit="5" :total-rows="this.total"  :per-page="5" @input="getChemicals(page)"></b-pagination>
  </div>

</div>

  


  </div>
</template>
<script>
    module.exports = {
        
        data: function () {
        return {
            showChemical:false,
            chemicals: [],
            page:1,
            last:1,
            total:1,
            i:0,
            search:'',
        }

        },
        methods: {
            closeShowChemical()
            {
                this.showChemical=false;
            },
            getChemicals(page)
            {
                axios.get('api/chemicals?page='+this.page)
                .then((response) => {

               
                //console.log(response.data);
                    
                this.chemicals= response.data.data;
                this.last = response.data.meta.last_page;
                this.total = response.data.meta.total;
                 

                //console.log(this.drugs);
              
                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            },

            showItem(chemical)
            {
                this.showChemical=true;
              //  this.currentDrug = Object.assign({},drug);
            },

            getSearchResults()
            {
                let s = this.search
                 axios.get('api/chemicalssearch',{ params: { search: this.search } })
                .then((response) => {

               
            console.log(response);
                    
               this.drugs= response.data.data;
                this.last = response.data.last_page;
                this.total = response.data.total;

                //console.log(this.drugs);
              
                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })

            },

           
        },
        created()
        {
            

        },
        mounted()
        {
            this.getChemicals();
            console.log("Criado");
        }
    };
</script>
<style>

</style>

