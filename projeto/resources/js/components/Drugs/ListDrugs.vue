<template>
<div class = "container">
    <h1>Hello</h1>
<div>

</div>
  <table class="table table-striped">
    <thead>
        <tr>
            <th>PharmaGKBID</th>
            <th>Name</th>
            <th>Generic Names</th>
            <th>Trade Names</th>
            <th>Brand Mixtures</th>
            <th>Type</th>
            <th>Cross-References</th>
            <th>SMILES</th>
            <th>InChi</th>
            
        </tr>
    </thead>
    <p>

    <tbody>
       <tr v-for="(drug,index) in drugs" :key="drug.idp">
           <td>{{drug.idp}}</td>
           <td>{{drug.name}}</td>
           <td>{{drug.genericNames}}</td>
           <td>{{drug.name}}</td>
           <td>{{drug.name}}</td>
           <td>{{drug.name}}</td>
           <td>{{drug.name}}</td>


       </tr>
         
         
        
    </tbody>
  </table>
  </div>
</template>
<script>
    module.exports = {
        
        data: function () {
        return {
            drugs: []
        }
        },
        methods: {
            getDrugs()
            {
                axios.get('api/drugs')
                .then((response) => {

               // this.$set(this,'drugs',response['data']['data']);
                    console.log(response.data.data);
                    
                this.drugs= response.data.data;
                 

                    console.log(this.drugs);
              
                
        
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            }
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

