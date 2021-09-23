/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

new Vue({
	el: '#login',
	data(){
		return {
			showing: false,
			show: `<i class="fas fa-fw fa-eye"></i>`,
			hide: `<i class="fas fa-low-vision"></i>`
		}
	},

	methods: {
		historyBack(){
			window.history.back()
		},

		showPassword(){
			const password = document.querySelector('#password')
			if(password.type === "password"){
				password.type = "text"
				this.showing = true
			}else{
				password.type = "password"
				this.showing = false
			}
		}
	}
})


new Vue({
	el: '#sending',
	data(){
		return {
			loading: null,
			success: false,
			message: ''
		}
	},

	methods: {
		SendingToDokter(){
			this.loading = true
			const consult_id = document.querySelector('input[name="consult_id"]').value
			const message = document.querySelector('input[name="message"]').value
			const status = document.querySelector('input[name="status"]').value
			console.log(consult_id)

			axios.post('/consult/update', {
				consult_id: consult_id,
				message: message,
				status: status
			})
			.then(res => {
				if(res.status === 200){
					this.loading = false
					this.success = true
					this.message = res.data.message
				}
			})
			.catch(err => {
				console.log(err.response)
			})
		}
	}
})