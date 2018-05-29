import Vue from 'vue'
import VueQrcodeReader from 'vue-qrcode-reader'

Vue.use(VueQrcodeReader)

var app = new Vue({
	el: '#dw',
	data: {
		
	},
	methods: {
		onDecode (content) {
			console.log(content)
		},
	
		onLocate (points) {
			console.log(content)
		}
	}
})