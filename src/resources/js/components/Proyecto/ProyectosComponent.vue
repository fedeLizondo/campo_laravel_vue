<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="mr-auto mt-2 align-self-center card-title">Proyectos</div>
                    <div class="ml-auto">
                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addProyectoModal">
                            <i id="icon-add" class="fa fa-plus"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="addProyectoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                        :style="{display:display}"
                        >
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Agregar proyecto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <proyecto-form-component @new="addProyecto"></proyecto-form-component>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                </div>
            </div>
            <div class="card-body" style="max-height:65vh; overflow-y: scroll">
                <proyecto-component 
                    v-for="(proyecto, index) in proyectos"
                    :key="proyecto.id"
                    :proyecto="proyecto"
                    @delete="removeProyecto(index)">
                </proyecto-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                display:'none',
                proyectos:[]
            }
        },
        methods: {
            addProyecto(proyecto){
                this.proyectos.push(proyecto);
                this.display = 'none';
                $('#addProyectoModal').modal('hide')
            },
            removeProyecto(index){
                this.proyectos.splice(index,1);
            }
        },
        mounted() {
            //axios.get('/proyecto').then((response)=>{
                //this.proyectos = response.data;
            //});
        }
    }
</script>