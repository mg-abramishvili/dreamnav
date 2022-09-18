<template>
    <div>
        <div id="map" class="map" :class="[`${views.windowWidth > 1920 ? 'map4K':'map1080'}`]">
            <img v-for="scheme in schemes" v-show="scheme.id == selected.floor" :src="scheme.image">

            <svg v-if="selected.slide === 1" class="map-path svg1">
                <template v-for="(point, index) in selected.route.route_code_floor1">
                    <template v-if="selected.route.route_code_floor1[index - 1]">
                        <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', ' + selected.route.route_code_floor1[index - 1].x + ' ' + selected.route.route_code_floor1[index - 1].y"></path>
                    </template>
                    <template v-else>
                        <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', '"></path>
                    </template>
                    <circle v-if="point.x" id="02" :cx="point.x" :cy="point.y" r="0" fill="#f33"></circle>
                </template>
            </svg>

            <svg v-if="selected.slide === 2" class="map-path svg2">
                <template v-for="(point, index) in selected.route.route_code_floor2">
                    <template v-if="selected.route.route_code_floor2[index - 1]">
                        <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', ' + selected.route.route_code_floor2[index - 1].x + ' ' + selected.route.route_code_floor2[index - 1].y"></path>
                    </template>
                    <template v-else>
                        <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', '"></path>
                    </template>
                    <circle v-if="point.x" id="02" :cx="point.x" :cy="point.y" r="0" fill="#f33"></circle>
                </template>
            </svg>
        </div>







        <!-- <button @click="searchPanel_button()" class="route-open-search-panel-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button> -->

        <div class="routes-list">
            <ul>
                <li v-for="route in routes" :key="route.id" @click="SelectRoute(route)">
                    <a>{{ route.point.name }}</a>
                </li>
            </ul>
        </div>

        <div v-if="selected.route.schemes1" class="route-about">
            <template v-if="selected.route.schemes1 && selected.route.schemes1.id.toString() == selected.floor">
                {{selected.route.schemes1.name }}
            </template>

            <template v-if="selected.route.schemes2 && selected.route.schemes2.id.toString() === selected.floor">
                {{selected.route.schemes2.name }}
            </template>

            <br>
            {{selected.route.name}}
        </div>

        

        <button v-show="views.searchPanel == false && selected.slide === 2" @click="PrevScheme(selected.route)" class="prevnextbutton prev_button">
            Начало маршрута
        </button>
        <button v-show="views.searchPanel == false && selected.route.schemes2 && selected.route.schemes2 && selected.slide === 1" @click="NextScheme(selected.route)" class="prevnextbutton next_button">
            Продолжить маршрут
        </button>

        <div v-show="views.searchPanel == true" class="search-panel">
            <button @click="searchPanel_button_close()" class="search-panel-close-button">&times;</button>
            <ul>
                <li v-for="route in filtered_routes" :key="route.id" @click="SelectRoute(route)">
                    <a>{{ route.name }}</a>
                </li>
            </ul>

            <div class="search-panel-input">
                <input
                :value="searchInput"
                @input="onInputChange"
                placeholder="Поиск..."
                >

                <div class="kb">
                    <!-- <SimpleKeyboard @onChange="onChange" @onKeyPress="onKeyPress" :input="searchInput"/> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import SimpleKeyboard from "./routes_keyboard.vue"
    export default {
        data() {
            return {
                schemes: [],
                routes: {},

                selected: {
                    slide: 1,
                    floor: 1,
                    route: ''
                },

                views: {
                    searchPanel: false,
                    windowWidth: '',
                },

                searchInput: '',
            }
        },
        created() {
            this.views.windowWidth = window.screen.availWidth

            this.loadSchemes()
            this.loadRoutes()
        },
        computed: {
            filtered_routes: function () {
                if (this.searchInput.trim() === '') {
                    return this.routes
                } else {
                    return this.routes.filter(item => {
                    return item.name.toLowerCase().indexOf(this.searchInput.toLowerCase()) >= 0
                    })
                }
            },
        },
        methods: {
            loadSchemes() {
                axios.get('/api/schemes')
                .then(response => {
                    this.schemes = response.data
                })
            },
            loadRoutes() {
                axios.get(`/api/routes/1`)
                .then(response => {
                    this.routes = response.data
                })
            },
            SelectRoute(route) {
                this.views.searchPanel = false
                this.searchInput = ''
                this.selected.floor = route.scheme1_id

                axios.get(`/api/route/${route.id}`)
                .then(response => {
                    this.selected.route = response.data
                    this.selected.slide = 1
                })
            },
            PrevScheme(selectedRoute) {
                this.selected.floor = selected.route.scheme1_id
                this.selected.slide = 1
            },
            NextScheme(selectedRoute) {
                this.selected.floor = selected.route.scheme2_id
                this.selected.slide = 2
            },
            onChange(input) {
                this.searchInput = input
            },
            onKeyPress(button) {
                //console.log("button", button)
            },
            onInputChange(input) {
                this.searchInput = input.target.value
            },
            searchPanel_button() {
                this.views.searchPanel = true
                this.selected.route = {}
            },
            searchPanel_button_close() {
                this.views.searchPanel = false
                this.resetRoutes()
            },
            resetRoutes() {
                this.selected.slide = 1
                this.selected.floor = 1
                this.selected.route = ''
                this.searchInput = ''
            }
        },
        components: {
            // SimpleKeyboard,
        }
    }
</script>