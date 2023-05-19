<script setup>
import { ref } from 'vue'
import Datepicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'

const ref_yearmonth = ref();

</script>

<template>
  <Datepicker v-model="ref_yearmonth"   locale="jp" monthPicker >
  </Datepicker>
</template>