<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="mr-auto mt-2 align-self-center card-title">Actores</div>
                    <div class="ml-auto">
                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addActorModal">
                            <i id="icon-add" class="fa fa-plus"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="addActorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                        :style="{display:display}"
                        >
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Actor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <actor-form-component @new="addActor"></actor-form-component>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                </div>
            </div>
            <div class="card-body" style="max-height:65vh; overflow-y: scroll">
                <actor-row-component 
                    v-for="(actor, index) in actors"
                    :key="actor.id"
                    :actor="actor"
                    @delete="removeActor(index)">
                </actor-row-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                display:'none',
                actors:[]
            }
        },
        methods: {
            addActor(actor){
                this.actors.push(actor);
                this.display = 'none';
                $('#addActorModal').modal('hide')
            },
            removeActor(index){
                this.actors.splice(index,1);
            }
        },
        mounted() {
            axios.get('/actors').then((response)=>{
                this.actors = response.data;
            });
        }
    }
</script>