<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS do Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- CSS personalizado  -->
    <link rel="stylesheet" href="style.css">
    <title>Listagem de Áreas</title>
</head>

<body class="bg-light">

    <!-- Cabeçalho   -->
    <header>
        <div class="bg-dark shadow p-2 d-flex align-items-center">
            <a href="index.php">
                <img src="img/logo3-rent-a-car.png" alt="Logo" width="170" class="ml-4">
            </a>
            <h1 class="text-uppercase text-center text-white flex-fill mr-4">Pátio de Automóveis - <span class="text-warning">Listagens de Áreas</span> </h1>
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
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive">
                    <table class="table table-striped text-center text-uppercase shadow">
                        <thead class="bg-dark">
                            <tr>
                                <th scope="col" class="text-white">Área</th>
                                <th scope="col" class="text-white">Disponibilidade</th>
                                <th scope="col" class="text-white">Ações</th>
                            </tr>
                        </thead>
                        <thbody>
                            <?php
                            //Inclusão do arquivo de conexão com o banco de dados.
                            include("conecta.php");

                            //Instrução que busca os dados no banco de dados.
                            $SQL = "SELECT area, COUNT(quantidade) AS quantidade FROM alocacao GROUP BY area;";

                            //Executa a instrução de consulta no banco de dados.
                            $consulta = mysqli_query($conectaBD, $SQL);

                            //Contador.
                            $contador = 1;

                            //Cria as 11 linhas referente as 11 áreas.
                            while ($contador <= 11) {

                                //Variável de controle do que será exibido.
                                $controle = false;

                                //Laço de repetição que apresenta o conteúdo do banco de dados.
                                while ($automovel = mysqli_fetch_assoc($consulta)) {

                                    //Apresenta o conteúdo quando existe retorno do banco de dados.
                                    if ($automovel["area"] == $contador) {
                            ?>
                                        <tr>
                                            <td class="bg-success opacity-75 text-center align-middle"><?php print("Área " . $automovel["area"]); ?></td>
                                            <td class="text-center align-middle"><?php print($automovel["quantidade"]); ?></td>
                                            <td class="text-center align-middle"><a class="btn btn-success" href="lista-automoveis.php?area=<?php print($automovel["area"]); ?>">Visualizar</a></td>
                                        </tr>
                                    <?php

                                        //Marca o controle como TRUE para informar que achou o que procurava.
                                        $controle = true;
                                        break;
                                    }
                                }

                                //Apresenta o conteúdo que não retornou do banco de dados.
                                if ($controle == false) {
                                    ?>
                                    <tr>
                                        <td class="bg-danger text-center align-middle"><?php print("Área " . $contador); ?></td>
                                        <td class="text-center align-middle">0</td>
                                        <td class="text-center align-middle"><a class="btn btn-dark disabled" href="lista-automoveis.php?area=<?php print($automovel["area"]); ?>">Visualizar</a></td>
                                    </tr>
                            <?php
                                }

                                $contador = $contador + 1;
                                mysqli_data_seek($consulta, 0);
                            }
                            ?>
                        </thbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript personalizado  -->
    <script src="script.js"></script>
    <!-- JavaScript do Bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

<!--Gambiarra - Sorry!-->
<br><br><br><br><br><br><br><br>


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