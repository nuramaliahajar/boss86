import Vue from 'vue'
import { QrcodeReader } from 'vue-qrcode-reader'
import InitHandler from './mixins/InitHandler'


var app = new Vue({
	el: '#dw',
	components: { QrcodeReader },
	mixins: [ InitHandler ],
	data: {
		barcode: '',
		paused: false
	},
	methods: {
		onDecode (content) {
			console.log(content)
			this.barcode = content
			this.paused = true
		}
	}
})