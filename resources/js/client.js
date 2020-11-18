require('./bootstrap');
import Paginate from 'vuejs-paginate';
import moment from 'moment';
import axios from 'axios';
import Vue from 'vue';

window.Vue = Vue;
window.Paginate = Paginate;
window.axios = axios;
window.moment = moment;
