<template>
<div class = "container">
    
<div  opcity="0.8">
    <br>
    <br>
    <h1>Drugs</h1>
    <br>
</div>

<div  v-if="!showDrug">

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
            search:'',
            results:[],
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

            getSearchResults()
            {
                let s = this.search
                 axios.get('api/drugssearch',{ params: { search: this.search } })
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

            showItem(drug)
            {
                this.showDrug=true;
                this.$router.push('/drug/'+drug.idp);
    
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

