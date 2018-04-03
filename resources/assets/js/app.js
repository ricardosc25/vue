
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import axios from 'axios'
import VuejsDialog from "vuejs-dialog"
import toastr from "toastr"

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VuejsDialog);
Vue.component('idea', require('./components/Idea.vue'));

const user = new Vue({

		el: "#crud",

        data(){
            return {
                users: [],
                newUser: '',
                fillUser: {'id': '', 'nombre': ''},
                errors: []
            }
        },
        
        created: function(){
        	this.getUsers();
        },

        methods: {
        	getUsers: function(){
        		var urlUsers = 'users';
        		axios.get(urlUsers).then(response => {
        			this.users = response.data.users.data
        		});
        	},

        	crearUsuario: function(){
        		var url = 'users';
        		axios.post(url,{
        			nombre: this.newUser
        		}).then(response => {
        			this.getUsers();
        			this.newUser = '';
        			this.errors = [];
        			$('#CrearUsuario').modal('hide');
        			toastr.success('Usuario creado con exito')
        		}).catch(error =>{
        			this.errors = error.response.data
        		});
        	},

        	editarUsuario: function(user){
        		this.fillUser.id = user.id;
        		this.fillUser.nombre = user.nombre;
        		$('#edit').modal('show');
        	},

        	actualizarUsuario: function(fillUser){
        		var url = 'users/' + fillUser.id;
        		axios.put(url, this.fillUser).then(response => {
        			this.getUsers();
        			this.fillUser = {'id': '', 'nombre': ''};
        			this.errors = [];
        			$('#edit').modal('hide');
        			toastr.success('Se actualizaron los datos del usuario');
        		}).catch(error =>{
        			this.errors = error.response.data
        		});

        	},

        	eliminarUsuario: function(user){
    		let message = "Are you sure?";
    		let options = {
		    html: false, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
		    loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
		    reverse: false, // switch the button positions (left to right, and vise versa)
		    okText: 'Continue',
		    cancelText: 'Close',
		    animation: 'zoom', // Available: "zoom", "bounce", "fade"
		    type: 'basic', // coming soon: 'soft', 'hard'
		    verification: 'continue', // for hard confirm, user will be prompted to type this to enable the proceed button
		    verificationHelp: 'Type "[+:verification]" below to confirm', // Verification help text. [+:verification] will be matched with 'options.verification' (i.e 'Type "continue" below to confirm')
		    clicksCount: 3, // for soft confirm, user will be asked to click on "proceed" btn 3 times before actually proceeding
		    backdropClose: false // set to true to close the dialog when clicking outside of the dialog window, i.e. click landing on the mask 
		};

		this.$dialog.confirm(message, options)
		.then((dialog) => { //Ok
				 setTimeout(() => {
				 	//Eliminamos el usuario
				 	var url = 'users/' + user.id;
				 	axios.delete(url)
				 	.then(response => {
						 	this.getUsers();
						 	toastr.success('Usuario eliminado con exito')
					    })
				 	.catch(error => {
				 			toastr.error('No se pudo eliminar el usuario')
				 	}); 	

            	 	dialog.close();
        		}, 2500);
		         
		    })
		.catch(function () {//False
		        // This will be triggered when user clicks on cancel
		    });
        	}
        }

    
});
