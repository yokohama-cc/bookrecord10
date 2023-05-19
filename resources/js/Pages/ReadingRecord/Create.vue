<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateReadingRecordForm from '@/Pages/ReadingRecord/Partials/CreateReadingRecordForm.vue';

const props = defineProps({
    book_id: Number,
    book_name: String,
});

</script>

<template>
    <AppLayout title="読書記録を登録する">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                読書記録
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                
                    <CreateReadingRecordForm :book_id="book_id" :book_name="book_name"/>
                
            </div>
        </div>
    </AppLayout>
</template>




