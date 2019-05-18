<template>
<div class="container">
  <vue-bootstrap-typeahead
    :data="addresses"
    v-model="addressSearch"
    size="lg"
    :serializer="s => s.name"
    placeholder="Type a name ..."
    @hit="selectedAddress = $event"
  >
  </vue-bootstrap-typeahead>
  </div>
</template>

<script>


const API_URL = 'https://projeto.pi/api/search' //substituir pelo url do servidor

export default {
  name: 'TestComponent',

  data() {
    return {
      addresses: [],
      addressSearch: '',
      selectedAddress: null
    }
  },

  methods: {
    async getAddresses(query) {
      const res = await fetch(API_URL.replace(':query', query))
      console.log(res);
      const suggestions = await res.json()
      console.log(suggestions);
      this.addresses = suggestions
    }
  },

  watch: {
    addressSearch: _.debounce(function(addr) { this.getAddresses(addr) }, 500)
  }
}
</script>
