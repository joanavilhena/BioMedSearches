<template>
    <div>
        <div sytle="float:left;">
                <th><h3>Related Diseases:</h3></th>
                
              <br>
              
              <ul style="list-style-type:none;" v-for="(disease,index) in diseases" :key="index">
                    
                    <li>Name: {{disease}}</li>
                    
        
                </ul> 
            </div>
    </div>
    
</template>

<script>
export default {
   props:['currentDrug'],
    data: function () {
        return {
            diseases: [],
            drug: [],
            id: this.$route.params.id,
            
        }
    },
    mounted()
    {
        console.log("estou aqui");
      
        axios.get('/api/chemicals/relatedDiseases',{params: {search:this.id}})
                .then((response) => {

               
              //  
            console.log(response);
                    
               console.log(response);
               this.diseases = response.data;
               console.log(this.diseases);

          
    
                })
                .catch(function (error) {
                    console.log(error);
                }) 
    },
    created()
    {
        this.drug = this.currentDrug;
  
    }

}
</script>

<style>

</style>
