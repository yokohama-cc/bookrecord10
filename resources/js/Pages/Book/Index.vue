<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
import PrimaryButton from '@/Components/PrimaryButton.vue';
defineProps({
    books: Array,
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
                    
                    <div class="grid grid-cols-5 gap-4 bg-pink-300 px-5 py-5 rounded-lg">
                        <div>タイトル</div>
                        <div>著者名</div>
                        <div>出版社名</div>
                        <div>出版年</div>
                        <div>ISBN</div>
                    </div>
                    <div v-for="book in books" :key="book.id" class="grid grid-cols-5 gap-4 mx-5 my-5">
                        <div>{{ book.name }}</div>
                        <div>{{ book.author }}</div>
                        <div>{{ book.company }}</div>
                        <div>{{ book.year_publication }}</div>
                        <div>{{ book.isbn }}</div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
