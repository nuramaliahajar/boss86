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
		kode_mk: '',
        nama: '',
        nidn: '',
        sks: '',
		columns: [
			{ title: '#', field: 'id' },
			{ title: 'Kode MK', field: 'kode_mk' },
            { title: 'Mata Kuliah', field: 'nama' },
            { title: 'Dosen', field: 'dosen' },
            { title: 'SKS', field: 'sks' },
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
        dosen: []
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
        this.getDosen()
	},
	methods: {
		searchingData(value) {
			this.q = value
        },
        getDosen() {
            this.dosen = []
            axios.get('/api/matkul/dosen')
            .then((response) => {
                this.dosen = response.data
            })
            .catch ((error) => {

            })
        },
		sendData() {
			this.button = true
			axios.post('/api/matkul', {
                kode_mk: this.kode_mk,
                nama: this.nama,
                nidn: this.nidn,
                sks: this.sks
            })
            .then((response) => {
                setTimeout(() => {
                    this.button = false
                    this.getData()
                    this.kode_mk = ''
                    this.nama = ''
                    this.nidn = ''
                    this.sks = ''
                }, 1000)
            })
            .catch ((error) => {

            })
		},
		getData() {
			axios.get(`/api/matkul?page=${this.data.current_page}&q=${this.q}&sort=${this.sort}&orders=${this.orders}`)
			.then((response) => {
				this.data = response.data
			})
			.catch ((error) => {

			})
		},
		remove(kode_mk) {
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
					axios.delete(`/api/matkul/${kode_mk}`)
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