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

        <div class="content p-4">
            <div class="page-editor">
                <div class="toolbox">
                    <ul>
                        <li>
                            <button @click="addBlock('text')" class="btn btn-outline-primary">+ Текст</button>
                        </li>
                        <li>
                            <button @click="addBlock('picture')" class="btn btn-outline-primary">+ Изображение</button>
                        </li>
                        <li>
                            <button @click="addBlock('picture_slider')" class="btn btn-outline-primary">+ Слайдер с изображениями</button>
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
                    <ul>
                        <li v-for="block in blocks">
                            <template v-if="block.type == 'text'">Текст</template>
                            <template v-if="block.type == 'picture'">Изображение</template>
                            <template v-if="block.type == 'picture_slider'">Слайдер с изображениями</template>
                            <template v-if="block.type == 'video'">Видеоролик</template>
                            <template v-if="block.type == 'pdf'">PDF-файл</template>
                            <template v-if="block.type == 'excel'">Excel-файл</template>
                            <template v-if="block.type == 'iframe'">iFrame</template>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            page: {},

            blocks: [],

            name: '',
            parent_id: '',
            language_id: '',

            views: {
                loading: true,
            }
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
                this.blocks = response.data.blocks

                this.views.loading = false
            })
        },
        addBlock(blockType) {
            let newBlock = {
                type: blockType,
                content: 'Текст...',
                order: 99
            }

            this.blocks.push(newBlock)
        },
    },
}
</script>