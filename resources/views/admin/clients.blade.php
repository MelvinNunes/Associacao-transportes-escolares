@extends('admin.index')

@section('admin-content')
<!-- Table with content -->
<div class="mt-3">
    <!-- Search -->
    <div class="input-group d-flex justify-content-end">
        <div class="form-outline">
            <div class="d-flex gap-2">
                <input type="search" id="form1" class="form-control" placeholder="Nome do Cliente" />
                <button type="button" class="btn btn-primary">
                    Pesquisar
                </button>
            </div>
        </div>
    </div>
    <!-- EndSearch -->
    <div class="mt-3">
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">
                        Nome do Cliente
                    </th>
                    <th class="th-sm">
                        Contacto
                    </th>
                    <th class="th-sm">
                        Nome da Carrinha
                    </th>
                    <th class="th-sm">
                        Morada
                    </th>
                    <th class="th-sm">
                        Adicionado em
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $cliente)
                <tr>
                    <td>$reservas->usuario_reserva()->name</td>
                    <td>$reservas->usuario_reserva()->contact</td>
                    <td>$reservas->carrinha_reserva()->rota</td>
                    <td>$reservas->usuario_reserva()->address</td>
                    <td>$reservas->usuario_reserva()->address</td>
                    <td>
                        <form action="/admin/cliente/delete" method="POST">
                        @csrf
                        <span style="display: none">$reservas->usuario_reserva()->id</span>
                        <input type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                            Dissociar
                        </input>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal to Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dissociar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pretende dissociar o nomecliente da carrinha nomecarrinha?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-danger">Dissociar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->



@endsection
