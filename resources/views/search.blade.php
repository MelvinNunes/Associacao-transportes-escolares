@extends('index')

<head>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

@section('content')
<div class="d-flex mx-3 align-items-center pt-3">
    <div class="d-flex align-items-center">
        <h3 class="text-black">Pesquisou por: </h3>
        <h4 class="ml-4">{{ $search }}</h4>
    </div>
</div>
<!-- Scrollable list -->
<div class="container-fluid py-2 top-container">
    @if(count($carrinhas)!=0)
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
    @else
    <h5 class="text-black">Não foi encontrada nenhuma carrinha com a rota {{ $search }}!</h3>
        @endif
</div>
@endsection