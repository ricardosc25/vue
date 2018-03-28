<template>
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>Mis ideas</h1>
            <ul class="list-unstyled">
              <li v-for="idea in ideas">
                <p>
                    <small class="text-muted">
                        <em>{{ idea.created_at }}</em>
                    </small>
                    {{ idea.descripcion }}
                </p>
              </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data(){
            return {
                ideas: [],
            }
        },

        created: function(){
            this.getIdeas();
        },

        methods:{
            getIdeas: function(){
                var urlIdeas = 'mis-ideas';
                axios.get(urlIdeas).then(response => {
                    this.ideas = response.data
                });
            }
        }
    }
</script>
