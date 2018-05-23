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
		user: {
			role: '',
			name: '',
			email: '',
			password: ''
		},
		emails: {}
	},
	watch: {
		'user.role': function() {
			if (this.user.role == 1) {
				this.getMahasiswa()
			} else if(this.user.role == 2) {
				this.getDosen()
			}
		},
		'user.email': function() {
			if (this.user.role == 1) {
				this.selectMahasiswa()
			} else if (this.user.role == 2) {
				this.selectDosen()
			}
		}
	},
	mounted() {
		$('#role').select2().on('change', () => {
            this.user.role = $('#role').val();
        });
	},
	methods: {
		selectMahasiswa() {
			this.user.name = ''
			axios.get(`/api/user/mahasiswa/${this.user.email}`)
			.then((response) => {
				this.user.name = response.data.nama
			})
			.catch((error) => {

			})
		},
		getMahasiswa() {
			this.emails = {}
			this.user.email = ''
			axios.get('/api/user/mahasiswa')
			.then((response) => {
				this.emails = response.data
				$('#email').select2().on('change', () => {
					this.user.email = $('#email').val();
				});
			})
			.catch ((error) => {

			})
		},
		getDosen() {
			this.emails = {}
			this.user.email = ''
			axios.get('/api/user/dosen')
			.then((response) => {
				this.emails = response.data
				$('#email').select2().on('change', () => {
					this.user.email = $('#email').val();
				});
			})
			.catch((error) => {

			})
		},
		selectDosen() {
			this.user.name = ''
			axios.get(`/api/user/dosen/${this.user.email}`)
			.then((response) => {
				this.user.name = response.data.nama
			})
			.catch((error) => {

			})
		}
	}
})