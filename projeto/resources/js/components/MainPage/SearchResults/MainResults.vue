<template>
    <div class="input-group mb-3" >
      
      <cool-select   class="form-control" v-model="selected" :items="items" placeholder="Select name">
      <!-- slot for each item in the menu -->
      <template slot="item" slot-scope="{ item }">
        <div style="display: flex;">
          <input v-if="editedItem === item" v-model="editedModel" @click.stop.prevent>
          <div v-else>{{ item.text }}</div>

          <button v-if="editedItem !== item" class="edit-btn" @click.stop="onEdit(item)">✏️</button>
          <button v-if="editedItem === item" class="save-btn" @click.stop="onSave(item)">Save</button>
        </div>
      </template>
    </cool-select>
      
      <div class="input-group-append">
        <button class="btn btn-primary" type="button" id="btn-search">Search</button>
      </div>
    </div>
      
</template>

<script>
export default {

}
</script>

<style>

</style>
