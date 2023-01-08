@extends('index')

@section('content')
@if($carrinha)
@if(session('error'))
<script>
    swal("Erro!", "{{ session('error') }}", "error");
</script>
@endif
<div class="container py-5">
    <div>
        <form action="/reservar" method="POST" class="row">
            @csrf
            <div class="col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="/img/carrinhas/{{ $carrinha->image }}" alt="Carrinha-image">
                    <div class="card-img-overlay">
                        <h5 class="card-title">{{ $carrinha->rota }}</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <h2>{{ $carrinha->rota }}</h2>
                <h4>Descriçao</h4>
                <div class="d-flex flex-column gap-2">
                    <span>Lotação: {{ $carrinha->nr_lugares }}</span>
                    <span>Preço (MZN): {{ $carrinha->preco }}</span>
                    <span>Nome do Motorista: {{ $carrinha->motorista->nome_motorista }}</span>
                    <span>Contacto do Motorista: {{ $carrinha->motorista->contacto }}</span>
                    <span>Lugares disponiveis: {{ $lugares_disponiveis }}</span>
                    <span>Rota: {{ $carrinha->rota }}</span>
                </div>
                @auth
                @if(empty($reservou))
                <div class="d-flex flex-column mt-4">
                    <input name="rota" type="text" value="{{ $carrinha->rota }}" style="display: none;">
                    <input name="id_carrinha" type="number" value="{{ $carrinha->id }}" style="display: none;">
                    <label for="nr_meses_reservado">QTD Meses a reservar:</label>
                    <input name="nr_meses_reservado" type="number" class="form-control" placeholder="Qtd Meses a reservar">
                </div>
                <input type="submit" value="Fazer reserva" class="btn btn-success mt-4">
                @else
                <a href="/reservas" class="btn btn-primary mt-4">Proceder ao pagamento</a>
                @endif
                @endauth
                @guest
                <div class="d-flex flex-column mt-3">
                    <span class="text-bold">Para fazer uma reserva precisa estar logado no sistema.</span>
                    <a href="/login" class="btn btn-primary mt-2 w-25">Entrar</a>
                </div>
                @endguest
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