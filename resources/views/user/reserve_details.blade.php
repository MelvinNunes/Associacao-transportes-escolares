@extends('index')

<head>
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
</head>

@section('content')
@if(session('success'))
<script>
    swal("Sucesso!", "{{ session('success') }}", "success");
</script>
@endif
@if(session('erro'))
<script>
    swal("Erro!", "{{ session('erro') }}", "error");
</script>
@endif
<div class="container py-5">
    <div class="row">
        <div class="col">
            <div class="card bg-dark text-white">
                <img class="card-img" src="/img/carrinhas/{{ $reserva->carrinha_reserva->image }}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">{{ $reserva->carrinha_reserva->motorista->nome_motorista }}</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex">
                <h2 class="mr-2">{{ $reserva->carrinha_reserva->rota }}</h2>
                <div class="d-flex align-items-center">
                    @if($reserva->estado == 'PENDENTE')
                    <span class="rounded bg-warning px-2 py-1 text-white text-sm">{{ $reserva->estado }}</span>
                    @else
                    <span class="rounded bg-success px-2 py-1 text-white text-sm">{{ $reserva->estado }}</span>
                    @endif
                </div>
            </div>
            <h4>Descriçao</h4>
            <div class="d-flex flex-column gap-2">
                <span>Rota: {{ $reserva->carrinha_reserva->rota }}</span>
                <span>Lotação: {{ $reserva->carrinha_reserva->nr_lugares }} Lugares</span>
                <span>Total de Meses Reservado: {{ $reserva->nr_meses_reservado }} Mês(es)</span>
                <span>Preço Mensal: {{ $reserva->carrinha_reserva->preco }} MT</span>
                <span>Preço Total: {{ $reserva->carrinha_reserva->preco *  $reserva->nr_meses_reservado}} MT</span>
                <span>Nome do Motorista: {{ $reserva->carrinha_reserva->motorista->nome_motorista }}</span>
                <span>Contacto do Motorista: {{ $reserva->carrinha_reserva->motorista->contacto }}</span>
                <span>Lugares disponiveis: {{ $lugares_disponiveis }} Lugares</span>
                <span class="my-3">Reservado em: {{ date('d/m/Y H:m', strtotime($reserva->created_at)) }}</span>
            </div>
            <div class="w-50">
                <a href="/motorista/{{ $reserva->carrinha_reserva->motorista->id }}" class="btn btn-secondary my-3 w-100">Ver Perfil do Motorista</a>
            </div>
            @if($reserva->estado == 'PENDENTE')
            <div class="d-flex align-items-center">
                <form action="/reseva/apagar/{{ $reserva->id}}" method="POST">
                    <button type="button" class="btn btn-primary mr-3 h-100 launch" data-toggle="modal" data-target="#staticBackdrop">Pagar Reserva</button>
                    @csrf
                    <input type="submit" class="btn btn-danger h-100" value="Cancelar Reserva">
                </form>
            </div>
            @else
            <div class="mt-3">
                <span class="text-danger">NB: Anular a reserva não reembolsa o valor pago!</span>
            </div>
            <div class="d-flex gap-3">
            <form action="/reseva/apagar/{{ $reserva->id}}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-danger mt-5" value="Cancelar Reserva">
            </form>
            </div>
            @endif

        </div>
    </div>
</div>


<!-- Payment Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                <div class="tabs mt-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation"> <a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true"> <img src="/mpesa.jpg" width="80" height="40"> </a> </li>
                        <li class="nav-item" role="presentation"> <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false"> <img src="/p24.png" width="80" height="40"> </a> </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                            <div class="px-2 mt-2">
                                <div class="d-flex flex-column">
                                    <span>Pagamento pelo mpesa</span>
                                    <span class="my-2">Sugestão: 841234567</span>
                                </div>
                                <div class="mt-3">
                                    <form action="/reserva/pagar" method="POST">
                                        @csrf
                                        <input type="number" name="id_reserva" value="{{ $reserva->id }}" style="display: none;">
                                        <div class="inputbox">
                                            <input min="0" type="text" name="contacto" class="form-control" placeholder="Insira o seu número de celular" required="required">
                                        </div>
                                        <div class="pay px-5">
                                            <input type="submit" class="btn btn-primary btn-block" value="Pagar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                            <div class="px-2 mt-2">
                                <span>Pagamento pelo ponto 24</span>
                                <div class="d-flex flex-column mt-3">
                                    <span>1. Digite *124# e prima na tecla de chamada</span>
                                    <span>2. Seleccione a opção 3 (Pagamentos)</span>
                                    <span>3. Seleccione a opção 8 (Outros Serviços) </span>
                                    <span>4. Insira o numero da entidade: 8565</span>
                                    <span>5. Insira a referencia: 342342342</span>
                                    <span>6. Insira o valor a pagar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection