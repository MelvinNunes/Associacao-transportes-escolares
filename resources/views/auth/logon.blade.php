<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Conta</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100 px-4 py-3">
                <div class="d-flex justify-content-center col-md-9 col-lg-6 col-xl-5">
                    <img src="./logo_bus.png" class="img-fluid w-75" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form>
                        <div class="d-flex flex-row align-items-center mb-5 justify-content-center justify-content-lg-start">
                            <h3 class="p-3">Crie a sua conta</h3>
                        </div>

                        <div class="p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Dados do perfil</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Nome</label><input type="text" class="form-control" placeholder="Nome" value=""></div>
                                <div class="col-md-6"><label class="labels">Apelido</label><input type="text" class="form-control" value="" placeholder="Apelido"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="exemplo@gmail.com" value=""></div>
                                <div class="col-md-12"><label class="labels">Senha</label><input type="password" class="form-control" placeholder="Senha" value=""></div>
                                <div class="col-md-12"><label class="labels">Contacto</label><input type="text" class="form-control" placeholder="ex: 810000000" value=""></div>
                                <div class="col-md-12"><label class="labels">Morada</label><input type="text" class="form-control" placeholder="ex: Av Eduardo Mondlane" value=""></div>
                            </div>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Possui uma conta? <a href="/entrar" class="link-danger">Entrar</a></p>
                            <div class="mt-3 text-center"><button class="btn btn-primary profile-button" type="button">Registrar</button></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>