<template>
    <div>
        <div class="">
            <h1>{{currentDrug.name}}</h1>
            <br>
            <h3>Details</h3>
        </div>

        <nav id="na" class=" navbar-custom navbar navbar-expand-xl navbar-dark " style="color=black">
        
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button @click="showDetails" class="btn btn-xs" style="color:white; font-size: 16px;" >Details</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-xs" style="color:white; font-size: 16px;" >Dosing Info</button>
                    </li>
                    <li class="nav-item">
                        <button @click="showPub" class="btn btn-xs" style="color:white; font-size: 16px;" >Pubs</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-xs" style="color:white;" >Clinical Annotations</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-xs" style="color:white; font-size: 16px;" >Drug Annotations</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-xs" style="color:white; font-size: 16px;" >Variant Annotations</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-xs" style="color:white; font-size: 16px;" >Label Annotations</button>
                    </li>
          
      
                </ul>
            </div>
        </nav>

    <div v-if="showingDetails" >
            <div sytle="float:left;">
                <th><h5>PharmGKB ID:</h5></th>
                    <td> <h6> {{currentDrug.idp}}</h6></td>
            </div>

            <div sytle="float:left;">
                <th><h5>Generic Names:</h5></th>

                <ul style="list-style-type:none;" v-for="(name,index) in genericNames" :key="index">
                    <li>{{name}}</li>
        
                </ul>
            </div>
            

    </div>

        <show-drug-dose v-if="showingDosingInfo"></show-drug-dose>
        <show-drug-pubs v-bind:currentDrug="currentDrug" v-if="showingPub"></show-drug-pubs>
        <button class="btn btn-warning" @click="atum()" >Back</button>

        





    </div>
</template>
<script>

export default {
    props:['currentDrug'],
    data: function () {
        return {
            genericNames: this.currentDrug.genericNames,
            references: this.currentDrug.crossreferences,
            showingDetails:true,
            showingDosingInfo:false,
            showingPub:false,
        }
    },
    methods:
    {
        atum()
        {
            console.log("atum");
            this.$router.push('/drugs');
            this.$emit('show-drug',false);
        },

        showPub()
        {
            this.showingDetails=false;
            this.showingDosingInfo=false;
            this.showingPub=true;
        },
        showDetails()
        {
            this.showingDetails=true;
            this.showingDosingInfo=false;
            this.showingPub=false;
        }
    },
    created()
    {
     
      if(this.genericNames!=null)
      {
           let res = this.genericNames.split(",");
           this.genericNames=res;
           console.log(this.genericNames);
     
      }
      

    }
    

}
</script>
<style>


.navbar-custom {
background-color: black;

}

.list-group{
    width:25%;
    height:50%;
  
}
.box{
  width:100%;
  display:block;
  padding:5px;
  clear:both;
}
.innerBox{
  width:33%;
  height:200px;
  background-color:#ccc;
  border:1px solid #444;
}
.innerBox.left{
  float:left;
}
.innerBox.center{
  margin:auto;
}
.innerBox.right{
  float:right;
}


</style>
