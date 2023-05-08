<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DeleteReadingRrecordForm from '@/Pages/ReadingRecord/Partials/DeleteReadingRecordForm.vue';
import ReadingRecordList from '@/Pages/ReadingRecord/Partials/ReadingRecordList.vue';
defineProps({
    reading_records: Object,
    current_team: Object,
    teams:Object,
});

</script>

<template>
    <AppLayout title="読書記録">
        <template #header>
            <div class="relative grid grid-cols-2">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        読書記録
                    </h2>
                </div>
                <div class="absolute right-0">
                        <Link :href="route('reading_records.create')">
                            <PrimaryButton class="bg-blue-700 text-base">読書記録を登録する</PrimaryButton>
                        </Link>
                </div>
            </div>            
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <ReadingRecordList :reading_records="reading_records" :current_team="current_team" :teams="teams"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
