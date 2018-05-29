import Vue from 'vue'
import VueQrcodeReader from 'vue-qrcode-reader'

Vue.use(VueQrcodeReader)

var app = new Vue({
	el: '#dw',
	data: {
		barcode: '',
		paused: false
	},
	methods: {
		onDecode (content) {
			console.log(content)
			this.barcode = content
			this.paused = true
		},
	
		onLocate (points) {
			console.log(points)
		}
	}
})