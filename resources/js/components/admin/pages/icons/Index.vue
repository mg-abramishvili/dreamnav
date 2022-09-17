<template>
    <div class="modal fade show" tabindex="-1" style="display:block">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Иконки</h5>
                    <button @click="$parent.views.icons = false" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <div v-if="views.loading">
                        <Loader />
                    </div>

                    <div v-if="!views.loading">
                        <div v-if="icons.length">
                            <div v-for="icon in icons">
                                {{ icon.image }}
                            </div>
                        </div>

                        <p v-else class="m-0">Иконок нет.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            icons: [],

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadIcons()
    },
    methods: {
        loadIcons() {
            axios.get('/api/admin/icons')
            .then(response => {
                this.icons = response.data

                this.views.loading = false
            })
        },
    },
}
</script>