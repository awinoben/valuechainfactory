<script>
    import axios from 'axios';
    import { Message } from 'element-ui';
    import { mapGetters } from 'vuex';

    export default {

        data() {
            return {
                dispatching: false,
            }
        },

        computed: {
            ...mapGetters({
                u_orders: 'u_orders'
            })
        },

        methods: {

            dispatchOrder(id) {

                this.dispatching = true;

                axios.get('/api/orders/'+id+'/dispatch')
                    .then( ({ data }) => {

                        Message.success({ message: 'Order dispatched successfully!' });

                        this.dispatching = false;

                        this.$store.commit('FETCH_ITEMS');
                        this.$store.commit('FETCH_PROCESSED_ORDERS', 'processed');
                        this.$store.commit('FETCH_UN_PROCESSED_ORDERS', 'unprocessed');

                    }, () => {
                        this.dispatching = false;
                    });
            }
        },

        mounted() {
            this.$store.commit('FETCH_UN_PROCESSED_ORDERS', 'unprocessed');
        }
    }
</script>

<template>
    <div class="">
        <table class="table table-bordered table-responsive-md">
            <thead>
            <th style="width:30%">Product</th>
            <th>Quantity</th>
            <th style="width:15%">Action</th>
            </thead>
            <tbody>
            <tr v-for="order in u_orders">
                <td>{{ order.product }}</td>
                <td>{{ order.quantity }}</td>
                <td><el-button type="success" size="small" @click="dispatchOrder(order.id)">DISPATCH</el-button></td>
            </tr>
            </tbody>

        </table>
    </div>
</template>