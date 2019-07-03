<template>
  <div class="mb-3">
    <div v-if="loading" class="clearfix">
      <b-spinner class="float-right" label="Floated Right"></b-spinner>
    </div>
    <br>
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
      selectedAddress: null,
      loading: false,
    }
  },
  methods: {
    async getAddresses(query) {
      this.loading= true;
      const res = await fetch(API_URL.replace(':query', query),{ timeout: 1000})
      const suggestions = await res.json();
      this.addresses = suggestions;
      this.loading =false;
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
