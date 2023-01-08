@extends('index')

<head>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

@section('content')
<div>
    @if(session('reserva_success'))
    <script>
        swal("Sucesso!", "Reserva feita com sucesso! Proceda ao seu perfil para efectuar o pagamento.", "success");
    </script>
    @endif
    <div class="d-flex header-image justify-content-center align-items-center h-75">
        <div class="d-flex flex-column gap-2">
            <h1 class="text-white">Encontre a carrinha ideal!</h1>
            <form action="/s" method="GET" class="form-inline my-2 my-lg-0 d-flex gap-2">
                <input name="rota" class="form-control" type="search" placeholder="Pesquisar carrinhas, rotas..." aria-label="Search">
                <input class="btn btn-secondary my-2 my-sm-0" type="submit" value="Pesquisar">
            </form>
        </div>
    </div>

    @if(count($carrinhas)!=0)
    <h2 class="px-4 pt-3">Carrinhas Disponíveis</h2>
    @else
    <h2 class="px-4 pt-3">Nenhuma Carrinha Disponível</h2>
    @endif

    @if(count($carrinhas)!=0)
    <!-- Scrollable list -->
    <div class="container-fluid py-2 top-container">
        <!-- Blur -->
        <div class="left">
        </div>
        <div class="right">
        </div>
        <!-- List -->
        <div class="d-flex flex-row carroussel p-3">
            @foreach($carrinhas as $carrinha)
            <!-- Card -->
            <div class="card-custom mr-4">
                <div class="card-centralization">
                    <img class="card-image-custom" src="/school_bus.png" alt="bus">
                    <div class="card-body card-centralization">
                        <h5 class="card-title">{{ $carrinha->rota }}</h5>
                        <a href="/carrinhas/{{ $carrinha->rota }}" class="btn btn-primary w-75 d-flex justify-content-center mt-2 mx-1 px-5">Reservar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection