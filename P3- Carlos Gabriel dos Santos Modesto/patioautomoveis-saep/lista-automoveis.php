    <?php
    //Inclusao do arquivo de conexão com o BD
    include("conecta.php");
    //Recupera a area via método GET.
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
        <title>Listagem de Automóveis</title>
    </head>

    <body class="bg-light">

        <!-- Cabeçalho   -->
        <header>
            <div class="bg-dark shadow p-2 d-flex align-items-center">
                <a href="index.php">
                    <img src="img/logo3-rent-a-car.png" alt="Logo" width="170" class="ml-4">
                </a>
                <h1 class="text-uppercase text-center text-white flex-fill mr-4">Pátio de Automóveis - <span class="text-warning">Listagem de Automóveis</span> </h1>
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
        <section class="container">

            <h2 class="subtitulo">Área <?php print($area); ?></h2>

            <table class="table table-striped text-center text-uppercase shadow">
                <thead>
                    <tr class="bg-dark">
                        <th scope="col" class="text-white">Modelo</th>
                        <th scope="col" class="text-white">Fabricante</th>
                        <th scope="col" class="text-white">Ano</th>
                        <th scope="col" class="text-white">Preço</th>
                        <th scope="col" class="text-white">Quantidade</th>
                        <th scope="col" class="text-white">Açoes</th>
                    </tr>
                </thead>
                <thbody>

                    <?php
                    //Instrução que busca os dados no banco de dados
                    $SQL = "SELECT automovel, quantidade FROM alocacao WHERE area = '$area';";

                    //Executa a instrução de consulta do banco de dados
                    $consulta = mysqli_query($conectaBD, $SQL);

                    //Exibe todos os retornos da consulta do banco de dados.
                    while ($automovel = mysqli_fetch_assoc($consulta)) {

                        //guarda o ID do automóvel em uma variável
                        $id = $automovel["automovel"];
                        $quantidade = $automovel["quantidade"];

                        //Consulta que carrega os dados do automóvel
                        $SQLModelo = "SELECT modelo, fabricante, ano, preco FROM automoveis WHERE id = '$id';";

                        //Executa a instrução de consulta do banco de dados
                        $consultaModelo = mysqli_query($conectaBD, $SQLModelo);

                        //cria um vetor com os dados do modelo de automóvel.
                        $modelo = mysqli_fetch_assoc($consultaModelo);


                        if($quantidade > 0){
                    ?>
                        <tr>
                            <td class="font-weight-bold"><?php print($modelo["modelo"]); ?></td>
                            <td><?php print($modelo["fabricante"]); ?></td>
                            <td><?php print($modelo["ano"]); ?></td>
                            <td><?php print($modelo["preco"]); ?></td>
                            <td><?php print($quantidade); ?></td>
                            <td><a class="btn btn-info" href="vende-automoveis.php?id=<?php print($id); ?>&area=<?php print($area); ?>">Vender</a></td>
                        </tr>
                    <?php
                    }
                }
                    ?>

                </thbody>
            </table>
        </section>

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
            <span class="text-muted">Criado por Carlos Gabriel dos Santos Modesto &copy; 2023 | Versão 1.0</span>
        </div>
    </footer>

    </html>