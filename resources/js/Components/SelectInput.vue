<script setup>
import { computed } from 'vue';

const props = defineProps({
    modelValue: String,
    optionValues: Object,
});

defineEmits(['update:modelValue']);

const proxySelect = computed({
    get() {
        return props.modelValue;
    },

    set(val) {
        emit('update:modelValue', val);
    },
});

</script>


<template>
    <select
        v-model = "proxySelect"
        :value = "modelValue"
        class="rounded border-gray-300  shadow-sm focus:ring-indigo-500">
            <option v-for="optionValue in optionValues" :key="optionValue.id" :value="optionValue.id">{{optionValue.name}}</option>
    </select>
</template>
