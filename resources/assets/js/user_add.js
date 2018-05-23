import Vue from 'vue'
import axios from 'axios'
import VueSweetalert2 from 'vue-sweetalert2'
import DataTable from './components/DataTable.vue'
import Pagination from './components/Pagination.vue'
import ModalTab from './components/ModalTab.vue'

Vue.component('data-table', DataTable)
Vue.component('pagination', Pagination)
Vue.use(VueSweetalert2)
Vue.component('modal-tab', ModalTab)

var app = new Vue({
	el: '#dw',
	data: {
		role: ''
	}
})