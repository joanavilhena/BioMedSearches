<template>
<div class="container">
    <br>
    <br>
    <b-jumbotron bg-variant="">
        <template slot="header">News Feed</template>
        
       </b-jumbotron>
    <br>
    <div class="col-sm-8" id="feed" v-for="(result,index) in results" :key="index"> 
<b-card-group deck>
 
    <b-card :title="result.title" :img-src="result.urlToImage" img-alt="Image" img-top>
      <b-card-text>
            {{ result.description }}
            </b-card-text>
            <b-card-text>
            {{  result.author  }}
            </b-card-text>

    <b-button text-variant="white" :href="result.source.name" variant="info">Read Original Post</b-button>
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
