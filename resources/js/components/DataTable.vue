<template>
    <section>
        <div class="box" v-if="checkedRows.length > 0">
            <button @click="deleteRecord" class="button is-danger">{{text.delete}}</button>
        </div>
        <button :disabled="!checkedRows.length" @click="checkedRows = []"
                class="button field is-danger">
            <b-icon icon="close"></b-icon>
            <span v-text="text.uncheck"></span>
        </button>

        <b-tabs>
            <b-tab-item :label="text.type">
                <b-table
                    :checked-rows.sync="checkedRows"
                    :columns="cols"
                    :data="data"
                    :loading="loading"
                    checkable>
                </b-table>
            </b-tab-item>
        </b-tabs>
        <div class="box" v-if="checkedRows.length > 0">
            <button @click="deleteRecord" class="button is-danger">{{text.delete}}</button>
        </div>
    </section>
</template>


<script>
    import {EventBus} from "../app";

    export default {
        mounted() {
            this.loadData()
        },
        data() {
            return {
                cols: [],
                data: [],
                checkedRows: [],
                loading: false,
                text: {
                    type: balance.type,
                    delete: balance.delete,
                    uncheck: balance.uncheck
                }
            }
        },
        methods: {
            loadData() {
                axios.get('/fetch-data-table').then(({data}) => {
                    this.data = data.dataset;
                    let columnsNames = [];
                    for (let i = 0; i < data.columns.length; i++) {
                        let row = {
                            field: data.columns[i],
                            label: data.columns[i],
                        };
                        columnsNames.push(row);
                        this.cols = columnsNames;
                    }
                })
            },
            deleteRecord() {
                let url = `/types/`;
                this.loading = true;
                this.checkedRows.forEach(function (row) {
                    axios.delete(url + row.id).then(function (response) {
                        EventBus.$emit('flash', response.data)
                    })
                });
                this.loadData();
                this.checkedRows = [];
                this.loading = false;
            },
        }
    }
</script>

<style>
    thead {
        direction: ltr;
    }
</style>
