export default{
    getUser(context){
        return this.$axios.get('http://127.0.0.1:8000/api/VisualizarUsuario').then(res => {
            context.commit('STORE',res)
            console.log(res)
        })},
        CriarUsuario({ commit, dispatch },params) {
            const UserData = params;
            commit("setData",{UserData})
            return this.$axios.post('http://127.0.0.1:8000/api/Usuario',params)
        },
        deleteUser({commit,dispatch},id){
            return this.$axios.delete('http://127.0.0.1:8000/api/excluirUsuario/'+id)
        },
        updateUser({commit, dispatch}, id,params){
            const UserData = params;
            commit("setData",{UserData})
            return this.$axios.put('http://127.0.0.1:8000/api/AlterarUser/'+id,params).then(res=>{console.log(UserData)}).catch(erro=>console.log(params))
        }
}