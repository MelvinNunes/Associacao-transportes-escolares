@extends('index')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col">
            <div class="card bg-dark text-white">
                <img class="card-img" src="/school_bus.png" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">NomeMotorista</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <h2>Carrinha - NomeRota</h2>
            <h4>Descriçao</h4>
            <div class="d-flex flex-column gap-2">
                <span>Lotação: </span>
                <span>Preço (MZN): </span>
                <span>Nome do Motorista: </span>
                <span>Contacto do Motorista: </span>
                <span>Lugares disponiveis: </span>
                <span>Rota: </span>
            </div>

            <button class="btn btn-success mt-4">Fazer reserva</button>
        </div>
    </div>
</div>
@endsection