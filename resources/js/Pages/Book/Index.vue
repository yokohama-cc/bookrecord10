<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DeleteBookForm from '@/Pages/Book/Partials/DeleteBookForm.vue';

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
                    
                    <table class="my-5 mx-5 table-fixed border-collapse border border-slate-400 font-ja text-sm">
                        <thead>
                            <tr class="bg-sky-200">
                                <th class="border border-slate-300">タイトル</th>
                                <th class="border border-slate-300">著者名</th>
                                <th class="border border-slate-300">出版社名</th>
                                <th class="border border-slate-300">出版年</th>
                                <th class="border border-slate-300">ISBN</th>
                                <th colspan="2" class="border border-slate-300"></th>
                            </tr>
                        </thead>
                        <tbody v-for="book in books" :key="book.id" class="bg-state-100">
                            <tr>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">{{ book.name }}</td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">{{ book.author }}</td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">{{ book.company }}</td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">{{ book.year_publication }}</td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">{{ book.isbn }}</td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">
                                    <Link :href="route('books.edit', book)">
                                        <PrimaryButton>
                                            更新    
                                        </PrimaryButton>
                                    </link>
                                </td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm"><DeleteBookForm :book="book" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
