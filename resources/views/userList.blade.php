<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#EBAA0C">
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Lista de usuários</title>
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <!-- Icones -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/estilos_list.css">
</head>

<body>

    <h1>Lista de usuários</h1>
    <a class="add" href="/insert-user"><i class="las la-plus-circle" title="Criar Usuário"></i></a>

    <section class="container">

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table id="id_tabela">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->primeiro_nome ." ". $user->sobrenome}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->vinculo->cargo}}</td>
                        <td>{{$user->vinculo->departamento}}</td>

                        <td class="center">
                            <a href="{{ route('get.user', $user->id) }}" class="las la-pen-square edit-button green" title="Editar"></a>
                            
                            <form class="form-icon" action="{{ route('user.destroy', $user->id) }}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="las la-trash-alt red" title="Excluir"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </section>

    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!--Tabela-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <!-- Nomes das estruturas da tabela -->
    <script>
        $(document).ready(function() {
            $('#id_tabela').DataTable({
                "language": 
                {
                    "lengthMenu": "Exibindo _MENU_ registros por página",
                    "zeroRecords": "Nenhum registro encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": 
                    {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    }

                }
            });
        });
    </script>

</body>

</html>