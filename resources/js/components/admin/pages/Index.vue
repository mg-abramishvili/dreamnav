<template>
    <div>
        <div class="content-header px-4">
            <h1>Страницы</h1>
            <router-link :to="{name: 'PageMaster'}" class="btn btn-primary">Добавить</router-link>
        </div>

        <div class="content p-4">
            <Loader v-if="views.loading" />
            
            <table v-if="!views.loading && pages.length" class="table">
                <tbody>
                    <tr v-for="page in pages">
                        <td>{{ page.name }}</td>
                        <td>{{ page.created_at }}</td>
                        <td><button class="btn btn-outline-primary">Правка</button></td>
                    </tr>
                </tbody>
            </table>

            <p v-if="!views.loading && !pages.length">Страниц нет.</p>
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
