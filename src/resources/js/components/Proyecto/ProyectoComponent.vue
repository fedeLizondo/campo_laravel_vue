<template>
    <div id="ProyectoRowComponent" class="card mb-1">
        <div class="card-body">
            <div class="cart-title">
                    {{proyecto.nombre}}
                    <button type="button" class="close ml-1" aria-label="Close" style="color:#e74c3c" v-on:click="deleteProyecto">
                        <i class="fas fa-times"></i>
                    </button>
                    <button v-if="!editMode" id="editProyecto" type="button" class="close" aria-label="Update" style="color:#e67e22" v-on:click="toggleUpdate">
                        <i class="fas fa-edit"></i>
                    </button>
                    
            </div>

            <div v-if="editMode"> 
                <form action="" v-on:submit.prevent="updateProyecto">
                    <div class="form-group">
                        <textarea class="form-control" id="descripcion" rows="3" v-model="proyecto.descripcion" placeholder="Ingrese una descripción"></textarea>
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="ml-auto btn btn-success">Modificar</button>
                        <button type="button" class="ml-1 btn btn-danger" v-on:click="toggleUpdate">Cancelar</button>
                    </div>
                </form>
            </div>
            <p v-else class="d-none d-md-block d-lg-block card-text">{{proyecto.descripcion}}</p>
        </div>
    </div>
</template>

<script>
export default {
    props:["proyecto"],
    data(){
        return {
            editMode:false
        };
    },
    methods:{
        deleteProyecto(){
            //axios.delete('/actors/' + this.actor.id).then((response)=>{
                this.$emit('delete');
            //});
        },
        toggleUpdate(){
            this.editMode = !this.editMode;
        },
        updateProyecto(){
            const params = {
                descripcion : this.proyecto.descripcion
            };
            console.log(params.descripcion);
           // axios.put('/actors/'+this.actor.id,params).then((response)=>{
                this.$emit('update');
                this.editMode = false;
            //})
        }
    }
}
</script>

<style>
</style>