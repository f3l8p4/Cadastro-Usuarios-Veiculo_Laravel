<template>
    <div class="border w-75 ml-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nome</th>
                    <th scope="col">cpf</th>
                    <th scope="col">telefone</th>
                    <th scope="col">email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td v-text="msg"></td>
                    <td>cpf</td>
                    <td>telefone</td>
                    <td>email</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                Adicionar usuário
            </button>

            <!--Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Adicionar Usuário</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                        <Alert/>

                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" v-model="nome" class="form-control">
                            {{nome}}
                        </div>

                        
                        <div class="form-group">
                            <label for="">cpf</label>
                            <input type="text" v-model="cpf" class="form-control">
                        </div>

                        
                        <div class="form-group">
                            <label for="">telefone</label>
                            <input type="text" v-model="telefone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">email</label>
                            <input type="text" v-model="email" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                      <button  @click="salvar()" class="btn btn-success">Adicionar</button>
                    </div>
                  </div>
                </div>
            </div>
            <!--Modal-->
        </table>
    </div>
      
      <!-- Modal -->
     
</template>

<script>
    import Vue from 'vue'
    import Alert from './Alert.vue'
    let Alert = vue.Component('Alert')
    export default {
        data(){
            return{
                url: 'http://127.0.0.1:8000/api/Usuario',
                nome : '',
                cpf : '',
                telefone : '', 
                email : ''
            }
        },
        methods: {
                salvar(){
                    console.log(this.nome)
                   let formData = new FormData()
                    formData.append('nome',this.nome)
                    formData.append('cpf',this.cpf)
                    formData.append('telefone',this.telefone)
                    formData.append('email',this.email)

                    let config = {
                        Headers:{
                            'Content-Type': 'multipart/form-data',
                            'Accept':'aplication/json'
                        }
                    }
                    axios.post(this.url,formData,config).then(
                        response=>{ console.log(response) }
                    ).catch(
                        errors=>{console.log(errors)}
                    )
                }
            },
        components:{
            Alert
        }
    }
</script>
