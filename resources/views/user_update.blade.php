<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#EBAA0C">
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="/css/estilos_user.css">
    <title>Atualizar usuário</title>
</head>

<body>
    <section class="container">
        <h1>Atualizar usuário</h1>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('update.user', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h3 class="mt-5">Dados pessoais</h3>
            <div class="row">
                <div class="col-lg-6">
                    <label for="Primeiro nome">Primeiro nome<span class="red">*</span></label>
                    <input name="primeiro_nome" class="form-control @error('primeiro_nome') is-invalid @enderror"
                        type="text" value="{{ $user->primeiro_nome }}" placeholder="Primeiro nome" required>

                    @error('primeiro_nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <label for="Sobrenome">Sobrenome<span class="red">*</span></label>
                    <input name="sobrenome" class="form-control @error('sobrenome') is-invalid @enderror" type="text"
                        value="{{ $user->sobrenome }}" placeholder="Sobrenome" required>

                    @error('sobrenome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row margin-top">
                <div class="col-lg-6">
                    <label for="Primeiro nome">N° Celular<span class="red">*</span></label>
                    <input name="num_celular" class="form-control @error('num_celular') is-invalid @enderror"
                        type="text" value="{{ $user->num_celular }}" placeholder="(73) 98189****" required>

                    @error('num_celular')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <label for="Sobrenome">E-mail<span class="red">*</span></label>
                    <input name="email" class="form-control @error('email') is-invalid @enderror" type="email"
                        value="{{ $user->email }}" placeholder="exemplo@gmail.com" required>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <h3 class="margin-top">Vínculo empregatício<span class="red">*</span></h3>
            <div class="row">
                <div class="col-lg-6">
                    <label for="Cargo">Cargo<span class="red">*</span></label>
                    <input name="cargo" class="form-control @error('cargo') is-invalid @enderror" type="text"
                        value="{{ $user->vinculo->cargo }}" placeholder="Cargo" required>

                    @error('cargo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <label for="Departamento">Departamento<span class="red">*</span></label>
                    <input name="departamento" class="form-control @error('departamento') is-invalid @enderror"
                        type="text" value="{{ $user->vinculo->departamento }}" placeholder="Departamento" required>

                    @error('departamento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input class="invisible" name="id" type="number" value="{{ $user->id }}" required>
            </div>

            <button class="btn" onclick="submitForm(this.form)" type="button">Atualizar usuário</button>
        </form>
    </section>

    <script>
        function submitForm(form) {
            submitButton = document.getElementById("formsubmit");
            const confirmMessage = "Os dados modificados serão persisitidos no banco de dados";
            swal({
                title: "Você deseja editar este registro?",
                text: confirmMessage,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        } 
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>

</body>

</html>
