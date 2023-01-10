import { createWebHistory, createRouter } from "vue-router";
import List from "./components/Users/List.vue";
import Form from "./components/Users/Form.vue";
import PositionsList from "./components/Position/List.vue";

const routes = [
    {
        path: '/',
        name: 'Home',
        component: List
    },
    {
        path: "/users/create",
        name: 'users-create',
        component: Form,
    },
    {
        path: "/positions",
        name: 'positions',
        component: PositionsList,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router