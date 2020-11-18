import Axios from 'axios';
import Vue from 'vue';

let vue = new Vue({
    el: '#header',
    components: {
        axios
    },
    data: {
        header : '',
        social_link : '',
        menu : []
    },
    created() {
        this.getMenu();
    },
    methods: {
       getMenu() {
            axios.get('category/get-all')
                .then(res => {
                    this.menu = res.data.data;
                })
       },
       getSocial() {
            axios.get('social_link/get-data')
                .then(res => {
                    this.social_link = res.data.data;
                })
       }
    }
})
