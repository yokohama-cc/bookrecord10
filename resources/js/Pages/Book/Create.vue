<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateBookForm from '@/Pages/Book/Partials/CreateBookForm.vue';


</script>

<template>
    <AppLayout title="図書">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                図書
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <CreateBookForm />
                </div>
            </div>
        </div>
    </AppLayout>
</template>




