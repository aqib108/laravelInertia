<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';

const props = defineProps({
    columns: {
        type: Array,
        default: [],
    },
    data:{
      type:Array,
      default:[]
    }
   
});
</script>
<template>
   <table class="table">
  <thead>
    <tr>
      <th v-for="col in columns" scope="col">{{ col }}</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(row,index) in data" :key="index">
      <th scope="row">{{ index+1 }}</th>
      <td>{{ row.name }}</td>
      <td>{{ row.email }}</td>
      <td>role</td>
      <td>{{ row.created_at }}</td>
    </tr>
    
  </tbody>
</table>
</template>