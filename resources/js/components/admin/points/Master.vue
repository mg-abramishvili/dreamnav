<template>
    <div>
        <div class="content-header px-4">
            <h1>
                <router-link :to="{name: 'Points'}" class="btn btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </router-link>

                <template v-if="$route.params.id">
                    {{ point.name }}
                </template>
                <template v-else>
                    Новая точка
                </template>
            </h1>
        </div>

        <div v-if="views.loading" class="p-4">
            <Loader />
        </div>

        <div v-if="!views.loading" class="content p-4">
            <div class="mb-4">
                <label class="form-label">Название</label>
                <input v-model="name" type="text" class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label">Схема</label>
                <select v-model="selected.scheme" class="form-select">
                    <option v-for="scheme in schemes" :value="scheme">{{ scheme.name }}</option>
                </select>
            </div>

            <div @click="createPoint($event)" class="point-drawing-area">
                <img :src="selected.scheme.image" alt="">
            </div>

            <button @click="save()" :disabled="!views.saveButton" class="btn btn-primary">Сохранить</button>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            point: {},

            name: '',
            points: [],

            schemes: [],

            selected: {
                scheme: '',
            },

            views: {
                loading: true,
                saveButton: true,
            },
        }
    },
    created() {
        this.loadSchemes()

        if(this.$route.params.id) {
            this.loadPoint()
        }
    },
    methods: {
        loadSchemes() {
            axios.get(`/api/admin/schemes`)
            .then(response => {
                this.schemes = response.data

                this.views.loading = false
            })
        },
        loadPoint() {
            axios.get(`/api/admin/point/${this.$route.params.id}`)
            .then(response => {
                this.point = response.data

                this.name = response.data.name

                if(response.data.image) {
                    this.filepond_image_edit = [
                        {
                            source: response.data.image,
                            options: {
                                type: 'local',
                            }
                        }
                    ]
                }

                this.views.loading = false
            })
        },
        createPoint(event) {
            let map = document.getElementsByClassName('point-drawing-area')[0]
            let x = event.pageX - map.offsetLeft
            let y = event.pageY - map.offsetTop

            if(this.points.length) {
                this.points.push(x + ' ' + y)
            } else {
                this.points.push(x + ' ' + y, (x + 1) + ' ' + (y + 1))
            }

            let svgs = map.getElementsByTagName("svg")
            for (var i = 0; i < svgs.length; i++) {
                svgs[i].remove()
            }

            let xmlns = "http://www.w3.org/2000/svg"
            let svg = document.createElementNS(xmlns, "svg")
            let polygon = document.createElementNS(xmlns, "polygon")

            polygon.setAttribute("points", this.points.join())
            polygon.setAttribute("style", "fill:lime;stroke:purple;stroke-width:1")
            svg.appendChild(polygon)
            map.appendChild(svg)
        },
        save() {
            this.views.saveButton = false

            if(this.$route.params.id) {
                axios.put(`/api/admin/point/${this.$route.params.id}/update`, {
                    name: this.name,
                    image: this.image
                })
                .then(response => {
                    this.views.saveButton = true
    
                    this.$router.push({ name: 'Points' })
                })
                .catch(errors => {
                    this.views.saveButton = true
                    
                    return this.$swal({
                        text: 'Ошибка',
                        icon: 'error',
                    })
                })
            }

            if(!this.$route.params.id) {
                axios.post(`/api/admin/points`, {
                    name: this.name,
                    image: this.image
                })
                .then(response => {
                    this.views.saveButton = true
    
                    this.$router.push({ name: 'Points' })
                })
                .catch(errors => {
                    this.views.saveButton = true
                    
                    return this.$swal({
                        text: 'Ошибка',
                        icon: 'error',
                    })
                })
            }
        }
    },
}
</script>