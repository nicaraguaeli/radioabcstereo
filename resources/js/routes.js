import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
const Foo = { template: '<table class="table"><thead><th>Hola</th></thead></table' }

export default new VueRouter({
    
   routes: [
        {
            path: '/foo',
            name: '/foo',
            component: Foo
        }

    ]
});
