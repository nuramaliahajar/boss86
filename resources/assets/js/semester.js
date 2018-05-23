import Vue from 'vue'
import axios from 'axios'
import VueSweetalert2 from 'vue-sweetalert2'
import DataTable from './components/DataTable.vue'
import Pagination from './components/Pagination.vue'

Vue.component('data-table', DataTable)
Vue.component('pagination', Pagination)
Vue.use(VueSweetalert2)

var app = new Vue({
	el: '#dw',
	data: {
		id_semester: '',
		semester: '',
		columns: [
			{ title: '#', field: 'id' },
			{ title: 'Semester', field: 'semester' },
			{ title: 'Action', filed: 'action' }
		],
		data: {
			total: 0,
			per_page: 2,
			from: 1,
			to: 0,
			current_page: 1
		},
		button: false,
		q: '',
		sort: 'created_at',
		orders: 'desc',
		title: 'Tambah Data',
		buttonTitle: 'Simpan'
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
		sendData() {
			this.button = true
			if (this.id_semester === '') {
				axios.post('/api/semester', {
					semester: this.semester
				})
				.then((response) => {
					setTimeout(() => {
						this.button = false
						this.getData()
						this.semester = ''
						this.buttonTitle = 'Simpan'
					}, 1000)
				})
				.catch ((error) => {

				})
			} else {
				axios.post('/api/semester/update', {
					id: this.id_semester,
					semester: this.semester
				})
				.then((response) => {
					setTimeout(() => {
						this.button = false
						this.getData()
						this.id_semester = ''
						this.semester = ''
						this.title = 'Tambah Data'
						this.buttonTitle = Simpan
					}, 1000)
				})
				.catch ((error) => {

				})
			}
			
		},
		getData() {
			axios.get(`/api/semester?page=${this.data.current_page}&q=${this.q}&sort=${this.sort}&orders=${this.orders}`)
			.then((response) => {
				this.data = response.data
			})
			.catch ((error) => {

			})
		},
		edit(id) {
			axios.get(`/api/semester/${id}`)
			.then((response) => {
				this.title = 'Edit Data'
				this.buttonTitle = 'Edit'
				this.id_semester = response.data.id
				this.semester = response.data.semester
			})
			.catch((error) => {

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
					axios.delete(`/api/semester/${id}`)
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