<script setup>
import { ref } from 'vue'
import Datepicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'

const date = ref(new Date())
</script>

<template>
  <Datepicker 
      v-model="date" 
      locale="jp" 
      yearPicker 
      class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
  </Datepicker>
</template>