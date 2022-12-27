@extends('index')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col">
            <div class="card bg-dark text-white">
                <img class="card-img" src="/bus_one.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">NomeMotorista</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex">
                <h2 class="mr-2">Carrinha - NomeRota</h2>
                <div class="d-flex align-items-center">
                    <span class="rounded bg-success px-2 py-1 text-white text-sm">Pago</span>
                </div>
            </div>
            <h4>Descriçao</h4>
            <div class="d-flex flex-column gap-2">
                <span>Lotação: </span>
                <span>Preço (MZN): </span>
                <span>Nome do Motorista: </span>
                <span>Contacto do Motorista: </span>
                <span>Lugares disponiveis: </span>
                <span>Rota: </span>
                <span>Reservado em: </span>
            </div>
            <div>
                <a href="/motorista/id" class="btn btn-secondary my-2">Ver Perfil do Motorista</a>
            </div>
            <div class="mt-3">
                <span class="text-danger">NB: Anular a reserva não reembolsa o valor pago!</span>
            </div>
            <div class="d-flex gap-3">
                <button class="btn btn-danger mt-4">Anular Reserva</button>
            </div>
        </div>
    </div>
</div>
@endsection