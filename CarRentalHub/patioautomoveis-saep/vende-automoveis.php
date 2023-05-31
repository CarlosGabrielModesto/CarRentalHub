<?php
//Inclusao do arquivo de conexão com o BD
include("conecta.php");
//Recupera o ID e a area via método GET.
$idAutomovel = $_GET["id"];
$area = $_GET["area"];
?>

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

    <!-- Cabeçalho  -->
    <header>
        <div class="bg-dark shadow p-2 d-flex align-items-center">
            <a href="index.php">
                <img src="img/logo3-rent-a-car.png" alt="Logo" width="170" class="ml-4">
            </a>
            <h1 class="text-uppercase text-center text-white flex-fill mr-4">Pátio de Automóveis - <span class="text-warning">Venda de Automóveis</span> </h1>
            <button class="btn btn-warning mr-4" onclick="alterarClasseBody()">Alterar tema</button>
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
        <form action="processa-venda.php" method="post" class="col-8 shadow mb-5 bg-body rounded p-3 ">
            <input type="hidden" value="<?php print($idAutomovel); ?>" name="automovel" />

            <?php
            //Consulta que carrega os dados do automóvel
            $SQLAutomovel = "SELECT modelo FROM automoveis WHERE id = '$idAutomovel';";

            //Executa a instrução de consulta do banco de dados
            $consultaAutomovel = mysqli_query($conectaBD, $SQLAutomovel);

            //cria um vetor com os dados do modelo de automóvel.
            $automovel = mysqli_fetch_assoc($consultaAutomovel);
            ?>

            <h2 class="d-flex justify-content-center"><?php print($automovel["modelo"]); ?></h2>
            <div class="form-group">
                <label>Cliente</label>
                <select name=cliente class="form-control" name="">
                    <?php
                    //Instrução que busca os dados no banco de dados
                    $SQLCliente = "SELECT id, nome FROM clientes;";

                    //Executa a instrução de consulta do banco de dados
                    $consultaCliente = mysqli_query($conectaBD, $SQLCliente);

                    //Exibe todos os retornos da consulta do banco de dados.
                    while ($cliente = mysqli_fetch_assoc($consultaCliente)) {
                    ?>
                        <option value="<?php print($cliente["id"]) ?>"><?php print($cliente["nome"]) ?></option>
                    <?php
                    }

                    // Fecha a conexão com o banco de dados
                    mysqli_close($connect);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Concessionária</label>
                <select class="form-control" name="concessionaria">
                    <?php
                    //Instrução que busca os dados no banco de dados
                    $SQLConcessionaria = "SELECT concessionaria FROM alocacao WHERE area = '$area' AND automovel = '$idAutomovel';";

                    //Executa a instrução de consulta do banco de dados
                    $consultaConcessionaria = mysqli_query($conectaBD, $SQLConcessionaria);

                    //Carrega os dados da consulta em um vetor
                    $concessionaria = mysqli_fetch_assoc($consultaConcessionaria);

                    //Grava o ID da concessionaria em uma variável
                    $idConcessionaria = $concessionaria["concessionaria"];

                    //Instrução que busca os dados no banco de dados
                    $SQLNomeCS = "SELECT concessionaria FROM concessionarias WHERE id = '$idConcessionaria';";

                    //Executa a instrução de consulta do banco de dados
                    $consultaNomeCS = mysqli_query($conectaBD, $SQLNomeCS);

                    //Exibe todos os retornos da consulta do banco de dados.
                    while ($nomeCS = mysqli_fetch_assoc($consultaNomeCS)) {
                    ?>
                        <option value="<?php print($idConcessionaria); ?>"><?php print($nomeCS["concessionaria"]) ?></option>
                    <?php
                    }
                    ?>
                </select>

            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-info mt-3">Vender Automóvel</button>
            </div>

        </form>


    </section>

    <!-- JavaScript personalizado  -->
    <script src="script.js"></script>
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
        <span class="text-muted">Criado por Carlos Gabriel dos Santos Modesto &copy; 2023 | Versão 1.1</span>
    </div>
</footer>

</html>