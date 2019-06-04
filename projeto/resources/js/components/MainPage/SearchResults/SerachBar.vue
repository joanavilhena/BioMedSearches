<template>


<div class="mb-3">



  
    <vue-bootstrap-typeahead 
      
      :data="addresses"
      v-model="addressSearch"
    class="mb-3"
      size="lg"
      :serializer="s => s.name +' || ' + s.tableName"
      placeholder="Type a name ..."
      @hit="selectedAddress = $event"
      
    >
      
      
    </vue-bootstrap-typeahead>  
    
  <div>
    <b-button @click="irPara" block variant="primary">Search</b-button>
  </div>
  

     
 
</div>

</template>

<script>
import { timeout } from 'q';


const API_URL = 'https://biomedsearch.me/api/search' //substituir pelo url do servidor

export default {

  data() {
    return {
      addresses: [],
      addressSearch: '',
      selectedAddress: null
    }
  },

  methods: {
    async getAddresses(query) {
      const res = await fetch(API_URL.replace(':query', query),{ timeout: 1000})
     // console.log(res);
      const suggestions = await res.json();
     // console.log(suggestions);
      this.addresses = suggestions;
     
    
    },

    irPara()
    {
     this.$router.push('/' + this.selectedAddress.tableName + '/' + this.selectedAddress.idp);
    //this.$router.push('/drug/'+drug.idp);
     
     //console.log(this.selectedAddress);
    

    }
    
  },

  watch: {
    addressSearch: _.debounce(function(addr) { this.getAddresses(addr) }, 500)
  }
}
</script>
