import Vue from 'vue';
import axios from 'axios';
import Common from '../js/common';
let vue = new Vue({
    el: '#category_article',
    components: {
        Paginate
    },
    data: {
        count: '1',
        txtSearch: '',
        limit: 10,
        category_article: {
            title: '',
            id: '',
            slug: '',
        },
        arrCategories: [],
        loading: false,
        responseData: {
            last_page: 0,
        },
        arrErrors: [],
        currentPage: 1,
    },
    created() {
        this.getCategoryArticle();
    },

    methods: {
        getNumberStart() {
            return this.limit * this.currentPage -  this.limit;
        },

        create() {
            $('#modal_category_article').modal('show');
        },

        submit() {
            if (this.category_article.id) {
                let link = '/admin/category-article/update/' + this.category_article.id;
                axios.put(link, {
                    title: this.category_article.title,
                    slug: this.category_article.slug,
                })
                    .then(res => {
                        $('#modal_category_article').modal('hide');
                        this.getCategoryArticle();
                    })
                    .catch((error) => {
                        this.arrErrors = error.response.data.errors;
                        $("#modal_category_article").modal('show');
                    });
            } else {
                let link = '/admin/category-article/store';
                axios.post(link, {
                    title: this.category_article.title,
                    slug: this.category_article.slug,
                })
                    .then(res => {
                        $('#modal_category_article').modal('hide');
                        this.getCategoryArticle();
                    })
                    .catch(err => {
                        $('#modal_category_article').modal('show');
                    })
            }

        },
        
        deleteById(id) {
            let cf = confirm('Are you sure delete item?');
            if (cf == true) {
                let link = '/admin/category-article/delete/' + id;            
                axios.get(link)
                    .then(res => {
                        this.getCategoryArticle();
                    })
            }
        },

        update(id) {
            let link = '/admin/category-article/find-by-id/' + id;
            axios.get(link)
                .then(res => {
                    this.category_article = res.data;
                    $('#modal_category_article').modal('show');
                })
        },

        getCategoryArticle() {
            this.loading = true;
            let link = '/admin/category-article/get-category-article';
            axios.get(link,{
                params : {
                    limit : this.limit,
                    txtSearch : this.txtSearch,
                    page : this.currentPage
                }
            })
                .then(res => {
                    this.loading = false;
                    this.responseData = res.data; 
                    this.arrCategories = res.data.data;
                    this.getNumberStart();
                    this.getCountRecord();
                })
        },
        getCountRecord() {
            let link = '/admin/category-article/get-count-record';
            axios.get(link,{
                params : {
                    limit : this.limit,
                    txtSearch : this.txtSearch,
                    page : this.currentPage
                }
            })
                .then(res => {
                    this.count =  res.data;
                })
        },

        getSlug() {
            return this.category_article.slug = Common.getSlug(this.category_article.title);
        },
    }
})