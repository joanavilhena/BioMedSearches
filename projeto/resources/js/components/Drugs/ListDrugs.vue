<template>
<div class = "container">
    
<div  opcity="0.8">
    <br>
    <br>
    <h1>Drugs</h1>
    <br>
</div>
<div  v-if="!showDrug">
<form class="form-inline md-form form-sm mt-0">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" @keyup.enter="myFunction" type="text" placeholder="Search" aria-label="Search for drugs...">
</form>
  <table class="table table-hover table-dark">
    <thead>
        <tr table-light>
           
            <th >Name</th>
            <th>Generic Names</th>
           
            <th>Type</th>
            <th>Actions</th>
      

            
        </tr>
    </thead>

    <tbody>
       <tr v-for="(drug,index) in drugs" :key="drug.idp">
          
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

    <show-drug v-on:show-drug="closeShowDrug" v-bind:currentDrug="currentDrug" v-if="showDrug"></show-drug>



  </div>
</template>
<script>
    module.exports = {
        
        data: function () {
        return {
            showDrug:false,
            drugs: [],
            page:1,
            last:1,
            total:1,
            i:0,
        }

        },
        methods: {
            closeShowDrug()
            {
                this.showDrug=false;
            },
            getDrugs(page)
            {
                axios.get('api/drugs?page='+this.page)
                .then((response) => {

               
                //console.log(response.data);
                    
                this.drugs= response.data.data;
                this.last = response.data.meta.last_page;
                this.total = response.data.meta.total;
                 

                //console.log(this.drugs);
              
                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            },

            showItem(drug)
            {
                this.showDrug=true;
                this.currentDrug = Object.assign({},drug);
            },

            myFunction()
            {
                console.log("Keyup");
                this.i++;
                console.log(this.i);

                //axios get search on drugs
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

