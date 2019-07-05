import axios from 'axios';

export const fetchItems = function () {
    return axios.get('/api/items');
};

export const fetchOrders = function (type) {
    return axios.get('/api/orders/'+type);
};