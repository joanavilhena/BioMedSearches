<template>
    <div class="container">
        <div class="">
            <h1>{{currentGene.name}}</h1>
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
                        <button @click="showChemicals" class="btn btn-xs" style="color:white; font-size: 16px;" >Associated Chemicals</button>
                    </li>
                    <li class="nav-item">
                        <button  @click="showDoseInfo" class="btn btn-xs" style="color:white; font-size: 16px;" >Dosing Info</button>
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
                <td> <h6> {{currentGene.idp}}</h6></td>
            </div>

            <div sytle="float:left;">
                <th><h5>Ensembl ID:</h5></th>
                <td> <h6> {{currentGene.ensemblId}}</h6></td>
            </div>
            <div sytle="float:left;">
                <th><h5>Name:</h5></th>
                <td> <h6> {{currentGene.name}}</h6></td>
            </div>


            <div sytle="float:left;">
                <th><h5>Generic Names:</h5></th>

                <ul style="list-style-type:none;" v-for="(name,index) in genericNames" :key="index">
                    <li>{{name}}</li>
        
                </ul>
            </div>

            <div v-if="genericNames==null">
                <p> No generic names</p>
            </div>
            

    </div>

     
        <button class="btn btn-warning" @click="atum()" >Back</button>

        





    </div>
</template>
<script>

export default {
 
    data: function () {
        return {
            genericNames: [],
            references: [],
            showingDetails:true,
            showingDosingInfo:false,
            showingPub:false,
            showingChemicals:false,
            id: this.$route.params.id,
            currentGene:[],
        }
    },
    methods:
    {
        atum()
        {
            console.log("atum");
            this.$router.push('/genes');
            this.$emit('show-drug',false);
        },

        showDoseInfo()
        {
            this.showingDetails=false;
            this.showingDosingInfo=true;
            this.showingPub=false;
            this.showingChemicals=false;
        },

        showPub()
        {
            this.showingDetails=false;
            this.showingDosingInfo=false;
            this.showingPub=true;
            this.showingChemicals=false;
        },
        showDetails()
        {
            this.showingDetails=true;
            this.showingDosingInfo=false;
            this.showingPub=false;
            this.showingChemicals=false;
        },
        showChemicals()
        {
            this.showingDetails=false;
            this.showingDosingInfo=false;
            this.showingPub=false;
            this.showingChemicals=true;
        }
        
    },
    created()
    {
     
     /* */

      console.log(this.$route.params.id);
      axios.get('api/gene/'+this.$route.params.id)
                .then((response) => {

               
                console.log(response.data);
                    
                this.currentGene= response.data.data;
    
              //  this.genericNames = this.currentDrug.genericNames;

                //console.log(this.drugs);
           /*   if(this.genericNames!=null)
      {
           let res = this.genericNames.split(",");
           this.genericNames=res;
           console.log(this.genericNames);
     
      }*/
                
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
      

    }
    


}

    

//$( document ).ready(function() {
 //   $( "#app" ).addClass( "app2" )
 //   });

</script>
<style>

 .app2{
            background-color: white;
            background-image: none;
        }

</style>
