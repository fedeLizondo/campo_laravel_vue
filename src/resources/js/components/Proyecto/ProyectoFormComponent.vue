<template>
    <form action="" v-on:submit.prevent="newProyecto">
        <div class="form-group">
            <input type="text" class="form-control" id="name" placeholder="Ingrese nombre del proyecto" v-model="nombre" lang="es" required>
        </div>

        Agregar usuario al proyecto:
        <form action="" v-on:submit.prevent="addPermiso" class="mb-3">
            <div class="input-group">
                
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese email" v-model="permiso.email">

                <div class="input-group-append">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" id="checkBoxIsAdmin" v-model="permiso.isAdmin">
                        <label class="form-check-label ml-1" for="checkBoxIsAdmin">Admin</label>
                    </div>
                </div>

                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-success">
                        <i id="icon-add" class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </form>
        Lista de usuarios:
        <ul class="list-group" style="max-height:40vh; overflow-y: scroll">
            <li class="list-group-item d-flex" v-for="(p,index) in permisos" :key="p.email">
                <div class="ml-auto">{{p.email}}</div> 
                <div class="ml-auto mr-1">
                    <input type="checkbox" aria-label="Checkbox for following text input" id="checkBoxIsAdmin" v-model="p.isAdmin">
                    <label class="form-check-label" for="checkBoxIsAdmin"> Admin </label>
                </div>
                <button type="button" class="close ml-2" aria-label="Close" style="color:#e74c3c" v-on:click="deletePermiso(index)">
                        <i class="fas fa-times"></i>
                </button>
            </li>
        </ul>

        

        <div class="d-flex mt-3">
            <button type="submit" class="ml-auto btn btn-success">Crear Proyecto</button>
            <button type="button" class="ml-1 btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
    </form>

</template>

<script>
    export default {
        data(){
            return{
                nombre:'',
                permiso:{
                    email: '',
                    isAdmin: false
                },
                permisos:[{
                    email: 'are@loco.com',
                    isAdmin: true
                }]
            }
        },
        methods:{
            addPermiso: function(){
                const permiso = {
                    email : this.permiso.email,
                    isAdmin : this.permiso.isAdmin
                }

                if( this.permiso.email.trim() && !this.permisos.some(element => element.email === this.permiso.email.trim())){
                    this.permisos.push(permiso);             
                    this.permiso.email = ''
                    this.permiso.isAdmin = false;   
                }     
            },
            deletePermiso: function(index) {
                this.permisos.splice(index,1);
            },
            newProyecto: function(){
                const params = {
                    nombre : this.permiso.nombre,
                }
                const proyecto = {
                    id : Math.floor(Math.random() * 1000),
                    nombre : this.nombre,
                    permisos: this.permisos 
                }
                
                //axios.post('/proyectos',params).then((response) =>{
                    //const proyecto = response.data;
                    this.$emit("new",proyecto);
                //});     
                
                this.nombre = '';
                
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>