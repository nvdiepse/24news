import Vue from 'vue';
import axios from 'axios';
import Common from '../common';
import Main from '../../../public/client/js/main';

let vue = new Vue({
    el: '#home',
    components: {
        Paginate
    },
    data: {
        default_image: 'https://via.placeholder.com/300x300',
        arrArticlesTrending: [],
        arrArticlesHotNew: [],
        arrArticlesMostPopular: [],
        arrTags: [],
        arrCategories: [],
        loading: false,
        responseData: {
            last_page: 0,
        },
        arrErrors: [],
        currentPage: 1,

    },
    created() {
        this.getArticlesTrending();
        this.getArticlesHotNew();
        this.getArticlesMostPopular();
        this.getTags();
        this.getArticlesMostPopular();
        this.getCategories();
    },
    mounted() {

    },

    methods: {
        getArticlesTrending() {
            axios.get('/article/get-article-trendding')
                .then(res => {
                    this.arrArticlesTrending = res.data.data;
                    // return;
                    this.$nextTick(() => {
                        $('#slider1').owlCarousel({
                            loop: false,
                            margin: 10,
                            dots: false,
                            nav: true,
                            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 3
                                },
                                1000: {
                                    items: 4
                                }
                            }
                        });


                        // $('#slider2').owlCarousel({
                        //     loop: false,
                        //     margin: 10,
                        //     dots: false,
                        //     nav: true,
                        //     navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                        //     responsive: {
                        //         0: {
                        //             items: 1
                        //         },
                        //         600: {
                        //             items: 2
                        //         },
                        //         1000: {
                        //             items: 3
                        //         }
                        //     }
                        // });

                        // $('#slider3').owlCarousel({
                        //     loop: false,
                        //     margin: 10,
                        //     dots: false,
                        //     nav: true,
                        //     navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                        //     responsive: {
                        //         0: {
                        //             items: 1
                        //         },
                        //         600: {
                        //             items: 2
                        //         },
                        //         1000: {
                        //             items: 3
                        //         }
                        //     }
                        // });
                    })
                })
        },
        getArticlesHotNew() {
            axios.get('/article/get-article-hot-new', {
                    params: {
                        page: this.currentPage
                    }
                })
                .then(res => {
                    this.arrArticlesHotNew = res.data.data;
                    this.responseData = res.data;
                })
        },
        getArticlesMostPopular() {
            axios.get('/article/get-article-most-popular')
                .then(res => {
                    this.arrArticlesMostPopular = res.data.data;
                })
        },
        getTags() {

        },
        getCategories() {

        },
        toUpperCaseString(str) {
            return Common.toUpperCaseString(str);
        }
    }
})
