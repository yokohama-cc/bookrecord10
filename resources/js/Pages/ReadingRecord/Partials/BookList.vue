<script setup>
import { ref } from 'vue';
import { router, useForm, usePage } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    books: Object,
});

</script>

<template>
  <div>
    　 <Link class="btn-indigo" href="/books/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;book</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">タイトル</th>
            <th class="pb-4 pt-6 px-6">著者名</th>
            <th class="pb-4 pt-6 px-6" colspan="2">出版社名</th>            
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in books.data" :key="book.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('reading_records.add', book)">
                {{ book.name }}
                <icon v-if="book.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="route('reading_records.add', book)" tabindex="-1">
                {{ book.author }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="route('reading_records.add', book)" tabindex="-1">
                {{ book.company }}
              </Link>
            </td>
            <td class="w-px border-t">
              <Link class="flex items-center px-4" :href="route('reading_records.add', book)" tabindex="-1">
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              </Link>
            </td>
          </tr>
          <tr v-if="books.data.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No books found.</td>
          </tr>
        </tbody>
      </table>
    </div>
    <pagination class="mt-6" :links="books.links" />
  
</template>

