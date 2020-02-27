<template>
    <form action="" v-on:submit.prevent="newActor">

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" placeholder="Ingrese nombre" v-model="nombre">
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" rows="3" v-model="descripcion" placeholder="Ingrese una descripción"></textarea>
        </div>
        
        <div class="d-flex">
            <button type="submit" class="ml-auto btn btn-success">Agregar</button>
            <button type="button" class="ml-1 btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
    </form>

</template>

<script>
    export default {
        data(){
            return{
                nombre:'',
                descripcion:''
            }
        },
        methods:{
            newActor: function(){
                const params = {
                    nombre : this.nombre,
                    descripcion : this.descripcion
                }
                axios.post('/actors',params).then((response) =>{
                    const actor = response.data;
                    this.$emit("new",actor);
                }); 
                    
                
                this.nombre = '';
                this.descripcion = '';
                
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>