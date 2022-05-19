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
<form action="{{route('criar_usuario')}}" method="post">
    @csrf
    <fieldset>
        <legend>Cadastro de usuários</legend>
        <div class="forms">
            <div>
                <label for="">Nome:</label>
                <input class="inputs" name="nome" type="text" id="nome">
            </div>
            <div>
                <label for="">CPF:</label>
                <input class="inputs" name="cpf" type="text" id="cpf">
            </div>
            <div>
                <label for="">email:</label>
                <input class="inputs" name="email" type="text" id="email">
            </div>
            <div>
                <label for="">telefone:</label>
                <input class="inputs" name="telefone" type="text" id="telefone">
            </div>

            <input  type="submit" value="Salvar Informações">
        </div>
    </fieldset>
</form>
