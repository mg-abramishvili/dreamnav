<template>
    <template v-if="config.theme == 'pesok'">
        <PesokVertical
            v-if="config.orientation == 'vertical'"
            ref="pesok"
            :page="page"
            :kiosk="$route.params.kiosk" />
    </template>
</template>

<script>
import PesokVertical from './pesok/pages/vertical.vue'

export default {
    data() {
        return {
            page: {},
        }
    },
    computed: {
        config() {
            return this.$root.config
        },
    },
    created() {
        this.loadPage()
    },
    methods: {
        loadPage() {
            axios.get(`/api/page/${this.$route.params.id}`)
            .then(response => {
                this.page = response.data
            })
        },
        goHome(page) {
            page.blocks.forEach(block => {
                if(block.type == 'video') {
                    let video = document.getElementById('video_' + block.id)

                    if(video) {
                        video.load()
                    }
                }

                if(block.type == 'routes') {
                    this.$refs.pesok.$refs.routes[0].resetRoutes()
                    this.$refs.pesok.$refs.routes[0].zoomReset()
                }
            })

            this.$router.push({ name: 'Home', params: { kiosk: this.$route.params.kiosk } })
        },
    },
    components: {
        PesokVertical
    }
}
</script>