import './bootstrap';

import Alpine from 'alpinejs';

import Vue from 'vue'
import Comments from './components/Component/Comments.vue'

window.Alpine = Alpine;

Alpine.start();

// Vue.component('comments', require('./components/Component/Comments.vue'));

const app = new Vue({
  el: '#app',
  components: {
    Comments
  }
})