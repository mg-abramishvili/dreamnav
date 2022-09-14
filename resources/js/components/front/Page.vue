<template>
    <div class="page">
        <div class="page-header">
            <h1>{{ page.name }}</h1>
        </div>

        <div class="page-content">
            <template v-for="block in page.blocks">
                <div v-if="block.type == 'text'" class="page-block page-block-text">
                    <div v-html="block.content"></div>
                </div>

                <div v-else-if="block.type == 'image'" class="page-block page-block-image">
                    <img :src="block.content" alt="">
                </div>

                <div v-else-if="block.type == 'video'" class="page-block page-block-video">
                    <video v-if="block.content">
                        <source :src="block.content" type="video/mp4" />
                    </video>
                </div>

                <div v-else-if="block.type == 'pdf'" class="page-block page-block-pdf">
                    <iframe :src="'/pdfjs/web/viewer.html?file=' + block.content" height="100%" width="100%" style="border: none;"></iframe>
                </div>

                <div v-else-if="block.type == 'excel'" class="page-block page-block-excel">
                    <div :id="XlsxTable(block)" style="text-align: center;"></div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
import { read, utils } from 'xlsx'

export default {
    data() {
        return {
            page: {},
        }
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
        XlsxTable(block) {
            axios.get(block.content, { responseType: 'arraybuffer' })
            .then(response => {
                let wb = read(response.data)
                
                let div = document.getElementById(block.id)

                if(!div.innerHTML) {
                    document.getElementById(block.id).innerHTML = utils.sheet_to_html(wb.Sheets[wb.SheetNames[0]], { header: '', footer: '' })
                }
            })

            return block.id
        },
    },
}
</script>