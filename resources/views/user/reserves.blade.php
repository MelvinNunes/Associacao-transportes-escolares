@extends ('index')

@section('content')
@if(session('success_reserva'))
<script>
    swal("Sucesso!", "{{ session('success_reserva') }}", "success");
</script>
@endif
@if(session('deleted'))
<script>
    swal("Sucesso!", "{{ session('deleted') }}", "success");
</script>
@endif
@if(session('erro'))
<script>
    swal("Erro!", "{{ session('erro') }}", "error");
</script>
@endif
<div class="container mt-5 pt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <!-- Reserves-->
            @if(count($reservas) != 0)
            @foreach($reservas as $reserva)
            <div class="row p-2 bg-white border rounded my-2">
                <div class="col-md-3 mt-1">
                    <img class="img-fluid img-responsive rounded product-image" src="/img/carrinhas/{{ $reserva->carrinha_reserva->image }}">
                </div>
                <div class="col-md-6 mt-1">
                    <h5>{{ $reserva->carrinha_reserva->rota }}</h5>
                    <div class="d-flex flex-row">
                        <span>Lotação: {{ $reserva->carrinha_reserva->nr_lugares }} lugares</span>
                    </div>
                    <div class="mt-1 mb-1 spec-1"><span>Motorista: Pedro João</span></div>
                    <div class="mt-1 mb-1 spec-1"><span>Contacto: 841234567</span></div>
                    <p class="text-justify text-truncate para mb-0">Descrição:<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">{{ $reserva->carrinha_reserva->preco }} MZN</h4><span class="strike-text ml-2">mensal</span>
                    </div>
                    @if($reserva->estado == "PENDENTE")
                    <h6 class="text-warning">{{ $reserva->estado }}</h6>
                    @else
                    <h6 class="text-success">{{ $reserva->estado }}</h6>
                    @endif
                    @if($reserva->estado == "PENDENTE")
                    <div class="d-flex flex-column mt-4">
                        <a href="/reservas/{{ $reserva->id }}" class="btn btn-primary btn-sm" onclick="" type="button">Pagamento e Detalhes</a>
                        <form action="/reseva/apagar/{{ $reserva->id}}" method="POST">
                            @csrf
                            <input class="btn btn-danger btn-sm mt-2 w-100" type="submit" value="Anular Reserva" />
                        </form>
                    </div>
                    @else
                    <div class="d-flex flex-column mt-4">
                        <a href="/reservas/{{ $reserva->id }}" class="btn btn-primary btn-sm" onclick="" type="button">Detalhes</a>
                        <form action="/reseva/apagar/{{ $reserva->id}}" method="POST">
                            @csrf
                            <input class="btn btn-danger btn-sm mt-2 w-100" type="submit" value="Anular Reserva" />
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            @else
            <h4>Não possui nenhuma reserva.</h4>
            @endif

        </div>
    </div>
</div>
@endsection