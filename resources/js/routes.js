import { createWebHistory, createRouter } from "vue-router";
import TableHouses from './components/TableHouses.vue';

const routes = [
    {
        name: 'houses',
        path: '/',
        component: TableHouses
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
