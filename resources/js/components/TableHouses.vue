<template>
    <el-row :gutter="20">
        <el-col>
            <el-col>
                <el-input placeholder="Name" v-model="searchFilters.name" @input="handleInput"></el-input>
            </el-col>
            <el-col :span="2">
                <el-input placeholder="Min price" v-model="searchFilters.min_price" @input="handleInput"></el-input>
            </el-col>
            <el-col :span="2">
                <el-input placeholder="Max price" v-model="searchFilters.max_price" @input="handleInput"></el-input>
            </el-col>
            <el-col :span="2">
                <el-input placeholder="Bedrooms" v-model="searchFilters.bedrooms" @input="handleInput"></el-input>
            </el-col>
            <el-col :span="2">
                <el-input placeholder="Bathrooms" v-model="searchFilters.bathrooms" @input="handleInput"></el-input>
            </el-col>
            <el-col :span="2">
                <el-input placeholder="Storeys" v-model="searchFilters.storeys" @input="handleInput"></el-input>
            </el-col>
            <el-col :span="2">
                <el-input placeholder="Garages" v-model="searchFilters.garages" @input="handleInput"></el-input>
            </el-col>
            <el-col>
                <el-button type="primary" @click="searchClear">Clear</el-button>
            </el-col>
        </el-col>
    </el-row>
    <el-row>
        <el-col>
            <el-table
                v-loading="loading"
                element-loading-background="rgba(255, 255, 255, 0.5)"
                :data="tableData"
                :default-sort="sort"
                @sort-change="handleSort"
                style="width: 100%">
                <el-table-column
                    prop="name"
                    label="Name"
                    sortable="custom">
                </el-table-column>
                <el-table-column
                    prop="price"
                    label="Price"
                    sortable="custom">
                </el-table-column>
                <el-table-column
                    prop="bedrooms"
                    label="Bedrooms"
                    sortable="custom">
                </el-table-column>
                <el-table-column
                    prop="bathrooms"
                    label="Bathrooms"
                    sortable="custom">
                </el-table-column>
                <el-table-column
                    prop="storeys"
                    label="Storeys"
                    sortable="custom">
                </el-table-column>
                <el-table-column
                    prop="garages"
                    label="Garages"
                    sortable="custom">
                </el-table-column>
            </el-table>
        </el-col>
    </el-row>

</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            tableData: [],
            sort: {
                prop: 'name',
                order: 'ascending'
            },
            searchFilters: {
                name: '',
                min_price: '',
                max_price: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages: '',
            },
            loading: true,
            timerId: 0
        }
    },
    mounted: function () {
        this.searchTable();
    },
    methods: {
        handleSort(dataSort) {
            this.sort.prop = dataSort.prop;
            this.sort.order = dataSort.order;
            this.searchTable();
        },
        handleInput(value) {
            if (!this.timerId) {
                this.timerId = setTimeout(() => {
                    this.timerId = 0;
                    this.searchTable();
                }, 1000);
            }
        },
        searchTable() {
            const that = this;
            const dataRequest = {...this.searchFilters};

            dataRequest.sort_column = that.sort.prop;
            if (that.sort.order === 'ascending') {
                dataRequest.sort_order = 'asc';
            } else if (that.sort.order === 'descending') {
                dataRequest.sort_order = 'desc';
            }

            this.loading = true;

            axios
                .get("table", {params: dataRequest})
                .then(response => {
                    that.tableData = response.data;
                    that.timerId = 0;
                    that.loading = false;
                })
                .catch(function (e) {
                    console.log(e.message)
                });
        },
        searchClear() {
            let result = {};

            for (let prop in this.searchFilters) {
                result[prop] = ''
            }

            this.searchFilters = result;
            this.searchTable();
        }
    },
    unmounted() {
        clearTimeout(this.timerId)
    }
}
</script>
