import Vue from 'vue';
import axios from 'axios';
import Common from '../js/common';
import moment from 'moment';
import { Cropper } from 'vue-advanced-cropper';

let vue = new Vue({
    el: '#article',
    components: {
        Paginate,
        Cropper,
    },
    data: {
        article: {
            id: '',
            title: '',
            slug: '',
            image: '',
            description: '',
            content: '',
            status: '',
            category_id: 1,
            author: '',
            meta_keyword: '',
            meta_description: '',
            meta_title: '',

        },
        default_image: 'https://via.placeholder.com/300x300',
        arrArticles: [],
        arrCategories: [],
        count: '1',
        txtSearch: '',
        limit: 10,
        loading: false,
        responseData: {
            last_page: 0,
        },
        arrErrors: [],
        url: '',
        currentPage: 1,

    },
    created() {
        this.getArticles();
        this.$nextTick(() => {
            CKEDITOR.replace('ckeditor');
            CKEDITOR.instances.ckeditor.on('change', () => {
                this.article.content = CKEDITOR.instances.ckeditor.getData();
            });
        });
    },

    methods: {
        create() {
            $('#modal_article').modal('show');
            this.clear();
        },

        findById(item) {
            let link = '/admin/articles/find-by-id/' + item;
            axios.get(link)
                .then(res => {
                    this.article = res.data;
                    this.default_image = res.data.__link_image;
                    $('#modal_article').modal('show');
                })
        },
        deleteById(item) {
            let msg = confirm('Are you sure delete item?');
            if (msg == true) {
                let link = '/admin/articles/delete-by-id/' + item;
                axios.get(link)
                    .then(res => {
                        this.getArticles();
                        Common.alertSuccess('Success', 'Delete success');
                    })
            }
        },
        clear() {
            this.article.id = '';
            this.article.title = '';
            this.article.slug = '';
            this.article.image = '';
            this.article.description = '';
            this.article.content = '';
            this.article.status = '';
            this.article.category_id = '';
            this.article.author = '';
            this.article.meta_keyword = '';
            this.article.meta_description = '';
            this.article.meta_title = '';
        },
        submit() {
            if (this.article.id) {

            } else {
                let link = '/admin/articles/store'
                axios.post(link, this.article)
                    .then(res => {
                        this.getArticles();
                        $('#modal_article').modal('hide');
                        Common.alertSuccess('Create', 'Create success.');
                        this.arrErrors = [];
                    })
                    .catch(error => {
                        this.arrErrors = error.response.data.errors;
                        $('#modal_article').modal('hide');
                    })
            }
        },
        change({ canvas }) {
            this.article.image = canvas.toDataURL();
        },
        getImageUpload(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
        getCategory() {
            axios.get('/admin/articles/get-category')
                .then(res => {
                    this.arrCategories = res.data.data
                })
        },
        findBySlug(slug) {
            let link = '/admin/articles/find-by-slug/' + slug;
            axios.get(link)
                .then(res => {
                    this.article = res.data;
                    $('#modal_article_deltail').modal('show');
                })
                .catch(err => {

                })
        },
        getSlug() {
            return this.article.slug = Common.getSlug(this.article.title);
        },

        getArticles() {
            let link = '/admin/articles/get-article';
            axios.get(link, {
                params: {
                    limit: this.limit,
                    txtSearch: this.txtSearch,
                    page: this.currentPage
                }
            })
                .then(res => {
                    this.loading = false;
                    this.responseData = res.data;
                    this.arrArticles = res.data.data;
                    this.getNumberStart();
                    this.getCount();
                })
                .catch(error => {
                    console.log(error);
                })
        },
        toUpperCaseString(string) {
            return Common.toUpperCaseString(string);
        },
        formatDate(date) {
            return moment(date, 'H:i d/m/Y');
        },
        getNumberStart() {
            return this.limit * this.currentPage - this.limit;
        },
        getCount() {
            let link = '/admin/articles/get-count';
            axios.get(link, {
                params: {
                    limit: this.limit,
                    txtSearch: this.txtSearch,
                    page: this.currentPage
                }
            })
                .then(res => {
                    this.count = res.data;
                })
        },
    }
})
