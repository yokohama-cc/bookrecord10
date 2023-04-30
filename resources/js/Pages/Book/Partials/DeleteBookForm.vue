<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import DangerButton from '@/Components/DangerButton.vue';


const props = defineProps({
    book: Object,
});

const confirmingBookDeletion = ref(false);
const form = useForm({});

const confirmBookDeletion = () => {
    confirmingBookDeletion.value = true;
};

const deleteBook = () => {
    form.delete(route('books.destroy', props.book), {
        errorBag: 'deleteBook',
    });
};
</script>

<template>
    <DangerButton @click="confirmBookDeletion">
        削除
    </DangerButton>
    <!-- Delete Book Confirmation Modal -->
        <ConfirmationModal :show="confirmingBookDeletion" @close="confirmingBookDeletion = false">
            <template #title>
                図書削除
            </template>

            <template #content>
                本当に削除してよろしいですか。
            </template>

            <template #footer>
                <SecondaryButton @click="confirmingBookDeletion = false">
                    Cancel
                </SecondaryButton>

                <DangerButton
                    class="ml-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="deleteBook"
                >
                    削除
                </DangerButton>
            </template>
        </ConfirmationModal>
        
    
</template>
