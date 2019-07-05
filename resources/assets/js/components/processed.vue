<script>
    import { mapGetters } from 'vuex';

    export default {

        computed: {
            ...mapGetters({
                p_orders: 'p_orders'
            })
        },

        mounted() {
            this.$store.commit('FETCH_PROCESSED_ORDERS', 'processed');
        }
    }
</script>

<template>
    <div class="">
        <table class="table table-bordered table-responsive-md">
            <thead>
            <th style="width:30%">Product</th>
            <th>Quantity</th>
            </thead>
            <tbody>
            <tr v-for="order in p_orders">
                <td>{{ order.product }}</td>
                <td>{{ order.quantity }}</td>
            </tr>
            </tbody>

        </table>
    </div>
</template>