<template>
    <div>
        <div class="content-header px-4">
            <h1>Страницы</h1>
            <router-link :to="{name: 'PageMaster'}" class="btn btn-primary">Добавить</router-link>
        </div>

        <div v-if="views.loading" class="p-4">
            <Loader />
        </div>

        <div v-if="!views.loading" class="content p-4">
            <table v-if="pages.length" class="table align-middle">
                <tbody>
                    <tr v-for="page in pages">
                        <td class="w-50">{{ page.name }}</td>
                        <td>{{ $filters.datetime(page.updated_at) }}</td>
                        <td class="text-end">
                            <router-link :to="{ name: 'PageMaster', params: {id: page.id} }" class="btn btn-outline-primary">Правка</router-link>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p v-else>Страниц нет.</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pages: [],

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadPages()
    },
    methods: {
        loadPages() {
            axios.get('/api/admin/pages')
            .then(response => {
                this.pages = response.data

                this.views.loading = false
            })
        },
    },
}
</script>
