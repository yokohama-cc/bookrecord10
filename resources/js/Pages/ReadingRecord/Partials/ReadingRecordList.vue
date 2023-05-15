<script setup>
import { Link ,router } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';
import DeleteReadingRrecordForm from '@/Pages/ReadingRecord/Partials/DeleteReadingRecordForm.vue';


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
      <table class="w-full whitespace-nowrap ">
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
              <td class="pb-4 pt-6 px-6 border-t">{{ reading_record.book.name }}</td>
              <td class="pb-4 pt-6 px-6 border-t">{{ reading_record.reader.name }}</td>
              <td class="pb-4 pt-6 px-6 border-t">{{ reading_record.year_read }}/{{ reading_record.month_read }}</td>
              <td class="pb-4 pt-6 px-6 border-t truncate ...">{{ reading_record.report }}</td>
              <td class="pb-4 pt-6 px-6 w-px border-t">
                <Link v-if="reading_record.canUpdateTeam" :href="route('reading_records.edit', reading_record)">
                  <PrimaryButton v-if="reading_record.canUpdateTeam" >
                    更新    
                  </PrimaryButton>
                </link>
              </td>
              <td class="pb-4 pt-6 px-6 border-t">
                <DeleteReadingRecordForm :reading_record="reading_record" />
              </td>
            </tr>
            
           
          </tbody>
        </table>
    
    
  </div>
  
</template>
