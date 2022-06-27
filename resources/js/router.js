import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './views/Home'
import List from './views/List'
import List2 from './views/List2'
import Create from './views/create'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/list',
            name: 'list',
            component: List
        },
        {
            path: '/list2',
            name: 'list2',
            component: List2
        },
        {
            path: '/create',
            name: 'create',
            component: Create
        }
    ]
})

export default router;
