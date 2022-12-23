@extends('index')

<head>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

@section('content')
<div>

    <div class="d-flex header-image justify-content-center align-items-center h-75">
        <div class="d-flex flex-column gap-2">
            <h1 class="text-white">Encontre a carrinha ideal!</h1>
            <form class="form-inline my-2 my-lg-0 d-flex gap-2">
                <input class="form-control" type="search" placeholder="Pesquisar carrinhas, rotas..." aria-label="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>

    <h2 class="px-4 pt-3">Carrinhas Disponíveis</h2>

    <!-- Scrollable list -->
    <div class="container-fluid py-2 top-container">
        <!-- Blur -->
        <div class="left">
        </div>
        <div class="right">
        </div>
        <!-- List -->
        <div class="d-flex flex-row carroussel gap-4 p-3">
            <!-- Card -->
            <div class="card-custom">
                <div class="card-centralization">
                    <img class="card-image-custom" src="/school_bus.png" alt="bus">
                    <div class="card-body card-centralization">
                        <h5 class="card-title">Malhampsene</h5>
                        <a href="/carrinhas/nome" class="btn btn-primary w-75 d-flex justify-content-center mt-2 mx-1 px-5">Reservar</a>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="card-custom">
                <div class="card-centralization">
                    <img class="card-image-custom" src="/school_bus.png" alt="bus">
                    <div class="card-body card-centralization">
                        <h5 class="card-title">Malhampsene</h5>
                        <a href="/carrinhas/nome" class="btn btn-primary w-75 d-flex justify-content-center mt-2 mx-1 px-5">Reservar</a>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="card-custom">
                <div class="card-centralization">
                    <img class="card-image-custom" src="/school_bus.png" alt="bus">
                    <div class="card-body card-centralization">
                        <h5 class="card-title">Malhampsene</h5>
                        <a href="/carrinhas/nome" class="btn btn-primary w-75 d-flex justify-content-center mt-2 mx-1 px-5">Reservar</a>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="card-custom">
                <div class="card-centralization">
                    <img class="card-image-custom" src="/school_bus.png" alt="bus">
                    <div class="card-body card-centralization">
                        <h5 class="card-title">Malhampsene</h5>
                        <a href="/carrinhas/nome" class="btn btn-primary w-75 d-flex justify-content-center mt-2 mx-1 px-5">Reservar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection