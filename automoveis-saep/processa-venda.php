<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS do Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- CSS personalizado  -->
    <link rel="stylesheet" href="style.css">
    <title>Venda de Automóveis</title>
</head>

<body class="bg-light">

    <!-- Cabeçalho   -->
    <header>
        <div class="bg-dark shadow p-2 d-flex align-items-center">
            <a href="index.php">
                <img src="img/logo3-rent-a-car.png" alt="Logo" width="170" class="ml-4">
            </a>
            <h1 class="text-uppercase text-center text-white flex-fill mr-4">Pátio de Automóveis - <span class="text-warning">Venda de Automóveis</span> </h1>
        </div>

        <!-- Menu de navegação   -->
        <nav area-label="breadcrumb" class="shadow mb-5">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="nav-link" href="index.php">Listagem de Áreas</a></li>
                <li class="breadcrumb-item"><a class="nav-link" href="lista-automoveis.php">Listagem de Automóveis</a></li>
                <li class="breadcrumb-item"><a class="nav-link" href="vende-automoveis.php">Venda de Automóveis</a></li>
            </ol>
        </nav>
    </header>

    <!-- Conteúdo -->
    <section class="container d-flex flex-column align-items-center">


        <?php
        //inclusao do arquivo de conexao do bd
        include("conecta.php");

        //recupera o id e a area via metodo Post
        $automovelID = $_POST["automovel"];
        $clienteID = $_POST["cliente"];
        $concessionariaID = $_POST["concessionaria"];

        //Instrucao SQL que ira atualizar o campo de quantidade de veículos
        $SQL = "UPDATE alocacao SET quantidade = quantidade - 1 WHERE automovel = '$automovelID'
        AND concessionaria = '$concessionariaID';";

        //Tenta executar a instruçao SQL
        if (mysqli_query($conectaBD, $SQL)) {

            //Encerra a conexão com o banco de dados.
            mysqli_close($conectaBD);

            //Exibe uma mensagem na tela do usuário
            //print("venda efetuada com sucesso!!!");
            echo '<div style="background-color: green; padding: 15px; color: white; border-radius: 5px; text-align: center; font-size: 18px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Venda efetuada com sucesso!!!</div>';

            //Espera 5 segundos e então redireciona o usuário.
            header("refresh: 5; URL= index.php");
        } else {

            //Encerra a conexão com o banco de dados.
            mysqli_close($conectaBD);

            //Exibe uma mensagem na tela do usuário
            //print("Não foi possivel efetuar a venda!!!");
            echo '<div style="background-color: red; padding: 15px; color: white;border-radius: 5px; text-align: center; font-size: 18px;position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Não foi possível efetuar a venda!!!</div>';

            //Espera 5 segundos e então redireciona o usuário.
            header("refresh: 5; URL= index.php");
        }
        ?>

    </section>


    <!-- JavaScript do Bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

<!-- Rodapé -->
<footer class="footer fixed-bottom bg-dark text-light text-center">
    <div class="col-md-12">
        <ul class="nav justify-content-center mt-3">
            <li>
                <a class="text-muted mr-5" href="index.php">Listagem de Áreas</a>
            </li>
            <li>
                <a class="text-muted" href="lista-automoveis.php">Listagem de Automóveis</a>
            </li>
            <li>
                <a class="text-muted ml-5" href="vende-automoveis.php">Venda de Automóveis</a>
            </li>
        </ul>
    </div>
    <hr class="bg-secondary mb-2">
    <div class="container mb-2">
        <span class="text-muted">Criado por Carlos Gabriel dos Santos Modesto &copy; 2023 | Versão 1.0</span>
    </div>
</footer>
</html>