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
			{ title: 'NIM', field: 'nim' },
            { title: 'Nama Lengkap', field: 'nama' },
            { title: 'Telpon', field: 'no_tlpn' },
            { title: 'Jurusan', field: 'k_jurusan' },
            { title: 'Email', field: 'email' },
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
        isModalVisible: false,
        person: {
            name: '',
            nama: '',
            jurusan: {
                jurusan: ''
            },
            mahasiswa_semester: {},
            tgl_lahir: '',
            alamat: '',
            no_tlpn: '',
            email: ''
        }
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
        showModal(nim) {
            axios.get(`/api/mahasiswa/${nim}`)
            .then ((response) => {
                this.person = response.data
                this.isModalVisible = true;
            })
            .catch ((error) => {

            })
        },
        closeModal() {
            this.isModalVisible = false;
        },
		searchingData(value) {
			this.q = value
		},
		getData() {
			axios.get(`/api/mahasiswa?page=${this.data.current_page}&q=${this.q}&sort=${this.sort}&orders=${this.orders}`)
			.then((response) => {
				this.data = response.data
			})
			.catch ((error) => {

			})
		},
		remove(nim) {
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
					axios.delete(`/api/mahasiswa/${nim}`)
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