<template>
    <el-container>
        <el-header></el-header>
        <el-main>
            <TableHouses></TableHouses>
        </el-main>
    </el-container>
</template>

<script>
import TableHouses from './components/TableHouses'

export default {
    components: {
        TableHouses
    },
    data() {
        return {
            visible: false,
        }
    }
}
</script>
