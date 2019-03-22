<template>
  <table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Type</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <tr v-for="(drug,index) in drugs" v-bind:key="drug.gene_id"> <!-- o users é o que esta no app.js -->
            <td>{{drug.gene_id}}</td>
            <td>{{drug.gene_symbol}}</td>
            <td>{{drug.label_ids}}</td>
            <td>{{drug.label_name}}</td>
         
         
        </tr>
    </tbody>
  </table>
</template>
<script>
    module.exports = {
        
        data:function () {
           return
           {
               drugs:[],
           }
        },
        methods: {
            getDrugs()
            {
                axios.get('api/drugs')
                .then(response)
                {
                    this.drugs = response.data;
                    console.log(drugs);
                };
            }
        },
        created()
        {
            this.getDrugs();

        }
    };
</script>
