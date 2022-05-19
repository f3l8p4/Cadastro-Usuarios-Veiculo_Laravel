<style>
    .forms{
        padding: 10px;
        margin: 5px;
    };
    .inputs{
        padding: 5px;
        border-radius: 10px;
    }
</style>    
<form action="{{route('edit_veiculos',['id'=>$veiculo->id])}}" method="post">
    @csrf
    <fieldset>
        <legend>Atualização de registros</legend>
        <div class="forms">
            <div>
                <label for="">Placa:</label>
                <input class="inputs" name="placa" value="{{$veiculo->placa}}" type="text" id="placa">
            </div>
            <div>
                <label for="">modelo</label>
                <input class="inputs" name="modelo" value="{{$veiculo->modelo}}" type="text" id="modelo">
            </div>
            <div>
                <label for="">ano:</label>
                <input class="inputs" name="ano" value="{{$veiculo->ano}}" type="text" id="ano">
            </div>
            <div>
                <label for="">marca:</label>
                <input class="inputs" name="marca" value="{{$veiculo->marca}}" type="text" id="marca">
            </div>

            <div>
                <label for="">Cor:</label>
                <input class="inputs" name="cor" value="{{$veiculo->cor}}" type="text" id="cor">
            </div>

            <input  type="submit" value="Atualizar Informações">
        </div>
    </fieldset>