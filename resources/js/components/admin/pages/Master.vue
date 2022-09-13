<template>
    <div>
        <div class="content-header px-4">
            <h1>
                <router-link :to="{name: 'Pages'}" class="btn btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </router-link>

                <template v-if="$route.params.id">
                    {{ page.name }}
                </template>
                <template v-else>
                    Новая страница
                </template>
            </h1>
        </div>

        <!-- <pre>{{blocks}}</pre> -->

        <div class="content p-4">
            <div class="mb-4">
                <label class="form-label">Название страницы</label>
                <input v-model="name" type="text" class="form-control">
            </div>

            <div class="page-editor">
                <div class="toolbox">
                    <ul>
                        <li>
                            <button @click="addBlock('text')" class="btn btn-outline-primary">+ Текст</button>
                        </li>
                        <li>
                            <button @click="addBlock('image')" class="btn btn-outline-primary">+ Изображение</button>
                        </li>
                        <li>
                            <button @click="addBlock('image_slider')" class="btn btn-outline-primary">+ Слайдер с изображениями</button>
                        </li>
                        <li>
                            <button @click="addBlock('video')" class="btn btn-outline-primary">+ Видеоролик</button>
                        </li>
                        <li>
                            <button @click="addBlock('pdf')" class="btn btn-outline-primary">+ PDF-файл</button>
                        </li>
                        <li>
                            <button @click="addBlock('excel')" class="btn btn-outline-primary">+ Excel-файл</button>
                        </li>
                        <li>
                            <button @click="addBlock('iframe')" class="btn btn-outline-primary">+ iFrame</button>
                        </li>
                    </ul>
                </div>

                <div class="page-area">
                    <draggable
                        :list="blocks"
                        :disabled="false"
                        item-key="id"
                        ghost-class="ghost"
                        :move="checkMove" >

                        <template #item="{ element }">
                            <div v-if="element.type == 'text'" class="block-area">
                                <div @click="editBlock(element)" v-html="element.content"></div>
                                <button @click="removeBlock(element.id)" class="btn btn-secondary">&times;</button>
                            </div>

                            <div v-else-if="element.type == 'image'" class="block-area">
                                <div @click="editBlock(element)">
                                    <img v-if="element.content" :src="element.content" alt="">
                                    <img v-else src="/img/image-placeholder.png" alt="">
                                </div>
                                <button @click="removeBlock(element.id)" class="btn btn-secondary">&times;</button>
                            </div>

                            <div v-else-if="element.type == 'video'" class="block-area">
                                <div @click="editBlock(element)">
                                    <video v-if="element.content">
                                        <source :src="element.content" type="video/mp4" />
                                    </video>
                                    <img v-else src="/img/video-placeholder.png" alt="">
                                </div>
                                <button @click="removeBlock(element.id)" class="btn btn-secondary">&times;</button>
                            </div>

                            <div v-else-if="element.type == 'pdf'" class="block-area">
                                <div @click="editBlock(element)">
                                    <template v-if="element.content" >
                                        <iframe :src="'/pdfjs/web/viewer-admin.html?file=' + element.content" height="100%" width="100%" style="border: none;"></iframe>
                                        <div class="iframe-overlay"></div>
                                    </template>
                                    <img v-else src="/img/pdf-placeholder.png" alt="">
                                </div>
                                <button @click="removeBlock(element.id)" class="btn btn-secondary">&times;</button>
                            </div>

                            <div v-else-if="element.type == 'excel'" class="block-area">
                                <div @click="editBlock(element)">
                                    <template v-if="element.content" >
                                        <xlsx-read :file="element.content">
                                            <template #default="{collection}">
                                                <div>
                                                {{ collection }}
                                                </div>
                                            </template>
                                        </xlsx-read>
                                    </template>
                                    <img v-else src="/img/excel-placeholder.png" alt="">
                                </div>
                                <button @click="removeBlock(element.id)" class="btn btn-secondary">&times;</button>
                            </div>
                        </template>
                    </draggable>
                </div>
            </div>

            <button @click="save()" :disabled="!views.saveButton" class="btn btn-primary mt-4">Сохранить</button>
        </div>

        <BlockMaster v-if="selected.block" :block="selected.block" />
        <div v-if="selected.block" class="modal-backdrop fade show"></div>
    </div>
</template>

<script>
import draggable from "vuedraggable"
import { XlsxRead } from "vue3-xlsx"

import BlockMaster from './blocks/Master.vue'

export default {
    data() {
        return {
            page: {},

            blocks: [],

            name: '',
            parent_id: '',
            language_id: '',

            selected: {
                block: '',
            },

            views: {
                loading: true,
                saveButton: true,
            }
        }
    },
    watch: {
        blocks: {
            handler() {
                setTimeout(() => {
                    this.blocks = this.blocks.map(function(block, index) {
                        {
                            return {
                                id: block.id,
                                type: block.type,
                                content: block.content,
                                order: index
                            } 
                        }
                    })
                }, 1000)
            },
            deep: true,
        }
    },
    created() {
        if(this.$route.params.id) {
            this.loadPage()
        }
    },
    methods: {
        loadPage() {
            axios.get(`/api/admin/page/${this.$route.params.id}`)
            .then(response => {
                this.page = response.data

                this.name = response.data.name
                this.blocks = response.data.blocks

                this.views.loading = false
            })
        },
        addBlock(blockType) {
            let content = ''

            if(blockType == 'text') {
                content = "<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>"
            }

            let newBlock = {
                id: 'temp_' + blockType + '_' + Math.floor((Math.random()*100) + 1) + '_' + Math.floor((Math.random()*100) + 1),
                type: blockType,
                content: content,
                order: 99
            }

            this.blocks.push(newBlock)
        },
        removeBlock(id) {
            this.blocks = this.blocks.filter(block => block.id != id)
        },
        editBlock(block) {
            this.selected.block = block
        },
        checkMove: function(e) {
            console.log(e)
        },
        save() {
            if(!this.name) {
                return this.$swal({
                    text: 'Укажите название',
                    icon: 'error',
                })
            }
            if(!this.blocks.length) {
                return this.$swal({
                    text: 'Страница не может быть пуста, добавить блоки с контентом',
                    icon: 'error',
                })
            }

            this.views.saveButton = false

            if(this.$route.params.id) {
                axios.put(`/api/admin/page/${this.$route.params.id}/update`, {
                    name: this.name,
                    blocks: this.blocks,
                })
                .then(response => {
                    this.views.saveButton = true
    
                    this.$router.push({ name: 'Pages' })
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
                axios.post(`/api/admin/pages`, {
                    name: this.name,
                    blocks: this.blocks,
                })
                .then(response => {
                    this.views.saveButton = true
    
                    this.$router.push({ name: 'Pages' })
                })
                .catch(errors => {
                    this.views.saveButton = true
                    
                    return this.$swal({
                        text: 'Ошибка',
                        icon: 'error',
                    })
                })
            }
        },
    },
    components: {
        draggable,
        BlockMaster,
        XlsxRead,
    }
}
</script>