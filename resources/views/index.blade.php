<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#EBAA0C">
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/estilos.css">
    <title>CRUD em Laravel</title>
</head>
<body>
    <section>
        <video src="video/animacao.mp4" autoplay loop muted></video>
        <h1>CRUD</h1>
        <p>
            Create (criar), Read (ler), Update (atualizar) e Delete (excluir) – as iniciais em inglês formam
            CRUD – são as quatro funções básicas que geralmente os sistemas que manipulam banco de dados devem poder executar.
            Nesta aplicação foi implementado um exemplo básico de CRUD utilizando o Laravel Framework.
        </p>
    <button class="btn" onclick="comecar()">Começar</button>
    </section>

    <script>
        function comecar(){
            document.location = '/list-users'
        }
    </script>
</body>
</html>