<template>
    <div>
        <div>
                 <th><h5>Cross References:</h5></th>
                  <ul style="list-style-type:none;" v-for="(reference,index) in references" :key="index">
                    <li>{{reference}}</li>
        
                </ul>
        </div>
    </div>
</template>
<script>
export default {
    props:['currentDrug'],
    data: function () {
        return {
            references: this.currentDrug.crossreferences,
        }
    },
    created()
    {
        if(this.references!=null)
      {
          
        let res = this.references.split(",");

        //for(let i = 0; i < res.Length; i++){
          //  res[i] = res[i].Replace("/", " ");
        //}
            
            console.log(res);   //prints: 123
           this.references=res;
           console.log(this.references);
      }
    }
    
}
</script>
<style>

</style>


    

    

 