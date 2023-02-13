<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header d-flex gap-3 align-items-center">
        <img src="{{ URL::to('/') }}/logo_bus.png" width="30" height="30" alt="logo">
        <h3>Transportes Escolares</h3>
    </div>

    <ul class="list-unstyled components">
        <!-- <p class="text-secondary">Katia M</p> -->
        <li class="{{ (request()->is('admin')) ? 'bg-primary' : '' }}">
            <a href="/admin">Home</a>
        </li>
        <li class="{{ request()->is('/admin/motoristas') ? 'bg-primary' : '' }}">
            <a href="/admin/motoristas">Motoristas</a>
        </li>
        <li class="{{ (request()->is('carrinhas')) ? 'bg-primary' : '' }}">
            <a href="/admin/carrinhas">Carrinhas</a>
        </li>
        <li class="{{ (request()->is('clientes')) ? 'bg-primary' : '' }}">
            <a href="/admin/clientes">Clientes</a>
        </li>
        <li>
            <a href="/">Página Inicial - Aplicação</a>
        </li>
        <!-- <li>
            <a href="/admin/perfil">Meu Perfil</a>
        </li> -->
    </ul>
</nav>