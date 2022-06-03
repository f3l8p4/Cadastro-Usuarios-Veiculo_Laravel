
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
              <tr v-for="u in usuario" :key="u.id">
                  <td>{{u.id}}</td>
                  <td>{{u.nome}}</td>
                  <td>{{u.cpf}}</td>
                  <td>{{u.telefone}}</td>
                  <td>{{u.email}}</td>
              </tr>
          </tbody>
          <button  type="button" class="btn btn-dark mt-3" data-toggle="modal" data-target="#exampleModal">
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
                        
                        <Alert class="sucess" v-if="Status == 'true'" titulo="Usuário incluído com sucesso" ></Alert>
                        <Alert class="danger" v-if="Status == 'false' " titulo="Operação invalida" ></Alert>

                      <div class="form-group">
                          <label for="">Nome</label>
                          <input type="text" v-model="nome" class="form-control">
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
  import Alert from './Alert.vue'
  
  export default {
      
      data(){
          return{
              GetUsers: 'http://127.0.0.1:8000/api/VisualizarUsuario',
              url: 'http://127.0.0.1:8000/api/Usuario',
              nome : '',
              cpf : '',
              telefone : '', 
              email : '',
              Status:'',
              usuario:[]
          }
      },
      methods: {
              salvar(){
                  let user = {
                        nome: this.nome,
                        cpf : this.cpf,
                        telefone: this.telefone,
                        email: this.email
                  }
                  let config = {
                      Headers:{
                          'Content-Type': 'application/json',
                          'Accept':'application/json'
                      }
                  }
                  axios.post(this.url,user,config).then(response=>{ 
                      console.log(response) 
                    }
                  ).catch(
                      errors=>{console.log(errors)}
                  )
              },
              recuperarDados(){
                    axios.get(this.GetUsers).then(response=>{
                        this.usuario = response.data
                        console.log(this.usuario)
                    }
                    )
              }
          },
          mounted() {
              this.recuperarDados();
          },
          components:{
              Alert
          }
  }
</script>
