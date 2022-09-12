<template>
    <div class="home">
        <div class="banners">
            <swiper
                :modules="modules"
                :slides-per-view="1"
                :space-between="0"
                :loop="true"
                :autoplay="true"
                :autoplayDelay="5000"
                :autoplayDisableOnInteraction="false"
                @swiper="onSwiper"
                @slideChange="onSlideChange"
                class="banner-home-slider">
                
                <swiper-slide v-for="(banner, index) in banners">
                    <div class="banner-home-slide" v-bind:style="{ 'background-image': 'url(' + banner.content + ')' }"></div>
                </swiper-slide>
            </swiper>
        </div>

        <div class="home-main">
            <div class="sidebar">
                <div class="logo">
                    <img :src="$parent.config.logo" alt="">
                    <p>{{ $parent.config.title }}</p>
                </div>
            </div>
            <div class="menu">
                <ul>
                    <li v-for="page in pages">
                        {{ page.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import { Autoplay } from 'swiper';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/autoplay'

export default {
    props: ['pages', 'banners'],
    data() {
        return {
            views: {
                sliderArrows: true,
            }
        }
    },
    setup() {
        const onSwiper = (swiper) => {
            console.log(swiper)
        }
        const onSlideChange = () => {
            console.log('slide change')
        }
        return {
            onSwiper,
            onSlideChange,
            modules: [Autoplay],
        }
    },
    methods: {
        goToPage(id) {
            this.$parent.goToPage(id)
        },
        slideToZero() {
            //
        },
    },
    components: {
        Swiper,
        SwiperSlide,
    },
}
</script>