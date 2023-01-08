@extends('admin.index')

@section('admin-content')
<form action="/admin/carrinha/update" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <input type="number" value="{{ $carrinha->id }}" name="id" class="form-control" style="display: none;" id="id" placeholder="id">
        <div class="form-group">
            <label for="rota">Rota da Carrinha</label>
            <input type="text" value="{{ $carrinha->rota }}" name="rota" class="form-control" id="rota" placeholder="ex: Matola">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="id_motorista">Motorista da Carrinha</label>
                <select name="id_motorista" id="id_motorista" class="form-control">
                    <option value="{{ $motorista->id }}">{{ $motorista->nome_motorista }}</option>
                    @foreach($motoristas as $motorista_in)
                    @if($motorista->id != $motorista_in->id)
                    <option value="{{ $motorista_in->id }}">{{ $motorista_in->nome_motorista }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="contacto">Contacto</label>
            <input type="text" value="{{ $carrinha->contacto }}" name="contacto" class="form-control" id="contacto" placeholder="ex: 840000000">
        </div>
        <div class="form-group">
            <label for="nr_lugares">Lotação</label>
            <input type="number" value="{{ $carrinha->nr_lugares }}" name="nr_lugares" class="form-control" id="nr_lugares" placeholder="ex: 25">
        </div>
        <div class="form-group">
            <label for="preco">Preço Mensal (MZN)</label>
            <input type="number" value="{{ $carrinha->preco }}" name="preco" class="form-control" id="preco" placeholder="ex: 500.00">
        </div>
        <div class="form-group">
            <label for="image">Foto da carrinha</label>
            <input type="file" value="" name="image" class="form-control" id="image">
        </div>
    </div>
    <div class="modal-footer d-flex gap-3 mt-4">
        <a href="/admin/carrinhas" class="btn btn-secondary">Voltar</a>
        <input type="submit" value="Guardar" class="btn btn-primary" />
    </div>
</form>
@endsection