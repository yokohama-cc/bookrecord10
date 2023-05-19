<script setup>
import { useForm } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import YearInput from '@/Components/YearInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    author: '',
    company: '',
    year_publication: '',
    isbn: '',
});

const createBook = () => {
        form.post(route('books.store'), {
        errorBag: 'createBook',
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="createBook">
        <template #title>
            登録
        </template>

        <template #description>
            図書の登録を行います。
        </template>

        <template #form>
            
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="名前" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="author" value="著者名" />
                    <TextInput
                        id="author"
                        v-model="form.author"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
                    <InputError :message="form.errors.author" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="company" value="出版社名" />
                <TextInput
                    id="company"
                    v-model="form.company"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
                <InputError :message="form.errors.company" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="year_publication" value="出版年" />
                    <YearInput
                        id="year_publication"
                        v-model="form.year_publication"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
                    <InputError :message="form.errors.year_publication" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="isbn" value="ISBN" />
                <TextInput
                    id="company"
                    v-model="form.isbn"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
                <InputError :message="form.errors.isbn" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                登録
            </PrimaryButton>
        </template>
    </FormSection>
</template>
