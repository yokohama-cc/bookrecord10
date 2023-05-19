<script setup>

import { Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DeleteBookForm from '@/Pages/Book/Partials/DeleteBookForm.vue';
import Pagination from '@/Components/Pagination.vue';
const props = defineProps({
    books: Object,
});


</script>
<template>
  <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">タイトル</th>
            <th class="pb-4 pt-6 px-6">著者名</th>
            <th class="pb-4 pt-6 px-6">出版社</th>
            <th class="pb-4 pt-6 px-6">出版年</th>
            <th class="pb-4 pt-6 px-6" colspan="3">ISBN番号</th>            
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in books.data" :key="book.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
              <td class="border-t border-t pb-4 pt-6 px-6">{{ book.name }}</td>
              <td class="border-t border-t pb-4 pt-6 px-6">{{ book.author }}</td>
              <td class="border-t border-t pb-4 pt-6 px-6">{{ book.company }}</td>
              <td class="border-t border-t pb-4 pt-6 px-6">{{ book.year_publication }}</td>
              <td class="border-t border-t pb-4 pt-6 px-6">{{ book.isbn }}</td>
              <td class="w-px border-t border-t pb-4 pt-6 px-6">
                <Link :href="route('books.edit', book)">
                    <PrimaryButton>
                        更新    
                    </PrimaryButton>
                </link>
              </td>
              <td class="w-px border-t border-t pb-4 pt-6 px-6">
                <DeleteBookForm :book="book" />
              </td>
            </tr>
           
          </tbody>
        </table>
        <Pagination class="mt-6" :links="books.links" />
    
  </div>

</template>

