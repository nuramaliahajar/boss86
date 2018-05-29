import Vue from 'vue'
import VueQrcodeReader from 'vue-qrcode-reader'

Vue.use(VueQrcodeReader)

var app = new Vue({
	el: '#dw',
	data: {
		barcode: ''
	},
	methods: {
		onDecode (content) {
			console.log(content)
			this.barcode = content
		},
	
		onLocate (points) {
			console.log(content)
		}
	}
})