@extends('index')

<head>
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
</head>

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col">
            <div class="card bg-dark text-white">
                <img class="card-img" src="/bus_two.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">NomeMotorista</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex">
                <h2 class="mr-2">Carrinha - NomeRota</h2>
                <div class="d-flex align-items-center">
                    <span class="rounded bg-warning px-2 py-1 text-white text-sm">Pendente</span>
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
                <a href="/motorista/id" class="btn btn-secondary my-3">Ver Perfil do Motorista</a>
            </div>
            <div class="d-flex">
                <button type="button" class="btn btn-primary mr-3 launch" data-toggle="modal" data-target="#staticBackdrop">Pagar Reserva</button>
                <button class="btn btn-danger">Cancelar Reserva</button>
            </div>
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
                                <span>Pagamento pelo mpesa</span>
                                <div class="mt-3">
                                    <div class="inputbox">
                                        <input type="text" name="name" class="form-control" placeholder="Insira o seu número de celular" required="required">
                                    </div>
                                    <div class="pay px-5"> <button class="btn btn-primary btn-block">Pagar</button> </div>
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