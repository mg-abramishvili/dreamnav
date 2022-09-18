<template>
    <div>
        <div class="content-header px-4">
            <h1>
                <router-link :to="{name: 'Routes', params: {kiosk: 1} }" class="btn btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </router-link>

                <template v-if="$route.params.id">
                    {{ route.kiosk.name }} &rarr; {{ route.point.name }}
                </template>
                <template v-else>
                    Новый маршрут
                </template>
            </h1>
        </div>
{{route_code_floor1}}
        <div v-if="views.loading" class="p-4">
            <Loader />
        </div>

        <div v-if="!views.loading" class="content p-4">
            <div class="row">
                <div class="col-12 col-lg">
                    <div class="mb-4">
                        <label for="form-label">Киоск</label>
                        <select v-model="selected.kiosk" class="form-select">
                            <option v-for="kiosk in kiosks" :value="kiosk">{{ kiosk.name }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="mb-4">
                        <label for="form-label">Точка</label>
                        <select v-model="selected.point" class="form-select">
                            <option v-for="point in points" :value="point">{{ point.name }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="form-label">Схема 1</label>
                <select v-model="selected.scheme1" class="form-control mb-2">
                    <option v-for="scheme in schemes" :key="'key_' + scheme.id" :value="scheme">{{ scheme.name }}</option>
                </select>
                
                <div class="text-center mb-2">
                    <button @click="undoDotFloor1" class="btn btn-sm btn-outline-danger">&larr;</button>
                </div>

                <div id="wrapper-map" class="wrapper-map mb-4" @click="clickOnMapScheme1">
                    <img :src="selected.scheme1.image" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" id="map-path" class="map-path"></svg>
                </div>

                <!-- <div class="row">
                    <div class="col-6">
                        <label for="form-label">Текст к первой точке</label>
                        <input v-model="floor1_text_begin" type="text" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="form-label">Текст к последней точке</label>
                        <input v-model="floor1_text_end" type="text" class="form-control">
                    </div>
                </div> -->
            </div>

            <div class="mb-4">
                <label for="form-label">Схема 2</label>
                <select v-model="selected.scheme2" class="form-control mb-2">
                    <option v-for="scheme in schemes" :key="'key_' + scheme.id" :value="scheme">{{ scheme.name }}</option>
                </select>
                
                <div class="text-center mb-2">
                    <button @click="undoDotFloor2" class="btn btn-sm btn-outline-danger">&larr;</button>
                </div>

                <div id="wrapper-map2" class="wrapper-map mb-4" @click="clickOnMapScheme2">
                    <img :src="selected.scheme2.image" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" id="map-path2" class="map-path"></svg>
                </div>

                <!-- <div class="row">
                    <div class="col-6">
                        <label for="form-label">Текст к первой точке</label>
                        <input v-model="floor2_text_begin" type="text" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="form-label">Текст к последней точке</label>
                        <input v-model="floor2_text_end" type="text" class="form-control">
                    </div>
                </div> -->
            </div>

            <button @click="save()" class="btn btn-primary">Сохранить</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                schemes: [],
                kiosks: [],
                points: [],

                selected: {
                    kiosk: '',
                    point: '',
                    scheme1: '',
                    scheme2: '',
                },

                route_code_floor1: [],
                route_code_floor2: [],

                floor1_text_begin: '',
                floor1_text_end: '',
                floor2_text_begin: '',
                floor2_text_end: '',

                views: {
                    loading: true,
                }
            }
        },
        created() {
            this.loadKiosks()
            this.loadPoints()
            this.loadSchemes()
        },
        methods: {
            loadSchemes() {
                axios.get('/api/admin/schemes')
                .then(response => {
                    this.schemes = response.data

                    this.views.loading = false
                })
            },
            loadKiosks() {
                axios.get('/api/admin/kiosks')
                .then(response => {
                    this.kiosks = response.data
                })
            },
            loadPoints() {
                axios.get('/api/admin/points')
                .then(response => {
                    this.points = response.data
                })
            },
            clickOnMapScheme1: function (event) {
                let map = document.getElementById('wrapper-map')
                let x = event.pageX - map.offsetLeft
                let y = event.pageY - map.offsetTop
                if(this.route_code_floor1 && this.route_code_floor1.length > 0) {
                    let svgNS = "http://www.w3.org/2000/svg"
                    let svg_item = document.createElementNS(svgNS,'svg')
                    let path = document.createElementNS(svgNS,'path')
                    path.setAttribute('class','key-anim01')
                    path.setAttribute('fill','none')
                    path.setAttribute('stroke-width', '3px')
                    path.setAttribute('stroke','rgba(200,10,10,0.5)')
                    path.setAttribute('d', `M${x} ${y}, ${this.route_code_floor1.slice(-1)[0].x} ${this.route_code_floor1.slice(-1)[0].y}`)
                    let circle = document.createElementNS(svgNS,'circle')
                    circle.setAttribute('fill','#f33')
                    circle.setAttribute('cx', x)
                    circle.setAttribute('cy', y)
                    circle.setAttribute('r',4)
                    
                    svg_item.appendChild(path)
                    svg_item.appendChild(circle)
                    let svg = document.getElementById('map-path')
                    svg.appendChild(svg_item)
                } else {
                    let svgNS = "http://www.w3.org/2000/svg"
                    let svg_item = document.createElementNS(svgNS,'svg')
                    let circle = document.createElementNS(svgNS,'circle')
                    circle.setAttribute('fill','#f33')
                    circle.setAttribute('cx', x)
                    circle.setAttribute('cy', y)
                    circle.setAttribute('r',4)
                    svg_item.appendChild(circle)
                    let svg = document.getElementById('map-path')
                    svg.appendChild(svg_item)
                }
                this.route_code_floor1.push({x,y})
            },
            clickOnMapScheme2: function (event) {
                let map = document.getElementById('wrapper-map2')
                let x = event.pageX - map.offsetLeft
                let y = event.pageY - map.offsetTop
                if(this.route_code_floor2 && this.route_code_floor2.length > 0) {
                    let svgNS = "http://www.w3.org/2000/svg"
                    let svg_item = document.createElementNS(svgNS,'svg')
                    let path = document.createElementNS(svgNS,'path')
                    path.setAttribute('class','key-anim01')
                    path.setAttribute('fill','none')
                    path.setAttribute('stroke-width', '3px')
                    path.setAttribute('stroke','rgba(200,10,10,0.5)')
                    path.setAttribute('d', `M${x} ${y}, ${this.route_code_floor2.slice(-1)[0].x} ${this.route_code_floor2.slice(-1)[0].y}`)
                    let circle = document.createElementNS(svgNS,'circle')
                    circle.setAttribute('fill','#f33')
                    circle.setAttribute('cx', x)
                    circle.setAttribute('cy', y)
                    circle.setAttribute('r',4)
                    
                    svg_item.appendChild(path)
                    svg_item.appendChild(circle)
                    let svg = document.getElementById('map-path2')
                    svg.appendChild(svg_item)
                } else {
                    let svgNS = "http://www.w3.org/2000/svg"
                    let svg_item = document.createElementNS(svgNS,'svg')
                    let circle = document.createElementNS(svgNS,'circle')
                    circle.setAttribute('fill','#f33')
                    circle.setAttribute('cx', x)
                    circle.setAttribute('cy', y)
                    circle.setAttribute('r',4)
                    svg_item.appendChild(circle)
                    let svg = document.getElementById('map-path2')
                    svg.appendChild(svg_item)
                }
                this.route_code_floor2.push({x,y})
            },
            undoDotFloor1() {
                let select = document.getElementById('map-path')
                
                if(select.lastChild) {
                    select.removeChild(select.lastChild)
                    this.route_code_floor1.pop()
                }
            },
            undoDotFloor2() {
                let select = document.getElementById('map-path2')
                
                if(select.lastChild) {
                    select.removeChild(select.lastChild)
                    this.route_code_floor2.pop()
                }
            },
            save() {
                if(!this.selected.scheme1) {
                    return this.$swal({
                        text: 'Выберите схему',
                        icon: 'error',
                    })
                }

                if(!this.route_code_floor1) {
                    return this.$swal({
                        text: 'Нарисуйте маршрут',
                        icon: 'error',
                    })
                }

                axios.post(`/api/admin/routes`, {
                    kiosk_id: this.selected.kiosk.id,
                    point_id: this.selected.point.id,
                    scheme1_id: this.selected.scheme1.id,
                    scheme2_id: this.selected.scheme2.id,
                    floor1_text_begin: this.floor1_text_begin,
                    floor1_text_end: this.floor1_text_end,
                    floor2_text_begin: this.floor2_text_begin,
                    floor2_text_end: this.floor2_text_end,
                    route_code_floor1: this.route_code_floor1,
                    route_code_floor2: this.route_code_floor2
                })
                .then(response => (
                    this.$router.push({name: 'Routes', params: {kiosk: 1} })
                ))
                .catch((error) => {
                    //
                })
            }
        },
    }
</script>