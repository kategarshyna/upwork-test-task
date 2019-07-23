import Vue from 'vue'
import App from './components/App.vue'

import '../css/app.css';

new Vue({
    render: h => h(App),
}).$mount('#app');
