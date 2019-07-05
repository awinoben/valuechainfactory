<script>
    import axios from 'axios';
    import { Message } from 'element-ui';

    export default {

        data() {
            return {
                items: [],
                item: {},
                sell: false,
                form: {
                    quantity: 0
                },

                selling: false
            }
        },

        methods: {

            fetchItems() {
                axios.get('/api/items').then( ({ data }) => {
                    this.items = data;
                }, () => {
                    alert("Failed to fetch");
                });
            },

            sale(id) {

                this.item = this.items.filter( item => item.id === id)[0];

                this.sell = true;
            },

            confirmSell() {
                this.selling = true;

                axios.post('/api/sell/'+this.item.id, this.form)
                    .then( ({ data }) => {

                        this.fetchItems();

                        Message.success({ message: 'Product is successfully updated!' });

                        this.sell = false;
                        this.selling = false;

                    }, () => {
                        this.selling = false;
                    });
            }
        },

        mounted() {
            this.fetchItems();
        }
    }
</script>

<template>
    <div class="">
        <table class="table table-bordered table-responsive-md">
            <thead>
                <th style="width:30%">Product</th>
                <th style="width:40%">Description</th>
                <th>Quantity</th>
                <th>Reorder Level</th>
                <th style="width:15%">Action</th>
            </thead>
            <tbody>
                <tr v-for="item in items">
                    <td>{{ item.name }}</td>
                    <td>{{ item.description }}</td>
                    <td>{{ item.quantity }}</td>
                    <td>{{ item.reorder_level }}</td>
                    <td><el-button type="success" size="small" @click="sale(item.id)">SALE</el-button></td>
                </tr>
            </tbody>

        </table>

        <el-dialog
                title="SELL"
                :visible.sync="sell"
                width="30%">
            <div class="">
                <div class="">
                    <label for="">Specify quantity to sell</label>
                    <input type="text" v-model="form.quantity">
                </div>
            </div>

            <span slot="footer" class="dialog-footer">

            <el-button type="primary" @click="confirmSell()">
                <i class="el-icon-loading" v-if="selling"></i>
                Confirm
            </el-button>
            <el-button @click="sell = false">Cancel</el-button>

          </span>
        </el-dialog>
    </div>
</template>