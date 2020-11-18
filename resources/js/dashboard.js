import Vue from 'vue';
import axios from 'axios';
import Paginate from 'vuejs-paginate';
import Common from './common';

let vue = new Vue({
    el: '#dashboard',
    component: {
        FullCalendar,
        interactionPlugin,
        dayGridPlugin
    },
    data: {
        calendarOptions: {
            plugins: [ dayGridPlugin, interactionPlugin ],
            initialView: 'dayGridMonth'
        }
    },
    created() {

    },

    methods: {

    }
})

