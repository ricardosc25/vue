<template>
    <div>
     <form v-on:submit.prevent="crearIdea">
          <div class="form-group">
            <label for="idea">Nueva idea</label>
            <input type="text" class="form-control" name='idea' placeholder="Example input" v-model="newIdea">
          </div>
          <div class="form-group">
            <button type='submit' class="btn btn-primary" v-on:submit.prevent="crearIdea">Guardar</button>
          </div>
        </form>
           
        <ul class="list-unstyled">
          <li v-for="idea in ideas">
            <p>
                <small class="text-muted">
                    <em>{{ since(idea.created_at) }}</em>
                </small>
                {{ idea.descripcion }}
            </p>
          </li>
        </ul>
    </div>
            
</template>

<script>
    
    import axios  from 'axios' //Permite interactuar con AJAX
    import toastr from 'toastr' //Alertas con mejores disenos
    import moment from 'moment' //Formatear fechas

    moment.lang('es') //Colocamos las fechas en espanol.

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
            since: function(d){
                return moment(d).fromNow(); //Retornamos la fecha desde ahora
            },
            getIdeas: function(){
                var urlIdeas = 'mis-ideas';
                axios.get(urlIdeas).then(response => {
                    this.ideas = response.data
                });
            },
            crearIdea: function(){
                var url = 'guardar-idea';
                axios.post(url,{
                    descripcion: this.newIdea
                }).then(response =>{
                    this.getIdeas();
                    this.newIdea = '';
                    toastr.success('Idea creada')
                }).catch(error =>{
                    toastr.error('Error al guardar');
                });
            }
        }
    }
</script>
