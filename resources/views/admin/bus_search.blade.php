@extends('admin.index')

@section('admin-content')
<div>
    <div class="d-flex align-items-center">
        <div class="d-flex">
            <span>Pesquisou por: {{ $search }}</span>
        </div>
        <!-- Search -->
        <div class="input-group d-flex justify-content-end">
            <div class="form-outline">
                <div>
                    <form method="GET" action="/admin/carrinhas/s" class="d-flex gap-2">
                        <input type="search" id="rota" name="rota" class="form-control" placeholder="Rota da Carrinha" />
                        <input type="submit" class="btn btn-primary" value="Pesquisar">
                    </form>
                </div>
            </div>
        </div>
        <!-- EndSearch -->
    </div>
    <!-- Table with content -->
    <div class="mt-3">
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">
                        Nome da carrinha
                    </th>
                    <th class="th-sm">
                        Lotação(Lugares)
                    </th>
                    <th class="th-sm">
                        Preço(MZN)
                    </th>
                    <th class="th-sm">
                        Motorista
                    </th>
                    <th class="th-sm">
                        Adicionado em
                    </th>
                    <th class="th-sm">
                        Adicionado por
                    </th>
                    <th class="th-sm">
                        Editar
                    </th>
                    <th class="th-sm">
                        Apagar
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(count($carrinhas)!=0)
                @foreach($carrinhas as $carrinha)
                <tr>
                    <td>{{ $carrinha->rota }}</td>
                    <td>{{ $carrinha->nr_lugares }}</td>
                    <td>{{ $carrinha->preco }}</td>
                    <td>NomeMotorista</td>
                    <td>{{ date('d/m/Y H:m', strtotime($carrinha->created_at)) }}</td>
                    <td>CriadoPor</td>
                    <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#editModal">
                            <img width="15" height="15" src="{{ URL::to('/') }}/buttons/edit.png" alt="edit">
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                            <img width="15" height="15" src="{{ URL::to('/') }}/buttons/delete.png" alt="edit">
                        </button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection