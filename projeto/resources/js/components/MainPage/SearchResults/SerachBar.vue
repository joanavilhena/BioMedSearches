<template>
  <div class="mb-3">
    <vue-bootstrap-typeahead 
      :data="addresses"
      v-model="addressSearch"
      class="mb-3"
      size="lg"
      :serializer="s => s.name +' | ' + s.tableName"
      placeholder="Type a name ..."
      @hit="selectedAddress = $event"
      >  
    </vue-bootstrap-typeahead>  
    <div>
      <b-button @click="irPara" block variant="primary">Go</b-button>
    </div>
  </div>

</template>

<script>
import { timeout } from 'q';


const API_URL = '/api/search'

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
      const suggestions = await res.json();
      this.addresses = suggestions;
    },
    irPara()
    {
     this.$router.push('/' + this.selectedAddress.tableName + '/' + this.selectedAddress.idp);
    }
  },
  watch: {
    addressSearch: _.debounce(function(addr) { this.getAddresses(addr) }, 500)
  }
}
</script>
