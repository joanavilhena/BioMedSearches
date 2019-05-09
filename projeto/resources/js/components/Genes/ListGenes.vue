<template>
<div class = "container">
    
<div  opcity="0.8">
    <br>
    <br>
    <h1>Genes</h1>
    <br>
</div>

<div  v-if="!showGene">
     <div class="input-group mb-3">
      <input
        type="text"
        class="form-control"
        placeholder="Search for gene, variant, drug, chemical..."
        aria-label="Recipient's username"
        aria-describedby="button-addon2"
      >
      <div class="input-group-append">
        <button class="btn btn-primary" type="button" id="btn-search" @click="getSearchResults">Search</button>
      </div>
    </div>
  

  <table class="table table-hover table-dark">
    <thead>
        <tr table-light>
           
            <th>Name</th>
            <th>Symbol</th>
            <th>Chromosome</th>
            <th>Actions</th>
      

            
        </tr>
    </thead>

    <tbody>
       <tr v-for="(gene,index) in genes" :key="index">
          
           <td>{{gene.name}}</td>
           <td>{{gene.symbol}}</td>
           <td>{{gene.chromosome}}</td>
           <td><button v-on:click.prevent="showItem(gene)" class="btn btn-xs btn-light"><i class="fas fa-eye"></i></button></td>



       </tr>
         

    </tbody>    
  </table>

  <div class="overflow-auto">
   <b-pagination  align="center" size="md-c"  v-model="page" :limit="5" :total-rows="this.total"  :per-page="5" @input="getGenes(page)"></b-pagination>
  </div>

</div>

  



  </div>
</template>
<script>
    module.exports = {
        
        data: function () {
        return {
            showGene:false,
            genes: [],
            page:1,
            last:1,
            total:1,
            i:0,
            search:'',
        }

        },
        methods: {
            closeShowGene()
            {
                this.showGene=false;
            },
            getGenes(page)
            {
                axios.get('api/genes?page='+this.page)
                .then((response) => {

               
                //console.log(response.data);
                    
                this.genes= response.data.data;
                this.last = response.data.meta.last_page;
                this.total = response.data.meta.total;
                 

                //console.log(this.drugs);
              
                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            },

            showItem(gene)
            {
                this.showGene=true;
                this.$router.push('/gene/'+gene.idp);

                //this.currentGene = Object.assign({},gene);
            },

         
            getSearchResults()
            {
                let s = this.search
                 axios.get('api/genessearch',{ params: { search: this.search } })
                .then((response) => {

               
                    console.log(response.data.data);
                            
                    this.genes= response.data.data;
                    this.last = response.data.last_page;
                    this.total = response.data.total;

                  
                    
                
        
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
            this.getGenes();
            console.log("Criado");
        }
    };
    
</script>
<style>

</style>

