<template>
    <div>
        <div class="panzoom-wrapper" :class="[`${views.windowWidth > 1920 ? 'map4K':'map1080'}`]">
            <div class="panzoom-controls">
                <button @click="zoomIn()">+</button>
                <br>
                <button @click="zoomOut()">-</button>
            </div>

            <div id="panzoom">
                <div id="map" class="map">
                    <template v-for="scheme in schemes">
                        <img v-show="scheme.id == selected.scheme.id" :src="scheme.image">

                        <svg v-if="scheme.id == selected.scheme.id" class="map-path svg1">
                            <template v-for="(point, index) in selected.route.route_code_floor1">
                                <template v-if="selected.route.route_code_floor1[index - 1]">
                                    <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', ' + selected.route.route_code_floor1[index - 1].x + ' ' + selected.route.route_code_floor1[index - 1].y"></path>
                                </template>
                                <template v-else>
                                    <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', '"></path>
                                </template>
                                <circle v-if="point.x" :cx="point.x" :cy="point.y" r="0" fill="#f33"></circle>
                            </template>

                            <template v-for="(point, index) in selected.route.route_code_floor2">
                                <template v-if="selected.route.route_code_floor2[index - 1]">
                                    <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', ' + selected.route.route_code_floor2[index - 1].x + ' ' + selected.route.route_code_floor2[index - 1].y"></path>
                                </template>
                                <template v-else>
                                    <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', '"></path>
                                </template>
                                <circle v-if="point.x" :cx="point.x" :cy="point.y" r="0" fill="#f33"></circle>
                            </template>

                            <polygon v-for="point in points.filter(p => p.scheme_id == selected.scheme.id)" @click="selectPoint(point)" :points="point.object.join()" style="fill:transparent;stroke:transparent;stroke-width:1"></polygon>
                        </svg>
                    </template>
                    

                    <!-- <svg v-if="selected.slide === 2" class="map-path svg2">
                        <template v-for="(point, index) in selected.route.route_code_floor2">
                            <template v-if="selected.route.route_code_floor2[index - 1]">
                                <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', ' + selected.route.route_code_floor2[index - 1].x + ' ' + selected.route.route_code_floor2[index - 1].y"></path>
                            </template>
                            <template v-else>
                                <path v-if="point.x" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + point.x + ' ' + point.y + ', '"></path>
                            </template>
                            <circle v-if="point.x" id="02" :cx="point.x" :cy="point.y" r="0" fill="#f33"></circle>
                        </template>
                    </svg> -->
                </div>
            </div>
        </div>

        <div class="routes-list">
            <ul>
                <li v-for="route in routes" :key="route.id" @click="SelectRoute(route)">
                    <a>{{ route.point.name }}</a>
                </li>
            </ul>
        </div>

        <!-- <button @click="searchPanel_button()" class="route-open-search-panel-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button> -->

        <!-- <div v-if="selected.route.schemes1" class="route-about">
            <template v-if="selected.route.schemes1 && selected.route.schemes1.id.toString() == selected.floor">
                {{selected.route.schemes1.name }}
            </template>

            <template v-if="selected.route.schemes2 && selected.route.schemes2.id.toString() === selected.floor">
                {{selected.route.schemes2.name }}
            </template>

            <br>
            {{selected.route.name}}
        </div> -->

        

        <!-- <button v-show="views.searchPanel == false && selected.slide === 2" @click="PrevScheme(selected.route)" class="prevnextbutton prev_button">
            Начало маршрута
        </button>
        <button v-show="views.searchPanel == false && selected.route.schemes2 && selected.route.schemes2 && selected.slide === 1" @click="NextScheme(selected.route)" class="prevnextbutton next_button">
            Продолжить маршрут
        </button> -->

        <!-- <div v-show="views.searchPanel == true" class="search-panel">
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
                    <SimpleKeyboard @onChange="onChange" @onKeyPress="onKeyPress" :input="searchInput"/>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
import Panzoom from '@panzoom/panzoom'
// import SimpleKeyboard from "./routes_keyboard.vue"

export default {
    data() {
        return {
            schemes: [],
            routes: [],
            points: [],

            selected: {
                scheme: '',
                route: ''
            },

            views: {
                searchPanel: false,
                windowWidth: '',
            },

            searchInput: '',

            panzoom: ''
        }
    },
    mounted() {
        this.panzoom = Panzoom(document.getElementById('panzoom'), {
            minScale: 1,
            maxScale: 3,
            contain: 'outside',
        })
    },
    created() {
        this.views.windowWidth = window.screen.availWidth

        this.loadSchemes()
        this.loadRoutes()
        this.loadPoints()
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

                this.selected.scheme = response.data[0]
            })
        },
        loadRoutes() {
            axios.get(`/api/routes/1`)
            .then(response => {
                this.routes = response.data
            })
        },
        loadPoints() {
            axios.get(`/api/points`)
            .then(response => {
                this.points = response.data
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
        selectPoint(point) {
            this.selected.scheme = this.schemes.find(s => s.id == point.scheme_id)
            this.selected.route = point.routes.filter(r => r.scheme1_id == this.selected.scheme.id)[0]
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
        },
        zoomIn() {
            this.panzoom.zoomIn()
        },
        zoomOut() {
            this.panzoom.zoomOut()
        },
        zoomReset() {
            this.panzoom.reset()
        },
    },
    components: {
        Panzoom,
        // SimpleKeyboard,
    }
}
</script>