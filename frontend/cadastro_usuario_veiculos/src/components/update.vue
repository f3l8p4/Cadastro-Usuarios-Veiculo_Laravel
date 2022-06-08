
<script>
    export default{
        data(){
            return{
                GetUser: 'http://127.0.0.1:8000/api/AlterarUser/',
            }
        },
        props:{
            usuario:{
                type: String,
            }
        },
        methods: {
            atualizar(){
                let config = {
                      Headers:{
                          'Content-Type': 'application/json',
                          'Accept':'application/json'
                      }
                }
                this.GetUser = 'http://127.0.0.1:8000/api/AlterarUser/'+this.usuario.id
                /*axios.put(this.GetUser).then( response =>{
                    nome = this.usuario.nome,
                    cpf = this.usuario.cpf,
                    telefone =  this.usuario.telefone,
                    email = this.usuario.email,
                    console.log(this.usuario)
                }).catch(
                    errors =>{console.log(errors)}      
                )*/console.log(this.usuario.nome)
            }
        },
    }
</script>