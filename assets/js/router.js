import { createWebHistory, createRouter } from "vue-router";
import Home from "./components/Home.vue";
import Search from "./components/Search.vue";

const routes = [
  {
    path: "/",
    name: "Inicio",
    component: Home,
  },
  {
    path: "/search",
    name: "Buscar",
    component: Search,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;