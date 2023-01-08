@extends('admin.index')

@section('admin-content')
<form action="/admin/motorista/update" method="POST">
    @csrf
    <div class="modal-body">
        <input type="number" value="{{ $motorista->id }}" name="id" class="form-control" style="display: none;" id="id" placeholder="id">
        <div class="form-group">
            <label for="nome_motorista">Nome Completo</label>
            <input name="nome_motorista" value="{{ $motorista->nome_motorista }}" type="text" class="form-control" id="nome_motorista" placeholder="ex: Jõao Paulo">
        </div>
        <div class="form-group">
            <label for="contacto">Contacto</label>
            <input name="contacto" value="{{ $motorista->contacto }}" type="number" class="form-control" id="contacto" placeholder="ex: 820000">
        </div>
        <div class="form-group">
            <label for="morada">Morada</label>
            <input name="morada" value="{{ $motorista->morada }}" type="text" class="form-control" id="morada" placeholder="Av. Eduardo Mondlane, n2526">
        </div>
        <div class="form-group">
            <label for="data_nasci">Data de Nascimento</label>
            <input name="data_nasci" value="{{ $motorista->data_nasci }}" type="date" class="form-control" id="data_nasci">
        </div>
        <div class="form-group">
            <label for="nr_carta">Número da Carta</label>
            <input name="nr_carta" value="{{ $motorista->nr_carta }}" type="text" class="form-control" id="nr_carta" placeholder="Número da Carta">
        </div>
        <div class="form-group">
            <label for="data_emissao_carta">Data de Emissão da Carta</label>
            <input name="data_emissao_carta" value="{{ $motorista->data_emissao_carta }}" type="date" class="form-control" id="data_emissao_carta">
        </div>
    </div>
    <div class="modal-footer d-flex gap-3 mt-4">
        <a href="/admin/motoristas" class="btn btn-secondary">Voltar</a>
        <input type="submit" value="Guardar" class="btn btn-primary" />
    </div>
</form>
@endsection