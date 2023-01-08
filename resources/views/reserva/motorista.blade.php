@extends('index')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-3">
    <div class="card w-50 m-4 p-3">
        <h4>Motorista</h4>
        <div class="d-flex flex-column">
            <span>Nome do Motorista: {{ $motorista->nome_motorista }} </span>
            <span>Contacto do Motorista: {{ $motorista->contacto }}</span>
            <span>Morada do Motorista: {{ $motorista->morada }}</span>
            <span>Data de Nascimento: {{ date('d/m/Y', strtotime($motorista->data_nasci)) }}</span>
        </div>
        <a href="javascript:history.back()" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>
@endsection