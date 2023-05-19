<script setup>
import { useForm } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import MonthInput from '@/Components/MonthInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';

const props = defineProps({
    book_id: Number,
    book_name: String,
});

const form = useForm({
    book_id: props.book_id,
    yearmonth_read: '',
    report: '',
});

const createReadingRecord = () => {
        form.post(route('reading_records.store'), {
        errorBag: 'createReadingRecord',
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="createReadingRecord">
        <template #title>
            登録
        </template>

        <template #description>
            読書記録を登録を行います。
        </template>

        <template #form>
            
            <div class="col-span-6">
                <InputLabel value="図書" />
                <div class="ml-4 leading-tight">
                    <div class="text-gray-900">{{ book_name }}</div>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="yearmonth_read" value="読書年月" />
                    <MonthInput
                        id="yearmonth_read"
                        v-model="form.yearmonth_read"
                        required
                        autofocus
                    />
                    
            </div>
            
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="report" value="感想" />
                <TextareaInput
                    row = "10"
                    id = "report"
                    v-model="form.report"                    
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required
                ></TextareaInput>
                <InputError :message="form.errors.report" class="mt-2" />
            </div>
            
        </template>

        <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                登録
            </PrimaryButton>
        </template>
    </FormSection>
</template>
