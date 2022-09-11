<template>
    <div class="wrapper">
        <PesokTheme
            v-if="theme == 'pesok'"
            ref="pesok" />
    </div>
</template>

<script>
    import PesokTheme from './pesok/layout.vue'

    export default {
        data() {
            return {
                settings: {},

                theme: 'pesok'
            }
        },
        created() {
            // this.loadSettings()
        },
        methods: {
            loadSettings() {
                axios.get(`/api/settings`)
                .then(response => {
                    this.settings = response.data
                    
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