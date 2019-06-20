<template>
<div class="container">
    <br>
    <br>
    <h2>Feed News</h2>
    <br>
    <div class="columns medium-3" v-for="(result,index) in results" :key="index"> 
        <b-card
        :title="result.title"
        :img-src="result.urlToImage"
        img-alt="Image"
        img-top
        tag="article"
        style="max-width: 20rem;"
        class="mb-2"
        >
            <b-card-text>
            {{ result.description }}
            </b-card-text>
            <b-card-text>
            {{  result.author  }}
            </b-card-text>

    <b-button :href="result.source.name" variant="primary">Go somewhere</b-button>
  </b-card>
    
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
           axios.get('https://newsapi.org/v2/everything?q=pharmacogenetics&apiKey=2792461d8d5145bd84197285c6b1d202', {headers: {'X-CSRF-Token': undefined}}
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

</style>
