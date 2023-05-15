<script setup>

import { Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    books: Object,
    assigned_books: Object,
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
          <tr>
            <td colspan = "6" >
              指定図書登録済み
            </td>
          </tr> 
          <tr v-for="assigned_book in assigned_books" :key="assigned_book.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
              <td class="border-t">{{ assigned_book.book.name }}</td>
              <td class="border-t">{{ assigned_book.book.author }}</td>
              <td class="border-t">{{ assigned_book.book.company }}</td>
              <td class="border-t">{{ assigned_book.book.year_publication }}</td>
              <td class="border-t">{{ assigned_book.book.isbn }}</td>
              <td class="w-px border-t">
                <Link :href="route('reading_records.add', assigned_book.id)">
                  <PrimaryButton>
                    登録    
                  </PrimaryButton>
                </link>
              </td>
              <td class="w-px border-t">
                <Link :href="route('reading_records.booklist', assigned_book.id)">
                  <PrimaryButton>
                    読書記録参照    
                  </PrimaryButton>
                </link>
              </td>
            </tr>
            <tr>
              <td colspan = "7" >
                指定図書未登録
              </td>
            </tr>
            
            <tr v-for="book in books" :key="book.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
              <td class="border-t">{{ book.name }}</td>
              <td class="border-t">{{ book.author }}</td>
              <td class="border-t">{{ book.company }}</td>
              <td class="border-t">{{ book.year_publication }}</td>
              <td class="border-t">{{ book.isbn }}</td>
              <td class="w-px border-t">
                <Link :href="route('reading_records.add', book.id)">
                  <PrimaryButton>
                    登録    
                  </PrimaryButton>
                </link>
              </td>
              <td class="w-px border-t">
                <Link :href="route('reading_records.booklist', book.id)">
                  <PrimaryButton>
                    読書記録参照    
                  </PrimaryButton>
                </link>
              </td>
            </tr>
           
          </tbody>
        </table>
    
    
  </div>

</template>

