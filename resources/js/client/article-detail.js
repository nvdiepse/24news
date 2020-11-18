import Vue from 'vue';
import Common from '../common.js';

let vue = new Vue({
    el: '#article_detail',
    components: {
        axios
    },
    data: {
        article : '',
    },
    created() {
        this.getArticle();
    },
    methods: {
        getArticle() {
            let pathname = location.pathname;
            let slug = pathname.replace('/article/','');
            let link = '/article/find-by-slug/' +  slug;
            axios.get(link)
                .then(res => {
                    this.article = res.data;
                    console.log(this.article);
                })
        },

        toLocaleUpperCase(str) {
            return Common.toUpperCaseString(str);
        }
    }
})
