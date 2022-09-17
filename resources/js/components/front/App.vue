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

                screensaver: {
                    timeoutID: '',
                    timer: 3000,
                    slides: [],
                },
            }
        },
        created() {
            this.loadConfig()
        },
        mounted() {
            
        },
        methods: {
            loadConfig() {
                axios.get(`/api/config`)
                .then(response => {
                    this.config = response.data
                    
                })
            },
            initScreensaver() {
                window.addEventListener("click", this.ScreensaverResetTimer)
                window.addEventListener("mousemove", this.ScreensaverResetTimer)
                window.addEventListener("mousedown", this.ScreensaverResetTimer)
                window.addEventListener("keypress", this.ScreensaverResetTimer)
                window.addEventListener("touchstart", this.ScreensaverResetTimer)
                window.addEventListener("touchmove", this.ScreensaverResetTimer)
                window.addEventListener("scroll", this.ScreensaverResetTimer)
            },
            ScreensaverStartTimer() {
                this.screensaver.timeoutID = window.setTimeout(this.ScreensaverGoInactive, this.screensaver.timer)
            },
            ScreensaverResetTimer() {
                window.clearTimeout(this.screensaver.timeoutID)

                this.ScreensaverStartTimer()
            },
            ScreensaverGoInactive() {
                alert('Wake up Neo')

                this.ScreensaverResetTimer()
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

            this.initScreensaver()

            this.ScreensaverStartTimer()
        },
        beforeMount() {
            // document.oncontextmenu = new Function("return false")
        },
        components: {
            PesokTheme,
        }
    }
</script>