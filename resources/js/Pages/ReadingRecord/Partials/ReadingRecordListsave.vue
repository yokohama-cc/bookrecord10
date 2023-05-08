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

const props = defineProps({
    reading_records: Object,
 });

</script>

<template>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <table class="my-5 mx-5 table-fixed border-collapse border border-slate-400 font-ja text-sm">
                        <thead>
                            <tr class="bg-sky-200">
                                <th class="border border-slate-300">タイトル</th>
                                <th class="border border-slate-300">読者</th>
                                <th class="border border-slate-300">読書年月</th>
                                <th class="border border-slate-300">感想</th>
                                <th colspan="2" class="border border-slate-300"></th>
                            </tr>
                        </thead>
                        <tbody v-for="reading_record in reading_records" :key="reading_record.id" class="bg-state-100">
                            <tr>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">{{ reading_record.book.name }}</td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">{{ reading_record.reader.name}}</td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">{{ reading_record.year_read}} / {{ reading_record.month_read }}</td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">{{ reading_record.report }}</td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm">
                                    <Link :href="route('reading_records.edit', reading_record)">
                                        <PrimaryButton>
                                            更新    
                                        </PrimaryButton>
                                    </link>
                                </td>
                                <td class="px-4 py-2 border border-slate-300 font-ja text-sm"><DeleteReadingRecordForm :reading_record="reading_record" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</template>
