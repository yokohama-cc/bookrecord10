<script setup>

import { useForm, router, Link } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';
import { toRef } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    current_team_id: Number,
    books: Object,
    assigned_books: Object,
});

const deleteForm = useForm({
  team_id: props.current_team_id,
});



const addForm = useForm({
    team_id: props.current_team_id,
    book_id: '',
});

const deleteAssignedBook = (assigned_book) => {
        deleteForm.delete(route('assigned_books.destroy', assigned_book), {
        errorBag: 'deleteAssignedBook',
    });
};

const addAssignedBook = (book) => {
    addForm.book_id = book.id;
    // formAdd.transform(props.team_id,book.id) => {team_id:team_id,book_id:book_id}
    addForm.post(route('assigned_books.add'), {
        errorBag: 'addAssignedBook',
    });
};
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
            <th class="pb-4 pt-6 px-6" colspan="2">ISBN番号</th>            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan = "6" >
              指定図書登録済み
            </td>
          </tr> 
          <tr v-for="assigned_book in assigned_books" :key="assigned_book.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
              <td class="border-t pb-4 pt-6 px-6">{{ assigned_book.book.name }}</td>
              <td class="border-t pb-4 pt-6 px-6">{{ assigned_book.book.author }}</td>
              <td class="border-t pb-4 pt-6 px-6">{{ assigned_book.book.company }}</td>
              <td class="border-t pb-4 pt-6 px-6">{{ assigned_book.book.year_publication }}</td>
              <td class="border-t pb-4 pt-6 px-6">{{ assigned_book.book.isbn }}</td>
              <td class="w-px border-t pb-4 pt-6 px-6">
                <Link @click="deleteAssignedBook(assigned_book)">
                  <PrimaryButton>
                    解除    
                  </PrimaryButton>
                </link>
              </td>
            </tr>
            <tr>
              <td colspan = "6" >
                指定図書未登録
              </td>
            </tr>
            
            <tr v-for="book in books" :key="book.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
              <td class="border-t pb-4 pt-6 px-6">{{ book.name }}</td>
              <td class="border-t pb-4 pt-6 px-6">{{ book.author }}</td>
              <td class="border-t pb-4 pt-6 px-6">{{ book.company }}</td>
              <td class="border-t pb-4 pt-6 px-6">{{ book.year_publication }}</td>
              <td class="border-t pb-4 pt-6 px-6">{{ book.isbn }}</td>
              <td class="w-px border-t pb-4 pt-6 px-6">
                <Link @click="addAssignedBook(book)">
                  <PrimaryButton>
                    登録    
                  </PrimaryButton>
                </link>
              </td>
            </tr>
           
          </tbody>
        </table>
    
    
  </div>
  
</template>

