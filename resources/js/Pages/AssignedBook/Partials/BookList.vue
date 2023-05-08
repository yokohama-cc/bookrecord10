<script setup>

import { useForm, router, Link } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';
import { toRef } from 'vue';

const props = defineProps({
    current_team: Object,
    books: Object,
    assigned_books: Object,
});

const deleteForm = useForm({
  team_id: '',
});



const addForm = useForm({
    team_id: '',
    book_id: '',
});

const deleteAssignedBook = (assigned_book,current_team_value) => {
    deleteForm.team_id = current_team_value.id;
    deleteForm.delete(route('assigned_books.destroy', assigned_book), {
        errorBag: 'deleteAssignedBook',
    });
};

const addAssignedBook = (book,current_team_value) => {
    addForm.team_id = current_team_value.id;
    addForm.book_id = book.id;
    // formAdd.transform(props.team_id,book.id) => {team_id:team_id,book_id:book_id}
    addForm.post(route('assigned_books.add'), {
        errorBag: 'addAssignedBook',
    });
};
</script>
<template>

  <span v-for="current_team_value in current_team">
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
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="deleteAssignedBook(assigned_book,current_team_value)">
                    {{ assigned_book.book.name }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="deleteAssignedBook(assigned_book,current_team_value)" tabindex="-1">
                    {{ assigned_book.book.author }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="deleteAssignedBook(assigned_book,current_team_value)" tabindex="-1">
                    {{ assigned_book.book.company }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="deleteAssignedBook(assigned_book,current_team_value)" tabindex="-1">
                    {{ assigned_book.book.year_publication }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="deleteAssignedBook(assigned_book,current_team_value)" tabindex="-1">
                    {{ assigned_book.book.isbn }}
                </Link>
              </td>
              <td class="w-px border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="deleteAssignedBook(assigned_book,current_team_value)" tabindex="-1">
                    <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                </Link>
              </td>
            </tr>
            <tr>
              <td colspan = "6" >
                指定図書未登録
              </td>
            </tr>
            
            <tr v-for="book in books" :key="book.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="addAssignedBook(book,current_team_value)">
                  {{ book.name }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4" method ="post" as="button" @click="addAssignedBook(book,current_team_value)" tabindex="-1">
                  {{ book.author }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4" method ="post" as="button" @click="addAssignedBook(book,current_team_value)" tabindex="-1">
                  {{ book.company }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4" method ="post" as="button" @click="addAssignedBook(book,current_team_value)" tabindex="-1">
                  {{ book.year_publication }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4" method ="post" as="button" @click="addAssignedBook(book,current_team_value)" tabindex="-1">
                  {{ book.isbn }}
                </Link>
              </td>
              <td class="w-px border-t">
                <Link class="flex items-center px-4" method ="post" as="button" @click="addAssignedBook(book,current_team_value)" tabindex="-1">
                  <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                </Link>
              </td>
            </tr>
           
          </tbody>
        </table>
    
    
  </div>
  </span>
</template>

