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
		columns: [
			{ title: '#', field: 'id' },
            { title: 'Nama Lengkap', field: 'nama' },
            { title: 'Email', field: 'email' },
            { title: 'Role', field: 'role' },
			{ title: 'Action', filed: 'action' }
		],
		data: {
			total: 0,
			per_page: 2,
			from: 1,
			to: 0,
			current_page: 1
		},
		q: '',
		sort: 'created_at',
        orders: 'desc',
	},
	watch: {
		q() {
			this.getData()
		},
		orders() {
			this.getData()
		}
	},
	mounted() {
		this.getData()
	},
	methods: {
		searchingData(value) {
			this.q = value
		},
		getData() {
			axios.get(`/api/user?page=${this.data.current_page}&q=${this.q}&sort=${this.sort}&orders=${this.orders}`)
			.then((response) => {
				this.data = response.data
			})
			.catch ((error) => {

			})
		},
		remove(id) {
			this.$swal({
				title: 'Kamu Yakin?',
				text: 'Kamu Tidak Dapat Mengembalikan Tidakan Ini!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Iya, Lanjutkan!',
				cancelButtonText: 'Tidak, Batalkan!',
				showCloseButton: true,
				showLoaderOnConfirm: true,
				preConfirm: () => {
					return new Promise((resolve) => {
						setTimeout(() => {
							resolve()
						}, 1000)
					})
				},
				allowOutsideClick: () => !this.$swal.isLoading()
			})
			.then((result) => {
				if (result.value) {
					axios.delete(`/api/user/${id}`)
					.then((response) => {
						this.getData()
					})
					.catch ((error) => {

					})
				}
			})
		} 
	}
})