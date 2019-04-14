<template>
    <div>
        <div class="jumbotron">
            <h1>{{currentDrug.name}}</h1>
            <h3>Details</h3>
        </div>


        

        {{currentDrug}}

    </div>
</template>
<script>

export default {
    props:['currentDrug'],
    data: function () {
        return {
        }
    }

}
</script>
