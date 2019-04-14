<template>
    <div>
        <div class="jumbotron">
            <h1>{{currentDrug.name}}</h1>
            <h3>Details</h3>
        </div>

        <button @click="atum()" >Voltar atras</button>




        {{currentDrug}}

    </div>
</template>
<script>

export default {
    props:['currentDrug'],
    data: function () {
        return {
        }
    },
    methods:
    {
        atum()
        {
            console.log("atum");
            this.$router.push('/drugs');
            this.$emit('show-drug',false);
        }
    }
    

}
</script>
