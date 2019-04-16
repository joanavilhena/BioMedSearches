<template>
    <div>
        <div sytle="float:left;">
                <th><h5>Associated Chemicals:</h5></th>

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
        }
    },
    created()
    {
        //http://projeto.pi/api/drug/PA166178554/chemicals
        console.log(this.currentDrug);
        axios.get('api/drug/'+this.currentDrug.idp+'/chemicals')
                .then((response) => {

               
                console.log(response.data);
                    
                this.chemicals= response.data.data;
              //  this.last = response.data.meta.last_page;
               // this.total = response.data.meta.total;

                })
                .catch(function (error) {
                    console.log(error);
                })
    }

}
</script>

<style>

</style>
