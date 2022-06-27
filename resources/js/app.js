import Vue from 'vue'
import router from './router'
import App from './App.vue'
import Element from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(Element)


const app = new Vue({
    el: '#app',
    components: { App },
    router,
})


/* const app = new Vue({
    el: '#app',
    components: {
        App
    },
    data: {
        msg : '호호호호'
    },
    created() {
        console.log('a');
    }
})

const app2 = new Vue({
    el: '#app2',
    components: {
        App2
    }
}) */

