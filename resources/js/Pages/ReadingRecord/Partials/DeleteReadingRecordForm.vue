<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import DangerButton from '@/Components/DangerButton.vue';


const props = defineProps({
    reading_record: Object,
});

const confirmingReadingRecordDeletion = ref(false);
const form = useForm({});

const confirmReadingRecordDeletion = () => {
    confirmingReadingRecordDeletion.value = true;
};

const deleteReadingRecord = () => {
    form.delete(route('reading_records.destroy', props.reading_record), {
        errorBag: 'deleteReadingRecord',
    });
};
</script>

<template>
    <DangerButton @click="confirmReadingRecordDeletion">
        削除
    </DangerButton>
    <!-- Delete ReadingRecord Confirmation Modal -->
        <ConfirmationModal :show="confirmingReadingRecordDeletion" @close="confirmingReadingRecordDeletion = false">
            <template #title>
                図書削除
            </template>

            <template #content>
                本当に削除してよろしいですか。
            </template>

            <template #footer>
                <SecondaryButton @click="confirmingReadingRecordDeletion = false">
                    Cancel
                </SecondaryButton>

                <DangerButton
                    class="ml-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="deleteReadingRecord"
                >
                    削除
                </DangerButton>
            </template>
        </ConfirmationModal>
        
    
</template>
