@extends('admin.index')

<head>
    <link href="{{ asset('css/button.css') }}" rel="stylesheet">
</head>

@section('admin-content')
<div>
    @if(session('carrinha'))
    <script>
        swal("Adicionada!", "Carrinha adicionada com sucesso!", "success");
    </script>
    @endif
    @if(session('updated'))
    <script>
        swal("Atualizada!", "Carrinha atualizada com sucesso!", "info");
    </script>
    @endif
    @if(session('deleted'))
    <script>
        swal("Deletada!", "Carrinha apagada com sucesso!", "success");
    </script>
    @endif
    @if(session('error'))
    <script>
        swal("Erro!", "{{ session('error') }}", "error");
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
                    <td>{{ $carrinha->motorista->nome_motorista }}</td>
                    <td>{{ date('d/m/Y H:m', strtotime($carrinha->created_at)) }}</td>
                    <td>{{ $carrinha->owner->name }}</td>
                    <td>
                        <a class="btn btn-info button" href="/admin/carrinha/{{ $carrinha->id }}">
                            Editar
                        </a>
                    </td>
                    <td>
                        <form action="/admin/carrinha/delete/{{ $carrinha->id }}" method="POST">
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
                <form action="/admin/carrinha" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Carrinha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rota">Rota da Carrinha</label>
                            <input type="text" name="rota" class="form-control" id="rota" placeholder="ex: Matola">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="id_motorista">Motorista da Carrinha</label>
                                <select name="id_motorista" id="id_motorista" class="form-control">
                                    <option selected value="null">Seleccione uma opção</option>
                                    @foreach($motoristas as $motorista)
                                    <option value="{{ $motorista->id }}">{{ $motorista->nome_motorista }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contacto">Contacto</label>
                            <input min="0" type="text" name="contacto" class="form-control" id="contacto" placeholder="ex: 840000000">
                        </div>
                        <div class="form-group">
                            <label for="nr_lugares">Lotação</label>
                            <input min="1" type="number" name="nr_lugares" class="form-control" id="nr_lugares" placeholder="ex: 25">
                        </div>
                        <div class="form-group">
                            <label for="preco">Preço Mensal (MZN)</label>
                            <input min="1" type="number" name="preco" class="form-control" id="preco" placeholder="ex: 500.00">
                        </div>
                        <div class="form-group">
                            <label for="image">Foto da carrinha</label>
                            <input type="file" name="image" class="form-control" id="image">
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