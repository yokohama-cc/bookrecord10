<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import BookList from '@/Pages/Book/Partials/BookList.vue';
defineProps({
    books: Object,
});

</script>

<template>
    <AppLayout title="図書">
        <template #header>
            <div class="relative grid grid-cols-2">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        図書
                    </h2>
                </div>
                <div class="absolute right-0">
                        <Link :href="route('books.create')">
                            <PrimaryButton class="bg-blue-700 text-base">登録</PrimaryButton>
                        </Link>
                </div>
            </div>            
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <BookList :books="books"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
