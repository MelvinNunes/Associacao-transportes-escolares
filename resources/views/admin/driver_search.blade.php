@extends('admin.index')

@section('admin-content')
<div>
    @if(session('motorista'))
    <script>
        swal("Adicionado!", "Motorista adicionado com sucesso!", "success");
    </script>
    @endif
    <div class="d-flex align-items-center">
        <!-- Modal -->
        <!-- Button trigger modal -->
        <div class="d-flex">
            <span>Pesquisou por: {{ $search }}</span>
        </div>
        <!-- Search -->
        <div class="input-group d-flex justify-content-end">
            <div class="form-outline">
                <div>
                    <form method="GET" action="/admin/motoristas/s" class="d-flex gap-2">
                        <input type="search" id="nome_motorista" name="nome_motorista" class="form-control" placeholder="Nome do Motorista" />
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
                        Nome do Motorista
                    </th>
                    <th class="th-sm">
                        Nr Carta
                    </th>
                    <th class="th-sm">
                        Morada
                    </th>
                    <th class="th-sm">
                        Data de Nascimento
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
                @if(count($motoristas)!=0)
                @foreach($motoristas as $motorista)
                <tr>
                    <td>{{ $motorista->nome_motorista }}</td>
                    <td>{{ $motorista->nr_carta }}</td>
                    <td>{{ $motorista->morada }}</td>
                    <td>{{ date('d/m/Y', strtotime($motorista->data_nasci)) }}</td>
                    <td>{{ date('d/m/Y H:m', strtotime($motorista->created_at)) }}</td>
                    <td>N/A</td>
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