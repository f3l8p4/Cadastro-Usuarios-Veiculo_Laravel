export default{
    getUser({commit},context){
        return this.$axios.get('VisualizarUsuario').then(res => {
            commit('STORE',res)
            console.log(res)
        })},
        CreateUser({ commit, dispatch },params) {
            const UserData = params;
            commit("setData",{UserData})
            return this.$axios.post('Usuario',params)
        },
        deleteUser({commit,dispatch},id){
            return this.$axios.delete('excluirUsuario/'+id)
        },
        updateUser({commit, dispatch}, id,param){
            const usuario = param;
            commit("setData",{usuario})
            return this.$axios.put('AlterarUser/'+id,param).then(res=>{
                console.log(res)
            }).catch(error=>{{usuario}})
        }
}