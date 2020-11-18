import Vue from 'vue';
import axios from 'axios';
import Common from '../common';

let vue = new Vue({
    el: '#home',
    components: {
        Paginate
    },
    data: {
        default_image : 'https://via.placeholder.com/300x300',
        arrArticlesTrending: [],
        arrArticlesHotNew: [],
        arrArticlesMostPopular: [],
        arrTags: [],
        arrCategories: [],
        loading: false,
        responseData: {
            last_page: 0,
        },
        arrErrors : [],
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
    methods: {
        getArticlesTrending() {
            axios.get('/article/get-article-trendding', {
                params : {
                    page : this.currentPage
                }
            })
                .then(res => {
                    this.arrArticlesTrending = res.data.data;
                    this.responseData = res.data; 
                })
        },
        getArticlesHotNew() {
            axios.get('/article/get-article-hot-new', {
                params : {
                    page : this.currentPage
                }
            })
            .then(res => {
                this.arrArticlesHotNew = res.data.data;
                this.responseData = res.data; 
            })
        },       
        getArticlesMostPopular() {
            axios.get('/article/get-article-most-popular'), {
                params : {
                    page : this.currentPage
                }
            }
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
