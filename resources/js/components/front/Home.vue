<template>
    <template v-if="config.theme == 'pesok'">
        <PesokVertical
            v-if="config.orientation == 'vertical'"
            ref="pesok"
            :pages="pages"
            :banners="banners" />
    </template>
</template>

<script>
    import PesokVertical from './pesok/home/vertical.vue'

    export default {
        data() {
            return {
                pages: [],
                banners: [],
            }
        },
        computed: {
            config() {
                return this.$root.config
            },
        },
        created() {
            this.loadPages()
            this.loadBanners()
        },
        methods: {
            loadPages() {
                axios.get('/api/pages')
                .then(response => {
                    this.pages = response.data
                })
            },
            loadBanners() {
                axios.get('/api/banners')
                .then(response => {
                    this.banners = response.data
                })
            },
            goToPage(id, type_id) {
                this.$router.push({name: 'Page', params: {id: id}})
            },
        },
        components: {
            PesokVertical
        }
    }
</script>