<script>
    import ItemTable from './table';

    export default {
        components: {
            ItemTable
        }
    }
</script>

<template>

    <div class="container-fluid">
        
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product Listings</h6>
                    </div>

                    <div class="card-body">
                        <item-table></item-table>
                    </div>
                </div>

                <!-- Color System -->
            </div>
        </div>
    </div>
</template>

