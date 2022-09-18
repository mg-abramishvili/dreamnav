<template>
    <div>
        <div class="content-header px-4">
            <h1>Маршруты</h1>
            <router-link :to="{name: 'RouteMaster'}" class="btn btn-primary">Добавить</router-link>
        </div>

        <div v-if="views.loading" class="p-4">
            <Loader />
        </div>

        <div v-if="!views.loading" class="content p-4">
            <table v-if="routes.length" class="table align-middle">
                <tbody>
                    <tr v-for="route in routes">
                        <td>{{ route.kiosk.name }} &rarr; {{ route.point.name }}</td>
                        <td class="text-end">
                            <router-link :to="{ name: 'RouteMaster', params: {id: route.id} }" class="btn btn-sm btn-outline-primary">Правка</router-link>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p v-else>Маршуртов нет.</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            routes: [],

            kiosks: [],

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadRoutes()
    },
    methods: {
        loadRoutes() {
            axios.get(`/api/admin/routes/${this.$route.params.kiosk}`)
            .then(response => {
                this.routes = response.data

                this.views.loading = false
            })
        },
    },
}
</script>