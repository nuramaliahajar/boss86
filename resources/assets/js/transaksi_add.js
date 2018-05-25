import Vue from 'vue'
import axios from 'axios'

var app = new Vue({
	el: '#dw',
	data: {
        matkul: [],
        k_jurusan: '',
        nidn: '',
        kode_mk: '',
        kode_kls: '',
        semester_id: ''
	},
	watch: {
		nidn() {
			this.getMatkul()
		}
    },
    mounted() {
		$('#k_jurusan').select2().on('change', () => {
            this.k_jurusan = $('#k_jurusan').val();
        });
        $('#nidn').select2().on('change', () => {
            this.nidn = $('#nidn').val();
        });
        $('#kode_mk').select2().on('change', () => {
            this.kode_mk = $('#kode_mk').val();
        });
        $('#kode_kls').select2().on('change', () => {
            this.kode_kls = $('#kode_kls').val();
        });
        $('#semester_id').select2().on('change', () => {
            this.semester_id = $('#semester_id').val();
        });
	},
	methods: {
		 getMatkul() {
            this.matkul = []
            axios.get(`/api/transaksi/matkul/${this.nidn}`)
            .then((response) => {
                this.matkul = response.data
            })
            .catch ((error) => {

            })
         }
	}
})