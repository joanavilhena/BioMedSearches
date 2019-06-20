<template>
<div class="container">
    <br>
    <br>
    <h2>Feed News</h2>
    <br>
    <div class="columns medium-3" v-for="(result,index) in results" :key="index"> 
    <div class="card">
        <div class="card-divider">
        {{ result.title }}
        </div>
        <div class="card-section">
        <img :src="result.urlToImage"></img>
        </div>
        <div class="card-section">
        {{ result.description }}
        </div>
        <div class="card-section">
        <a :href="result.url">{{ result.source.name }}</a>
        </div>
        <div class="card-section">
        {{ result.author }}
        </div>
        
    </div>
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
