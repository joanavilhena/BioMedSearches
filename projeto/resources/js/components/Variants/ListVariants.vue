<template>
<div class = "container">
    
<div  opcity="0.8">
    <br>
    <br>
    <h1>Variants</h1>
    <br>
</div>

<div  v-if="!showVariant">

    <div class="input-group mb-3">
        <input class="form-control"  placeholder="Search for name or PharmaGKB ID..." type="text" v-model="search">
        <button class="btn btn-primary" @click="getSearchResults">Search</button>
    </div>


  <table class=" table table-striped .table-responsive ">
    <thead>
        <tr table-light>
           
            <th scope="col">Name</th>
            <th scope="col">Symbol</th>
            <th scope="col">Gene IDs</th>
            <th scope="col">Gene Symbols</th>
            <th scope="col">Synonyms</th>
            <th scope="col">Actions</th>
      
        </tr>
    </thead>

    <tbody>
       <tr v-for="(variant,index) in variants" :key="index">
          
           <td>{{variant.name}}</td>
           <td>{{variant.variantSymbol}}</td>
           <td>{{variant.geneIDs}}</td>
           <td>{{variant.geneSymbols}}</td>
           <td>{{variant.synonyms}}</td>
           <td><button v-on:click.prevent="showItem(variant)" class="btn btn-xs btn-light">Details <i class="fas fa-eye"></i></button></td>



       </tr>
         

    </tbody>    
  </table>
  </div>

  <div class="overflow-auto">
   <b-pagination  align="center" size="md-c"  v-model="page" :limit="5" :total-rows="this.total"  :per-page="5" @input="getVariants(page)"></b-pagination>
  </div>

</div>

  


  </div>
</template>
<script>
    module.exports = {
        
        data: function () {
        return {
            showVariant:false,
            variants: [],
            page:1,
            last:1,
            total:1,
            i:0,
            search:'',
        }

        },
        methods: {
            closeShowVariant()
            {
                this.showVariant=false;
            },
            getVariants(page)
            {
                axios.get('api/variants?page='+this.page)
                .then((response) => {

               
                console.log(response.data);
                    
                this.variants= response.data.data;
                this.last = response.data.meta.last_page;
                this.total = response.data.meta.total;
                 

                //console.log(this.drugs);
              
                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            },

            showItem(variant)
            {
                this.showVariant=true;
                this.$router.push('/variant/'+variant.idp);
              //  this.currentDrug = Object.assign({},drug);
            },

            getSearchResults()
            {
                let s = this.search
                axios.get('api/variantssearch',{ params: { search: this.search } })
                .then((response) => {

               
            console.log(response);
                    
               this.variants= response.data.data;
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
            this.getVariants();
            console.log(this.variants);
            console.log("Criado");
            
        }
    };
</script>
<style>

</style>

