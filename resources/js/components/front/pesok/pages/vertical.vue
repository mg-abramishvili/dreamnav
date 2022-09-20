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
                    <video v-if="block.content" :id="'video_' + block.id" autoplay controls disablePictureInPicture controlsList="noplaybackrate nodownload">
                        <source :src="block.content" type="video/mp4" />
                    </video>
                </div>

                <div v-else-if="block.type == 'pdf'" class="page-block page-block-pdf">
                    <iframe :src="'/pdfjs/web/viewer.html?file=' + block.content" height="100%" width="100%" style="border: none;"></iframe>
                </div>

                <div v-else-if="block.type == 'excel'" class="page-block page-block-excel">
                    <div :id="XlsxTable(block)" style="text-align: center;"></div>
                </div>

                <div v-else-if="block.type == 'iframe'">
                    <iframe :src="block.content" frameborder="0" style="width: 100%; height: 85vh; background: white"></iframe>
                </div>

                <div v-else-if="block.type == 'routes'">
                    <Routes ref="routes" :kiosk="kiosk" />
                </div>
            </template>

            <template v-if="page.is_folder">
                <ul>
                    <li v-for="pg in page.children">{{ pg.name }}</li>
                </ul>
            </template>
        </div>

        <div class="footer page-footer">
            <button @click="goTo(page, 'home')">На главную</button>
        </div>
    </div>
</template>

<script>
import { read, utils } from 'xlsx'
import Routes from '../../_comps/Routes.vue'

export default {
    props: ['page', 'kiosk'],
    data() {
        return {
            //
        }
    },
    methods: {
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
        goTo(fromPage, toPage) {
            this.$parent.goTo(fromPage, toPage)
        },
    },
    components: {
        Routes
    }
}
</script>