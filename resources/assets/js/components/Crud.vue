<template>
            
</template>

<script>
	
	import axios from 'axios'

    export default {
        data(){
            return {
                users: []
            }
        },

        el: "#crud",
        
        created: function(){
        	this.getUsers();
        },

        methods: {
        	getUsers: function(){
        		var urlUsers = 'users';
        		axios.get(urlUsers).then(reponse => {
        			this.users = response.data
        		});
        	}
        }

    }

</script>