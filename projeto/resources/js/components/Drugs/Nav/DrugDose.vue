<template>
   <div sytle="float:left;">
                <th><h5>Drug Dose Sources:</h5></th>

                <ul style="list-style-type:none;" v-for="(source,index) in sources" :key="index">
                    <li> {{source}}</li>
                   
                </ul>
            </div>
</template>

<script>
export default {
    props:['currentDrug'],
    data: function () {
        return {
            dosingGuideline: this.currentDrug.dosingGuideline,
            sources:[],
        }
    },
    created()
    {
        console.log("Drug dose");

        if(this.dosingGuideline!="No")
        {
            this.sources = this.currentDrug.dosingGuidelineSource;
        }
      /*  if(this.references!=null)
      {
          
        let res = this.references.split(",");

  
            
            console.log(res); 
           this.references=res;
           console.log(this.references);
      }*/


    }

}
</script>

<style>

</style>
