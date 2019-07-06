import Vuex from 'vuex';
import Vue from 'vue';
import axios from "axios/index";
import * as IndexApis from '../apis/ProductApi';

Vue.use(Vuex);

const state = {
    p_orders: [],
    u_orders: [],
    items: []
};

const getters = {

    p_orders: state => state.p_orders,
    u_orders: state => state.u_orders,
    items: state => state.items,
};

const mutations = {

    FETCH_ITEMS(state) {

        IndexApis.fetchItems()
            .then( ({ data }) => {
                state.items = data;
            }, () => {
                alert("Failed to fetch");
            });
    },

    FETCH_PROCESSED_ORDERS(state, type) {

        IndexApis.fetchOrders(type)
            .then( ({ data }) => {
                state.p_orders = data;
            }, () => {
                alert("Failed to fetch");
            });
    },

    FETCH_UN_PROCESSED_ORDERS(state, type) {

        IndexApis.fetchOrders(type)
            .then( ({ data }) => {
                state.u_orders = data;
            }, () => {
                alert("Failed to fetch");
            });
    }
};

const store = new Vuex.Store({
    state, getters, mutations
});

export default store;