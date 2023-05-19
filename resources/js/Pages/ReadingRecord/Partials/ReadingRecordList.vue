<script setup>
import { Link ,router } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';
import DeleteReadingRecordForm from '@/Pages/ReadingRecord/Partials/DeleteReadingRecordForm.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Pagination from '@/Components/Pagination.vue';

const props = defineProps({
    reading_records: Object,
});



const edit = (reading_record) => {
    router.get(route('reading_records.edit',reading_record), {
        errorBag: 'edit',
        preserveScroll: true,
    });
};


</script>

<template>
  
  <div class="bg-white rounded-md shadow">
      <table class="w-full">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6 whitespace-nowrap">本</th>
            <th class="pb-4 pt-6 px-6 whitespace-nowrap">読者</th>
            <th class="pb-4 pt-6 px-6 whitespace-nowrap">読書年月</th>
            <th class="pb-4 pt-6 px-6" colspan="3">感想</th>
          </tr>
        </thead>
        <tbody>
          
          <tr v-for="reading_record in reading_records.data" :key="reading_record.id" class="hover:bg-gray-100 focus-within:bg-gray-100 h-6">
              <td class="pb-4 pt-6 px-6 border-t whitespace-nowrap">{{ reading_record.book.name }}</td>
              <td class="pb-4 pt-6 px-6 border-t whitespace-nowrap">{{ reading_record.reader.name }}</td>
              <td class="pb-4 pt-6 px-6 border-t whitespace-nowrap">{{ reading_record.year_read }}/{{ reading_record.month_read }}</td>
              <td class="pb-4 pt-6 px-6 border-t overflow-hidden">{{ reading_record.report }}</td>
              <td class="pb-4 pt-6 px-6 w-px border-t whitespace-nowrap">
                <Link :href="route('reading_records.edit', reading_record)">
                  <PrimaryButton>
                    詳細    
                  </PrimaryButton>
                </link>
              </td>
              <td class="pb-4 pt-6 px-6 border-t whitespace-nowrap">
                <DeleteReadingRecordForm :reading_record="reading_record" />
              </td>
            </tr>
            
           
          </tbody>
        </table>
        <Pagination class="mt-6" :links="reading_records.links" />
    
  </div>
  
</template>
