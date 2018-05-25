import Vue from 'vue'
import axios from 'axios'

var app = new Vue({
	el: '#dw',
	data: {
        matkul: [],
        nidn: ''
	},
	watch: {
		nidn() {
			this.getMatkul()
		}
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