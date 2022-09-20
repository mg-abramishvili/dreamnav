<template>
    <div>
        <div class="content-header px-4">
            <h1>{{ page.name }}</h1>

            <div>
                <router-link :to="{name: 'PageMaster', query: {type: 'page', from: page.id} }" class="btn btn-primary">Создать страницу</router-link>
                <router-link :to="{name: 'PageMaster', query: {type: 'folder', from: page.id} }" class="btn btn-outline-primary ms-2">Создать папку</router-link>
            </div>
        </div>

        <div v-if="views.loading" class="p-4">
            <Loader />
        </div>

        <div v-if="!views.loading" class="content p-4">
            <table v-if="page.children.length" class="table align-middle">
                <tbody>
                    <tr v-for="page in page.children">
                        <td @click="goToPage(page)" class="w-50">
                            {{ page.name }}
                        </td>
                        <td>
                            <template v-if="!page.is_folder">{{ $filters.datetime(page.updated_at) }}</template>
                        </td>
                        <td class="text-end">
                            <router-link v-if="!page.is_folder" :to="{ name: 'PageMaster', params: {id: page.id} }" class="btn btn-outline-primary">Правка</router-link>
                            <router-link v-if="page.is_folder" :to="{ name: 'PageMaster', params: {id: page.id} }" class="btn btn-outline-primary">Правка</router-link>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p v-else>Пусто.</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            page: {},

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
            axios.get(`/api/admin/page/${this.$route.params.id}`)
            .then(response => {
                this.page = response.data

                this.views.loading = false
            })
        },
        goToPage(page) {
            if(page.is_folder) {
                this.$router.push({name: 'Page', params: {id: page.id} })
            }
        },
    },
}
</script>
