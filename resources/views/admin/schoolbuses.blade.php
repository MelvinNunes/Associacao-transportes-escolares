@extends('admin.index')

@section('admin-content')
<div>
    @if(session('carrinha'))
    <script>
        swal("Adicionada!", "Carrinha adicionada com sucesso!", "success");
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
                            <input type="text" name="contacto" class="form-control" id="contacto" placeholder="ex: 840000000">
                        </div>
                        <div class="form-group">
                            <label for="nr_lugares">Lotação</label>
                            <input type="number" name="nr_lugares" class="form-control" id="nr_lugares" placeholder="ex: 25">
                        </div>
                        <div class="form-group">
                            <label for="preco">Preço (MZN)</label>
                            <input type="number" name="preco" class="form-control" id="preco" placeholder="ex: 500.00">
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


    <!-- Modal to Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Carrinha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nomeCarrinha">Rota da Carrinha</label>
                            <input type="text" class="form-control" id="nomeCarrinha" placeholder="ex: Matola">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Motorista da Carrinha</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Seleccione uma opção</option>
                                    <option>Mateus Junior</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contactoCarrinha">Contacto</label>
                            <input type="text" class="form-control" id="contactoCarrinha" placeholder="ex: 840000000">
                        </div>
                        <div class="form-group">
                            <label for="lotacao">Lotação</label>
                            <input type="number" class="form-control" id="lotacao" placeholder="ex: 25">
                        </div>
                        <div class="form-group">
                            <label for="preco">Preço (MZN)</label>
                            <input type="number" class="form-control" id="preco" placeholder="ex: 500.00">
                        </div>
                        <div class="form-group">
                            <label for="image">Foto da carrinha</label>
                            <input type="file" name="image" class="form-control" id="image">
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
                    <h5 class="modal-title" id="exampleModalLabel">Apagar Carrinha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pretende deletar a carrinha nomecarrinha?</p>
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