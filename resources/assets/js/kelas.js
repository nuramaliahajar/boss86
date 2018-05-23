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
		kode_kls: '',
		kelas: '',
		type: '',
		columns: [
			{ title: '#', field: 'id' },
			{ title: 'Kode Kelas', field: 'kode_kls' },
			{ title: 'Kelas', field: 'kelas' },
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
		title: 'Tambah Data'
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
			if (this.type === '') {
				axios.post('/api/kelas', {
					kode_kls: this.kode_kls,
					jurusan: this.kelas
				})
				.then((response) => {
					setTimeout(() => {
						this.button = false
						this.getData()
						this.kelas = ''
						this.kode_kls = ''
						this.type = ''
					}, 1000)
				})
				.catch ((error) => {

				})
			} else {
				axios.post('/api/kelas/update', {
					kode_kls: this.kode_kls,
					kelas: this.kelas
				})
				.then((response) => {
					setTimeout(() => {
						this.button = false
						this.getData()
						this.kelas = ''
						this.kode_kls = ''
						this.type = ''
						this.title = 'Tambah Data'
					}, 1000)
				})
				.catch ((error) => {

				})
			}
			
		},
		getData() {
			axios.get(`/api/kelas?page=${this.data.current_page}&q=${this.q}&sort=${this.sort}&orders=${this.orders}`)
			.then((response) => {
				this.data = response.data
			})
			.catch ((error) => {

			})
		},
		edit(kode_kls) {
			axios.get(`/api/kelas/${kode_kls}`)
			.then((response) => {
				this.title = 'Edit Data'
				this.type = 'update'
				this.kode_kls = response.data.kode_kls
				this.kelas = response.data.kelas
			})
			.catch((error) => {

			})
		},
		remove(kode_kls) {
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
					axios.delete(`/api/kelas/${kode_kls}`)
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