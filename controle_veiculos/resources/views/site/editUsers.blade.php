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
<form action="{{route('edit',['id'=>$users->id])}}" method="post">
    @csrf
    <fieldset>
        <legend>Atualização de registros</legend>
        <div class="forms">
            <div>
                <label for="">Nome:</label>
                <input class="inputs" name="nome" value="{{$users->nome}}" type="text" id="nome">
            </div>
            <div>
                <label for="">CPF:</label>
                <input class="inputs" name="cpf" value="{{$users->cpf}}" type="text" id="cpf">
            </div>
            <div>
                <label for="">email:</label>
                <input class="inputs" name="email" value="{{$users->email}}" type="text" id="email">
            </div>
            <div>
                <label for="">telefone:</label>
                <input class="inputs" name="telefone" value="{{$users->telefone}}" type="text" id="telefone">
            </div>

            <input  type="submit" value="Atualizar Informações">
        </div>
    </fieldset>