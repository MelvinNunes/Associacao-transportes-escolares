@extends ('index')

@section('content')
<div class="container mt-5 pt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1">
                    <img class="img-fluid img-responsive rounded product-image" src="/bus_one.jpg">
                </div>
                <div class="col-md-6 mt-1">
                    <h5>Nome da Carrinha</h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>Lotação: 15 lugares</span>
                    </div>
                    <div class="mt-1 mb-1 spec-1"><span>Motorista: Pedro João</span></div>
                    <div class="mt-1 mb-1 spec-1"><span>Contacto: 841234567</span></div>
                    <p class="text-justify text-truncate para mb-0">Descrição.<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">500 MZN</h4><span class="strike-text ml-2">mensal</span>
                    </div>
                    <h6 class="text-success">Activo</h6>
                    <div class="d-flex flex-column mt-4">
                        <button class="btn btn-primary btn-sm" type="button">Detalhes</button>
                        <button class="btn btn-danger btn-sm mt-2" type="button">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection