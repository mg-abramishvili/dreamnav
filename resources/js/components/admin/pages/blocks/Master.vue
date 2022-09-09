<template>
    <div class="modal fade show" tabindex="-1" style="display:block">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование блока</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <TextMaster v-if="block.type == 'text'" :block="block" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Сохранить</button>
                    <button @click="cancel()" type="button" class="btn btn-outline-secondary">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TextMaster from './types/TextMaster.vue'

export default {
    props: ['block'],
    data() {
        return {
            //
        }
    },
    created() {
        //
    },
    methods: {
        cancel() {
            this.$parent.selected.block = ''
        },
    },
    components: {
        TextMaster
    }
}
</script>