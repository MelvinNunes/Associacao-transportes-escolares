@extends('admin.index')

@section('admin-content')
<div class="d-flex flex-column w-75 h-75">
    <h1>Bem Vindo a tela de Administração</h1>   
    <img class="rounded w-75 h-75"  src="{{ URL::to('/') }}/bus_interior.jpg" alt="Bem-vindo">
</div>
@endsection