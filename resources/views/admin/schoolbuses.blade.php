@extends('admin.index')

@section('admin-content')
<div>
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
                        Lotação
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
                <tr>
                    <td>Matola</td>
                    <td>20</td>
                    <td>Pedro Chipande</td>
                    <td>2019/01/01</td>
                    <td>AdminMelvin</td>
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

            </tbody>
        </table>
    </div>



    <!-- Modal to Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Carrinha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nomeCarrinha">Nome da Carrinha</label>
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
                            <label for="rota">Rota</label>
                            <input type="text" class="form-control" id="rota" placeholder="ex: Matola - Cidade de Maputo">
                        </div>
                        <div class="form-group">
                            <label for="lotacao">Lotação</label>
                            <input type="number" class="form-control" id="lotacao" placeholder="ex: 25">
                        </div>
                        <div class="form-group">
                            <label for="preco">Preço (MZN)</label>
                            <input type="number" class="form-control" id="preco" placeholder="ex: 500.00">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                    <button type="button" class="btn btn-success">Adicionar</button>
                </div>
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
                            <label for="nomeCarrinha">Nome da Carrinha</label>
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
                            <label for="rota">Rota</label>
                            <input type="text" class="form-control" id="rota" placeholder="ex: Matola - Cidade de Maputo">
                        </div>
                        <div class="form-group">
                            <label for="lotacao">Lotação</label>
                            <input type="number" class="form-control" id="lotacao" placeholder="ex: 25">
                        </div>
                        <div class="form-group">
                            <label for="preco">Preço (MZN)</label>
                            <input type="number" class="form-control" id="preco" placeholder="ex: 500.00">
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