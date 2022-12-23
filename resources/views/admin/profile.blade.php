@extends('admin.index')

@section('admin-content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Definições do perfil</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nome</label><input type="text" class="form-control" placeholder="Nome" value=""></div>
                    <div class="col-md-6"><label class="labels">Apelido</label><input type="text" class="form-control" value="" placeholder="Apelido"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="exemplo@gmail.com" value=""></div>
                    <div class="col-md-12"><label class="labels">Contacto</label><input type="text" class="form-control" placeholder="ex: 810000000" value=""></div>
                    <div class="col-md-12"><label class="labels">Morada</label><input type="text" class="form-control" placeholder="ex: Av Eduardo Mondlane" value=""></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Guardar Alterações</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Informações Básicas</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Reservas</span></div><br>
                <div class="d-flex flex-column gap-2">
                    <span>Total de motoristas adicionados: </span>
                    <span>Total de carrinhas adicionadas: </span>
                    <span>Total de clientes: </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection