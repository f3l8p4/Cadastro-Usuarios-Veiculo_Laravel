<form action="{{ route('excluirUsuario',['id'=>$usuario->id]) }}" method="post">
@csrf
            <label>Deseja Excluir o {{$usuario->nome}}</label>
            <input type="submit" value="Excluir">
            

</form>