<form action="{{ route('excluirVeiculo',['id'=>$veiculo->id]) }}" method="post">
@csrf
            <label>Deseja Excluir o veiculo com placa {{$veiculo->placa}}</label>
            <input type="submit" value="Excluir">
</form>