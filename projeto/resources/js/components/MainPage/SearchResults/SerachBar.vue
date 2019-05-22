<template>
<div class="container">
  <div >
    <vue-bootstrap-typeahead 
      :data="addresses"
      v-model="addressSearch"
      size="lg"
      :serializer="s => s.name"
      placeholder="Type a name ..."
      @hit="selectedAddress = $event"
    >
    </vue-bootstrap-typeahead>

    <span class="input-group-btn">
      <button type="button" class="btn btn-primary">Search</button>
    </span>
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
      console.log(res);
      const suggestions = await res.json()
      console.log(suggestions);
      this.addresses = suggestions;
      console.log(this.addresses.idp);
      console.log(this.addresses.name);
    
    }
    
  },

  watch: {
    addressSearch: _.debounce(function(addr) { this.getAddresses(addr) }, 500)
  }
}
</script>
