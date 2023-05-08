<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import BookList from '@/Pages/AssignedBook/Partials/BookList.vue';
import SelectTeam from '@/Pages/AssignedBook/Partials/SelectTeam.vue';

const props = defineProps({
    current_team: Object,
    assigned_books: Object,
    books: Object,
});

</script>

<template>
    <AppLayout title="">
        <template #header>
            <div class="relative grid grid-cols-2">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        指定図書を登録する
                    </h2>
                </div>
                <div class="absolute right-0">
                    <SelectTeam :current_team="current_team"/>
                </div>
            </div>            
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <BookList :current_team="current_team" :assigned_books="assigned_books" :books="books"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
