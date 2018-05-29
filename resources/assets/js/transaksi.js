import Vue from 'vue'
import VueQRCodeComponent from 'vue-qrcode-component'
Vue.component('qr-code', VueQRCodeComponent)

var app = new Vue({
    el: '#dw'
})