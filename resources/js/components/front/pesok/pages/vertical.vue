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

                <div v-else-if="block.type == 'image_slider'" class="page-block page-block-image-slider" :class="[`${page.blocks.length > 1 ? 'page-block-image-slider-mini':'page-block-image-slider-max'}`]">
                    <swiper v-if="block.content"
                        :slides-per-view="1"
                        :space-between="0"
                        :loop="false"
                        :allow-touch-move="true"
                        @swiper="onSwiper"
                        class="image_slider-slider" >
                        
                        <swiper-slide v-for="(s, index) in block.content.split(',')">
                            <div class="image_slider-slide" v-bind:style="{ 'background-image': 'url(' + s + ')' }"></div>
                        </swiper-slide>
                    </swiper>
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

                <div v-else-if="block.type == 'events'">
                    <Events ref="events" />
                </div>
            </template>

            <template v-if="page.is_folder">
                <ul class="folder">
                    <li @click="goTo(page, pg)" v-for="pg in page.children">
                        <div v-if="pg.icon" class="icon" v-bind:style="{ 'background-image': 'url(' + pg.icon.image + ')' }"></div>
                        <span>{{ pg.name }}</span>
                    </li>
                </ul>
            </template>
        </div>

        <div class="footer page-footer">
            <button v-if="page.parent" @click="goTo(page, page.parent)">Назад</button>
            <button @click="goTo(page, 'home')">На главную</button>
        </div>
    </div>
</template>

<script>
import { read, utils } from 'xlsx'

import Routes from '../../_comps/Routes.vue'
import Events from '../../_comps/Events.vue'

import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'

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
        onSwiper(swiper) {
            this.swiper = swiper
        },
        prev() {
            let currentSlide = this.swiper.realIndex

            this.swiper.slideTo(currentSlide - 1)
        },
        next() {
            let currentSlide = this.swiper.realIndex

            this.swiper.slideTo(currentSlide + 1)
        },
        slideToZero() {
            this.swiper.slideTo(0)
        }
    },
    components: {
        Routes,
        Events,
        Swiper,
        SwiperSlide,
    }
}
</script>