<template>
    <div>
        <div sytle="float:left;">
                <th><h3>Related Chemicals:</h3></th>
                
              <br>
              
              <ul style="list-style-type:none;" v-for="(chemical,index) in chemicals" :key="index">
                    <li>PharmGKB ID: {{chemical.idp}}</li>
                    <li>Name: {{chemical.name}}</li>
                    <li>Generic Names: {{chemical.genericnames}}</li>
        
                </ul> 
            </div>
    </div>
    
</template>

<script>
export default {
   props:['currentDrug'],
    data: function () {
        return {
            chemicals: [],
            drug: [],
            id: this.$route.params.id,
            
        }
    },
    mounted()
    {
        //http://projeto.pi/api/drug/PA166178554/chemicals
    
    //let s = JSON.stringify(this.currentDrug.idp);
   // console.log("Aqui");
   // console.log(this.currentDrug.idp);
        axios.get('api/drug/'+this.id+'/chemicals')
                .then((response) => {

               
              //  
     //       console.log(response);
                    
                this.chemicals= response.data.data;
                console.log(this.chemicals);
              //  this.last = response.data.meta.last_page;
               // this.total = response.data.meta.total;

                })
                .catch(function (error) {
                    console.log(error);
                }) 
    },
    created()
    {
        this.drug = this.currentDrug;
        //console.log("aqui");
        //console.log(this.currentDrug);
    }

}
</script>

<style>

</style>
