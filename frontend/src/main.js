import Vue from 'vue';
import App from './App.vue';
import store from './store';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import routes from './routes';

Vue.config.productionTip = false;
Vue.use(BootstrapVue);

new Vue({
  store,
  router: routes,
  render: h => h(App),
}).$mount('#app')
