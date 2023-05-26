<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SelectInput from '@/Components/SelectInput.vue';
import DeleteReadingRrecordForm from '@/Pages/ReadingRecord/Partials/DeleteReadingRecordForm.vue';
import ReadingRecordList from '@/Pages/ReadingRecord/Partials/ReadingRecordList.vue';
import { computed } from 'vue';

const props = defineProps({
    reading_records: Object,
    current_team_id: Number,
    teams:Object,
});

const form = useForm({
    team_id: props.current_team_id,
    param: '',
});



const search = () => {
    
    form.post(route('reading_records.search'), {
        errorBag: 'search',
        preserveScroll: true,
    });
};




</script>

<template>
    <AppLayout title="読書記録を登録する">
        <template #header>
            <form @submit.prevent="search">
                    <div class="flex justify-between h-16">
                        <div>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                読書記録を見る
                            </h2>
                        </div>
                        
                        
                        <div>
                            <InputLabel for="team_id" value="所属:" />                            
                            <select
                                v-model = "form.team_id"
                                value = "props.team_id"
                                class="rounded border-gray-300  shadow-sm focus:ring-indigo-500">
                                <option />
                                <option v-for="team in teams" :key="team.id" :value="team.id">{{team.name}}</option>
                            </select>   
                        </div>
                        <div>
                            <InputLabel for="param" value="本のタイトルに含まれる文字を指定してください:" />
                            <TextInput
                                id="param"
                                v-model="form.param"
                                type="text"
                                class="mt-1 block w-full"
                            />
                            <InputError :message="form.errors.param" class="mt-2" />
                        </div>
                        <div>
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                検索
                            </PrimaryButton>
                        </div>
                            
                        
                    </div>
                </form>
                          
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <ReadingRecordList :reading_records="reading_records" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
