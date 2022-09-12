<template>
    <div class="wrapper">
        <PesokTheme
            v-if="config.theme == 'pesok'"
            ref="pesok" />
    </div>
</template>

<script>
    import PesokTheme from './pesok/layout.vue'

    export default {
        data() {
            return {
                config: {
                    theme: 'pesok',
                    orientation: 'vertical',
                },
            }
        },
        created() {
            this.loadConfig()
        },
        methods: {
            loadConfig() {
                axios.get(`/api/config`)
                .then(response => {
                    this.config = response.data
                    
                })
            },
        },
        mounted() {
            this._keyListener = function(e) {
                if(e.key === 'q' && (e.ctrlKey || e.metaKey) || e.key === 'й' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault()
                    window.location.href = '/admin'
                }
            }
            document.addEventListener('keydown', this._keyListener.bind(this))
        },
        beforeMount() {
            // document.oncontextmenu = new Function("return false")
        },
        components: {
            PesokTheme,
        }
    }
</script>