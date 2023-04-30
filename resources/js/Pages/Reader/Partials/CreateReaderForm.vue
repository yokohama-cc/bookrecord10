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
    school_number: '',
    admission_year: '',
    school_number: '',
});

const createReader = () => {
    form.post(route('readers.store'), {
        errorBag: 'createReader',
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="createReader">
        <template #title>
            読者
        </template>

        <template #description>
            読者の追加を行います。
        </template>

        <template #form>
            
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="ニックネーム" />
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
                    <InputLabel for="school_number" value="学生番号" />
                    <TextInput
                        id="school_numberr"
                        v-model="form.school_numberr"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
                    <InputError :message="form.errors.school_number" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="admission_year" value="入学年度" />
                    <YearInput
                        id="admission_year"
                        v-model="form.admission_year"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
                    <InputError :message="form.errors.admission_year" class="mt-2" />
            </div>
            
        </template>

        <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                登録
            </PrimaryButton>
        </template>
    </FormSection>
</template>
