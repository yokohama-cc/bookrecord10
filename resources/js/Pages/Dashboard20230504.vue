<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

import ReadingRecordList from '@/Pages/ReadingRecord/Partials/ReadingRecordList.vue';

const props = defineProps({
    reading_records: Object,
 });

</script>

<template>
    <AppLayout title="読書記録">


        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                読書記録
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ReadingRecordList :reading_records="reading_records"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
