<script setup>
import { Link ,router } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';
import DeleteReadingRrecordForm from '@/Pages/ReadingRecord/Partials/DeleteReadingRecordForm.vue';


const props = defineProps({
    current_team: Object,
    teams: Object,
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
  <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">本</th>
            <th class="pb-4 pt-6 px-6">読者</th>
            <th class="pb-4 pt-6 px-6">読書年月</th>
            <th class="pb-4 pt-6 px-6" colspan="3">感想</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="reading_record in reading_records" :key="reading_record.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="edit(reading_record)">
                    {{ reading_record.book.name }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="edit(reading_record)">
                    {{ reading_record.reader.name }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="edit(reading_record)" tabindex="-1">
                    {{ reading_record.year_read }}/{{ reading_record.month_read }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="edit(reading_record)" tabindex="-1">
                    {{ reading_record.report }}
                </Link>
              </td>
              <td class="w-px border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" as="button" @click="edit(reading_record)" tabindex="-1">
                    <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                </Link>
              </td>
              <td class="border-t">
                <DeleteReadingRecordForm :reading_record="reading_record" />
              </td>
            </tr>
            
           
          </tbody>
        </table>
    
    
  </div>
  
</template>
