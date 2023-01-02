@extends('admin.index')

@section('admin-content')
<div>
    @if(session('motorista'))
    <script>
        swal("Adicionado!", "Motorista adicionado com sucesso!", "success");
    </script>
    @endif
    <div class="d-flex">
        <!-- Modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Adicionar
        </button>


        <!-- Search -->
        <div class="input-group d-flex justify-content-end">
            <div class="form-outline">
                <div class="d-flex gap-2">
                    <input type="search" id="form1" class="form-control" placeholder="Nome da Carrinha" />
                    <button type="button" class="btn btn-primary">
                        Pesquisar
                    </button>
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


    <!-- Modal to Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Motorista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" placeholder="ex: Jõao Paulo">
                        </div>
                        <div class="form-group">
                            <label for="morada">Morada</label>
                            <input type="text" class="form-control" id="morada" placeholder="Av. Eduardo Mondlane, n2526">
                        </div>
                        <div class="form-group">
                            <label for="dataNasci">Data de Nascimento</label>
                            <input type="date" class="form-control" id="dataNasci">
                        </div>
                        <div class="form-group">
                            <label for="nrCarta">Número da Carta</label>
                            <input type="text" class="form-control" id="nrCarta" placeholder="Av. Eduardo Mondlane, n2526">
                        </div>
                        <div class="form-group">
                            <label for="dataEmiCarta">Data de Emissão da Carta</label>
                            <input type="date" class="form-control" id="dataEmiCarta">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                    <button type="button" class="btn btn-primary">Guardar Alterações</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


    <!-- Modal to Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apagar Motorista?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pretende apagar o motorista nomemotorista?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                    <button type="button" class="btn btn-danger">Apagar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
</div>
@endsection