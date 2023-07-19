<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    items: {
        type: Array,
    },
    modelValue:{
      type:String,
      required:true
    }
});

defineEmits(['update:modelValue']);

</script>

<template>
  <select @change="$emit('update:modelValue', $event.target.value)" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
    <option value="">Select Role</option>
    <option v-for="(item, index) in items" :key="index" :value="item.id">{{ item.name }}</option>
  </select>
   
</template>
