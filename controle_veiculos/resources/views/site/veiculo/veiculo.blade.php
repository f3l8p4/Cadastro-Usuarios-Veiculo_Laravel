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
<form action="{{route('criar_veiculo')}}" method="post">
    @csrf
    <fieldset>
        <legend>Cadastro de veiculo</legend>
        <div class="forms">

            <div>
                <label for="">Placa do veiculo:</label>
                <input class="inputs" name="placa" type="text" id="placa">
            </div>
            <div>
                <label for="">Cor do veiculo</label>
                <input class="inputs" name="cor" type="text" id="cor">
            </div>
            <div>
                <label for="">ano do veiculo</label>
                <input class="inputs" name="ano" type="text" id="ano">
            </div>
            <div>
                <label for="">modelo do veiculo:</label>
                <input class="inputs" name="modelo" type="text" id="veiculo">
            </div>
            <div>
                <label for="">marca do veiculo:</label>
                <input class="inputs" name="marca" type="text" id="marca">
            </div>

            <br>
            <input  type="submit" value="Salvar Informações do veiculo">
        </div>
    </fieldset>
</form>