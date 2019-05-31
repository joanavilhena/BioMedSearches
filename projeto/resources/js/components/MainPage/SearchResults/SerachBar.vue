<template>


<div class="mb-3">
  
    <vue-bootstrap-typeahead 
      
      :data="addresses"
      v-model="addressSearch"
    
      size="lg"
      :serializer="s => s.name +' || ' + s.tableName"
      placeholder="Type a name ..."
      @hit="selectedAddress = $event"
      
    >
      
      
    </vue-bootstrap-typeahead>  
    <button class="btn btn-primary">Search</button>  
  
  

     
 
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
      console.log(res);
      const suggestions = await res.json()
      console.log(suggestions);
      this.addresses = suggestions;
     
    
    }
    
  },

  watch: {
    addressSearch: _.debounce(function(addr) { this.getAddresses(addr) }, 500)
  }
}
</script>
