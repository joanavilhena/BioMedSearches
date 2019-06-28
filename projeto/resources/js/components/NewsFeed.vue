<template>
<div class="container">
    <br>
    <br>
    <b-jumbotron bg-variant="dark" text-variant="white">
        <template slot="header">News Feed</template>
        
       </b-jumbotron>
    <br>
    <div  id="feed" v-for="(result,index) in results" :key="index"> 
<b-card-group align="center">
 
    <b-card :title="result.title" :img-src="result.urlToImage" img-alt="Image" img-top  align="center" class="col-md-8">
      <b-card-text >
            {{ result.description }}
            </b-card-text>
            <b-card-text>
            {{  result.author  }}

            
            </b-card-text>

    <b-button text-variant="white" :href="result.url" variant="info">Read Original Post</b-button>
      <div slot="footer"><small class="text-muted"></small></div>
    </b-card>

     

</b-card-group>
    </div>


    
</div>

</template>

<script>
export default {
  
  data() {
    return {
       
            results: [
                
            ]
            
    }
  },
  methods:
  {
      getData()
      {
           axios.get('api/news' 
           )
                .then((response) => {
               
                console.log(response.data);
                    
                this.results= response.data.articles;   
                console.log(this.results);             
        
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
          
      

      }
  },
  mounted()
  {
      this.getData();
  }
 

}
</script>

<style>
.feed{
  align-content: center;
}
.btn{
  color: white;
}
</style>
