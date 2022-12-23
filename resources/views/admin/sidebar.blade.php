<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header d-flex gap-3 align-items-center">
        <img src="{{ URL::to('/') }}/logo_bus.png" width="30" height="30" alt="logo">
        <h3>Transportes Escolares</h3>
    </div>

    <ul class="list-unstyled components">
        <p class="text-secondary">Katia M</p>
        <li>
            <a href="/admin">Home</a>
        </li>
        <!-- <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Meu Perfil</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Editar Perfil</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li> -->
        <li>
            <a href="/admin/motoristas">Motoristas</a>
        </li>
        <li>
            <a href="/admin/carrinhas">Carrinhas</a>
        </li>
        <li>
            <a href="/admin/clientes">Clientes</a>
        </li>
        <li>
            <a href="/admin/perfil">Meu Perfil</a>
        </li>
    </ul>
</nav>