<!-- Modal -->
<div id="show-person{{ $pessoa->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informações da Pessoa</h4>
            </div>
            <div class="modal-body">
                <fieldset>
                    <legend>Dados Pessoais</legend>
                    <p>Nome: <strong>{{ $pessoa->nome }}</strong></p>
                    <p>Email: <strong>{{ empty($pessoa->email) ? "Sem email cadastrado" : $pessoa->email }}</strong></p>
                    <p>CPF: <strong>{{ $pessoa->cpf }}</strong></p>
                    <p>Data de Nascimento: <strong>{{ date('d/m/Y', strtotime($pessoa->data_nascimento)) }}</strong></p>
                    <p>Telefones: <strong>
                            @for($i = 1; $i <= count($pessoa->telefones); $i++)
                                {{ $pessoa->telefones[$i - 1]->numero }}
                                @if($i < count($pessoa->telefones))
                                    {{ "/ " }}
                                @endif
                            @endfor
                        </strong></p>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Endereço</legend>
                    <p>Rua: <strong>{{ $pessoa->endereco->rua }}</strong></p>
                    <p>Numero: <strong>{{ $pessoa->endereco->numero }}</strong></p>
                    <p>CEP: <strong>{{ $pessoa->endereco->cep }}</strong></p>
                    <p>Bairro: <strong>{{ $pessoa->endereco->bairro }}</strong></p>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Funções</legend>
                    @foreach($pessoa->funcoes as $funcao)
                        <p><strong>{{ $funcao->funcao }}</strong></p>
                    @endforeach
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>