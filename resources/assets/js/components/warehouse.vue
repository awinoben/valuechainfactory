<script>
    import ItemTable from './table';
    import ProcessedTable from './processed';
    import UnProcessedTable from './unprocessed';

    export default {
        components: {
            ItemTable,
            ProcessedTable,
            UnProcessedTable
        }
    }

</script>

<template>

    <div class="container-fluid">

        <el-tabs>
           <!-- <el-tab-pane label="PRODUCT TABLE">
                <div class="row">

                    <div class="col-lg-12 mb-4">

                        <div class="card shadow mb-4">

                            <div class="card-body">
                                <item-table></item-table>
                            </div>
                        </div>

                    </div>
                </div>
            </el-tab-pane>-->

            <el-tab-pane label="PROCESSED ORDERS">

                <div class="row">

                    <div class="col-lg-12 mb-4">

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <processed-table></processed-table>
                            </div>
                        </div>

                    </div>
                </div>

            </el-tab-pane>

            <el-tab-pane label="UNPROCESSED ORDERS">

                <div class="row">

                    <div class="col-lg-12 mb-4">

                        <div class="card shadow mb-4">

                            <div class="card-body">
                                <un-processed-table></un-processed-table>
                            </div>
                        </div>

                    </div>
                </div>

            </el-tab-pane>
        </el-tabs>
    </div>
</template>

