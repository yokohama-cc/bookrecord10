<script setup>
import { useForm } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import MonthInput from '@/Components/MonthInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';
import Datepicker from '@vuepic/vue-datepicker'
import { ref,computed } from 'vue'

const props = defineProps({
    reading_record: Object,
    book_name: String,
    canUpdate:Boolean,
});

const com_month = computed(() => {
    let date = new Date(props.reading_record.year_read + '/' + props.reading_record.month_read + '/' +1);    
    let month = date.getMonth(); 
    return month;
});

const ref_yearmonth_read = ref({
                                year: props.reading_record.year_read,
                                month: com_month,
                                });

const form = useForm({
    yearmonth_read: ref_yearmonth_read,
    report: props.reading_record.report,
});

const updateReadingRecord = () => {
        form.put(route('reading_records.update',props.reading_record), {
        errorBag: 'updateReadingRecord',
        preserveScroll: true,
    });
};




</script>

<template>
    <FormSection @submitted="updateReadingRecord">
        <template #title>
          変更  
        </template>

        <template #description>
            読書記録を変更します。
        </template>

        <template #form>
            <div class="col-span-6">
                <InputLabel value="図書" />
                <div class="ml-4 leading-tight">
                    <div class="text-gray-900">{{ reading_record.book.name }}</div>
                </div>
            </div>
            <div class="col-span-6">
                <InputLabel value="読者" />
                <div class="ml-4 leading-tight">
                    <div class="text-gray-900">{{ reading_record.reader.name }}</div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="yearmonth_read" value="読書年月" />
                    <MonthInput
                    id="yearmonth_read"
                    v-model="form.yearmonth_read"
                    :disabled="! canUpdate"
                    />
                    
            </div>
            
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="report" value="感想" />
                <TextareaInput
                    row = "10"
                    id = "report"
                    v-model="form.report"                    
                    class="mt-1 block w-full h-40 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required
                    :disabled="! canUpdate"
                ></TextareaInput>
                <InputError :message="form.errors.report" class="mt-2" />
            </div>
        </template>

        <template v-if="canUpdate" #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                更新
            </PrimaryButton>
        </template>
        
    </FormSection>
</template>
