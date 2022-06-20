export default{
    getUser({commit},context){
        return this.$axios.get('http://127.0.0.1:8000/api/VisualizarUsuario').then(res => {
            commit('STORE',res)
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
        updateUser({commit, dispatch}, id,param){
            const usuario = param;
            commit("setData",{usuario})
            return this.$axios.put('http://127.0.0.1:8000/api/AlterarUser/'+id,param).then(res=>{
                console.log(res)
            }).catch(error=>{{usuario}})
        }
}