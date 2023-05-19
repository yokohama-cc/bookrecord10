<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/vue3'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import BookListForReadingRecord from '@/Pages/AssignedBook/Partials/BookListForReadingRecord.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';

const props = defineProps({
    current_team_id: Number,
    assigned_books: Object,
    books: Object,
    teams:Object,
});

const form = useForm({
    team_id: props.current_team_id,
    param: '',
});

const search = () => {
    
    form.post(route('assigned_books.search'), {
        errorBag: 'search',
        preserveScroll: true,
    });
};

</script>

<template>
    <AppLayout title="">
        <template #header>
            <form @submit.prevent="search">
                <div class="flex justify-between h-16">
                    <div>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            読書記録を登録する
                        </h2>
                    </div>
                    <div class="space-x-8 ml-3 relative">
                                <InputLabel for="team_id" value="所属:" />                                                        
                                <select
                                    v-model = "form.team_id"
                                    value = "props.team_id"
                                    class="rounded border-gray-300  shadow-sm focus:ring-indigo-500">
                                    <option v-for="team in teams" :key="team.id" :value="team.id">{{team.name}}</option>
                                </select>   
                            </div>
                            <div>
                                <InputLabel for="param" value="タイトル、著者、出版社に含まれる文字を指定してください:" />
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
                    <BookListForReadingRecord :assigned_books="assigned_books" :books="books"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
