<head>
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
</head>

<nav class="navbar fixed-top container-fluid navbar-expand-md navbar-light bg-nav-custom px-md-5 px-4">
    <a class="navbar-brand d-flex align-items-center gap-2" href="/">
        <img width="30" height="30" src="{{ URL::to('/') }}/logo_bus.png" alt="logo">
        <span class="d-md-none text-black ">Transportes Escolares</span>
        <span class="d-none d-md-flex text-black ">Associação dos Transportes Escolares</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-md-flex justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav gap-2">
            <form action="/s" method="GET" class="form-inline my-2 my-lg-0 d-flex gap-2">
                <input name="rota" class="form-control mr-sm-2" type="search" placeholder="Pesquisar carrinhas, rotas..." aria-label="Search">
                <input class="btn btn-secondary my-2 my-sm-0" value="Pesquisar" type="submit">
            </form>
            @guest
            <li class="nav-item mx-2 ml-2">
                <a class="nav-link" href="/login">Entrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Criar Conta</a>
            </li>
            @endguest
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Meu Perfil
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="/perfil">Ver Perfil</a>
                    <a class="dropdown-item" href="/reservas">Ver Reservas</a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="POST">
                        @csrf
                        <input value="Sair" class="dropdown-item" type="submit">
                    </form>
                </div>
            </li>
            @endauth
        </ul>
    </div>



</nav>