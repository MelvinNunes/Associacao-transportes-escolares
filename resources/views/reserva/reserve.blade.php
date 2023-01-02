@extends('index')

@section('content')
@if($carrinha)
<div class="container py-5">
    <div class="row">
        <form action="">
            <div class="col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="/img/carrinhas/{{ $carrinha->image }}" alt="Carrinha-image">
                    <div class="card-img-overlay">
                        <h5 class="card-title">NomeMotorista</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <h2>{{ $carrinha->rota }}</h2>
                <h4>Descriçao</h4>
                <div class="d-flex flex-column gap-2">
                    <span>Lotação: {{ $carrinha->nr_lugares }}</span>
                    <span>Preço (MZN): {{ $carrinha->preco }}</span>
                    <span>Nome do Motorista: </span>
                    <span>Contacto do Motorista: </span>
                    <span>Lugares disponiveis: </span>
                    <span>Rota: {{ $carrinha->rota }}</span>
                </div>
                <input type="submit" value="Fazer reserva" class="btn btn-success mt-4">
            </div>
        </form>
    </div>
</div>
@else
<div class="container py-5">
    <h3 class="mx-auto">Nenhuma carrinha seleccionada</h3>
</div>
@endif
@endsection