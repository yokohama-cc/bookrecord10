<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import BookList from '@/Pages/AssignedBook/Partials/BookList.vue';
import InputLabel from '@/Components/InputLabel.vue';

const props = defineProps({
    current_team_id: Number,
    assigned_books: Object,
    books: Object,
    teams:Object,
});

const form = useForm({
    team_id: props.current_team_id,
});



const select = () => {
    
    form.post(route('assigned_books.select'), {
        errorBag: 'select',
        preserveScroll: true,
    });
};

</script>

<template>
    <AppLayout title="">
        <template #header>
            <form @submit.prevent="select">
                <div class="flex justify-between h-16">
                    <div>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            指定図書を登録する
                        </h2>
                    </div>
                    <div>
                        <InputLabel for="team_id" value="所属:" />
                        <select
                            v-model = "form.team_id"
                            value = "props.team_id"
                            class="rounded border-gray-300  shadow-sm focus:ring-indigo-500">
                            <option v-for="team in teams" :key="team.id" :value="team.id" :disabled="! team.canUpdateTeam">{{team.name}}</option>
                        </select>
                    </div>
                    <div>
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            選択
                        </PrimaryButton>
                    </div>
                </div>
            </form>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <BookList :current_team_id="current_team_id" :assigned_books="assigned_books" :books="books"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
