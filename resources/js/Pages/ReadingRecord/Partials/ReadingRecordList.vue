<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';
import SelectInput from '@/Components/SelectInput.vue';
import DeleteReadingRrecordForm from '@/Pages/ReadingRecord/Partials/DeleteReadingRecordForm.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    reading_records: Object,
    current_team: Object,
    teams: Object,    
});

const searchForm = useForm({
    team_id: props.current_team.id,
    param: '',
});

const search = () => {
    searchForm.post(route('reading_records.search'), {
        errorBag: 'search',
    });
};


</script>

<template>

  <span v-for="current_team_value in current_team">
   <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="search">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <SelectInput v-model="searchForm.team_id" :error="searchForm.errors.team_id" class="pb-8 pr-6 w-full lg:w-1/2" label="所属">
            <option v-for="team in teams :key=team.id" :value="team.id">
              {{ team.name }}
            </option>
          </SelectInput>
        </div>
        <div class="col-span-6 sm:col-span-4">
                <InputLabel for="param" value="本のタイトルに含まれる文字を指定してください:" />
                <TextInput
                    id="param"
                    v-model="searchForm.param"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                検索
            </PrimaryButton>  
      </form>
    </div>
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
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('reading_records.edit', reading_record)">">
                    {{ reading_record.book.name }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('reading_records.edit', reading_record)">" tabindex="-1">
                    {{ reading_record.year_read }}/{{ reading_record.month_read }}
                </Link>
              </td>
              <td class="border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('reading_records.edit', reading_record)">" tabindex="-1">
                    {{ reading_record.report }}
                </Link>
              </td>
              <td class="w-px border-t">
                <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('reading_records.edit', reading_record)">" tabindex="-1">
                    <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                </Link>
              </td>
              <td class="border-t">
                <DeleteReadingRecordForm :book="reading_record" />
              </td>
            </tr>
            
           
          </tbody>
        </table>
    
    
  </div>
  </span>
</template>

