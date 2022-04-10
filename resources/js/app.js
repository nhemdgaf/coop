import Vue from 'vue';
import vuetify from './plugins/vuetify';
import router from './router';
import App from './components/App';

require('./bootstrap');

Vue.use(vuetify)

const app = new Vue({
    el: '#app',
    vuetify,
    components:{
        App
    },
    router,
})