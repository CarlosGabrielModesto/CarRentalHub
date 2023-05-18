<?php
//inclusao do arquivo de conexao do bd
include("conecta.php");

//recupera o id e a area via metodo get
$idAutomovel = $_GET["id"];
$area = $_GET["area"];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Vender Automóveis</title>
</head>

<body>
    <!--Cabeçalho-->
    <header class="col- 2 p-5 bg-dark">
        <img src="..." class="rounded float-start" alt="...">
        <h1 class="text-uppercase text-center text-light"><i>Pátio de Automóveis - <span class="text-info"> Venda de Automóveis</span></i></h1><br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Listagem de Áreas</a></li>
                <li class="breadcrumb-item"><a href="lista-automoveis.php">Listagem de Automóveis</a></li>
                <li class="breadcrumb-item"><a href="vende-automoveis.php">Venda de Automóveis</a></li>
            </ol>
        </nav>
    </header>

    <!--Conteúdo do Website-->
    <section class="container ">

        <?php
        //consulta que carrega os dados do automoveis
        $SQLAutomovel = "SELECT modelo FROM automoveis WHERE id = '$idAutomovel';";

        //executa a instrucao de consulta no banco de dados. 
        $consultaAutomovel = mysqli_query($conectaBD, $SQLAutomovel);

        //cria um vetor, c/ os dados do modelo de automovel
        $automovel = mysqli_fetch_assoc($consultaAutomovel);
        ?>

        <h2 class="text-center"><?php print($automovel["modelo"]); ?></h2>
        <form class="col-9 shadow p-3 mb-5 bg-body rounded ">
            <div class="form-group">
                <label>Cliente</label>
                <select class="form-control" name="">
                    <?php
                    //inclusao do arquivo de conexao do bd
                    include("conecta.php");

                    //intrucao que busca os dados no bd
                    $SQLCliente = "SELECT id, nome FROM clientes ;";

                    //executa a instrucao de consulta no banco de dados. 
                    $consultaCliente = mysqli_query($conectaBD, $SQLCliente);

                    // exibe todos os retornos da consulta do banco de dados
                    while ($cliente = mysqli_fetch_assoc($consultaCliente)) {
                        ?>
                             <option value="<?php print($cliente["id"])?>"><?php print($cliente["nome"])?></option>
                             <?php
                             }
                             ?>
                </select>
            </div>
            <div class="form-group">
                <label>Concessionária</label>
                <select class="form-control" name="">
                <?php
                    //intrucao que busca os dados no bd
                    $SQLConcessionaria = "SELECT concessionaria FROM alocacao WHERE area = '$area' AND automovel = '$idAutomovel';";

                    //executa a instrucao de consulta no banco de dados. 
                    $consultaConcessionaria = mysqli_query($conectaBD, $SQLConcessionaria);

                             //carrega os dados da consulta em um vetor
                    $concessionaria= mysqli_fetch_assoc($consultaConcessionaria);

                    //gravar o id da concessionaria em uma variavel
                    $idConcessionaria = $concessionaria["concessionaria"];

                     //intrucao que busca os dados no bd
                     $SQLNomeCS = "SELECT concessionaria FROM concessionarias WHERE id = '$idConcessionaria';";
 
                    //executa a instrucao de consulta no banco de dados. 
                    $consultaNomeCS = mysqli_query($conectaBD, $SQLNomeCS);

                    // exibe todos os retornos da consulta do banco de dados
                    while ($nomeCS= mysqli_fetch_assoc($consultaNomeCS)) {
                        ?>
                             <option value="<?php print($idConcessionaria);?>"><?php print($nomeCS["concessionaria"]);?></option>
                             <?php
                             }
                             ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Vender Automóvel</button>
            </div>
        </form>


    </section>



    <!-- JavaScript do Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>