@extends('admin.index')

<head>
    <link href="{{ asset('css/button.css') }}" rel="stylesheet">
</head>

@section('admin-content')
<div>
    @if(session('motorista'))
    <script>
        swal("Adicionado!", "Motorista adicionado com sucesso!", "success");
    </script>
    @endif
    @if(session('updated'))
    <script>
        swal("Atualizado!", "Motorista atualizado com sucesso!", "info");
    </script>
    @endif
    @if(session('deleted'))
    <script>
        swal("Deletado!", "Motorista apagado com sucesso!", "success");
    </script>
    @endif
    @if(session('erro_adding'))
    <script>
        swal("Erro!", "{{ session('erro_adding') }}", "error");
    </script>
    @endif
    <div class="d-flex align-items-center">
        <!-- Modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Adicionar
        </button>


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
                    <td>{{ $motorista->owner->name }}</td>
                    <td>
                        <a class="btn btn-info button" href="/admin/motorista/{{ $motorista->id }}">
                            Editar
                        </a>
                    </td>
                    <td>
                        <form action="/admin/motorista/delete/{{ $motorista->id }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-danger button" value="Apagar">
                        </form>
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



    <!-- Modal to Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/admin/motorista" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Motorista</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nome_motorista">Nome Completo</label>
                            <input name="nome_motorista" type="text" class="form-control" id="nome_motorista" placeholder="ex: Jõao Paulo">
                        </div>
                        <div class="form-group">
                            <label for="contacto">Contacto</label>
                            <input name="contacto" type="number" class="form-control" id="contacto" placeholder="ex: 820000">
                        </div>
                        <div class="form-group">
                            <label for="morada">Morada</label>
                            <input name="morada" type="text" class="form-control" id="morada" placeholder="Av. Eduardo Mondlane, n2526">
                        </div>
                        <div class="form-group">
                            <label for="data_nasci">Data de Nascimento</label>
                            <input name="data_nasci" type="date" class="form-control" id="data_nasci">
                        </div>
                        <div class="form-group">
                            <label for="nr_carta">Número da Carta</label>
                            <input name="nr_carta" type="text" class="form-control" id="nr_carta" placeholder="Número da Carta">
                        </div>
                        <div class="form-group">
                            <label for="data_emissao_carta">Data de Emissão da Carta</label>
                            <input name="data_emissao_carta" type="date" class="form-control" id="data_emissao_carta">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                        <input type="submit" value="Adicionar" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
</div>
@endsection