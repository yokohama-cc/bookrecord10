<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import UpdateReadingRecordForm from '@/Pages/ReadingRecord/Partials/UpdateReadingRecordForm.vue';

const props = defineProps({
    reading_record: Object,
});

</script>

<template>
    <AppLayout title="読書記録を変更する">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                読書記録を変更する
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <UpdateReadingRecordForm :reading_record="reading_record"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>




