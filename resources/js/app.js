import './bootstrap';
import Vue from 'vue';
import DataGridComponent from './components/DataGridComponent.vue';

Vue.component('datagrid', DataGridComponent);

const app = new Vue({
  el: '#app',
});
