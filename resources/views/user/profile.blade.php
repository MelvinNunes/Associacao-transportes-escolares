@extends ('index')

<head>
    <title>Meu Perfil</title>
</head>

@section('content')
@if(session('user_updated'))
<script>
    swal("Sucesso!", "Usúario actualizado com sucesso!", "success");
</script>
@endif
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                @if($user->is_admin)
                <a class="btn btn-success" href="/admin">Administração</a>
                @endif
                <span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <form method="POST" action="/perfil">
                @csrf
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Definições do perfil</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="name" class="labels">Nome</label>
                            <input name="name" type="text" class="form-control" placeholder="Nome" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="email" class="labels">Email</label>
                            <input name="email" disabled type="email" class="form-control" placeholder="exemplo@gmail.com" value="{{ $user->email }}">
                        </div>
                        <div class="col-md-12">
                            <label for="contact" class="labels">Contacto</label>
                            <input name="contact" type="text" class="form-control" placeholder="ex: 810000000" value="{{ $user->contact }}">
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="labels">Morada</label>
                            <input name="address" type="text" class="form-control" placeholder="ex: Av Eduardo Mondlane" value="{{ $user->address }}">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <input class="btn btn-primary profile-button" type="submit" value="Guardar Alterações">
                    </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center experience"><span>Informações Básicas</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Reservas</span></div><br>
            <span>Total de reservas feitas: {{ $total_reservas }}</span>
        </div>
    </div>
</div>
</div>
@endsection