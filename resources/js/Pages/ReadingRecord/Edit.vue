<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import UpdateReadingRecordForm from '@/Pages/ReadingRecord/Partials/UpdateReadingRecordForm.vue';

const props = defineProps({
    reading_record: Object,
    book_name: String,
    canUpdate:Boolean,
});

</script>

<template>
    <AppLayout title="読書記録を変更する">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                読書記録
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                
                    <UpdateReadingRecordForm :reading_record="reading_record" :book_name="book_name" :canUpdate="canUpdate"  />
                
            </div>
        </div>
    </AppLayout>
</template>




