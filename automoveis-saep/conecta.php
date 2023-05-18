<?php

//Define o padrao de caracteres das páginas.
header("content-type: text/html; chartset=utf-8");

//Variáveis conexão com banco de dados.
$host = "localhost";
$user = "root";
$password = "root";
$database = "automoveis_db";

//Comando de conexão com o banco de dados MySQL.
$conectaBD = mysqli_connect($host, $user, $password, $database);

  //Retorna o código do erro de conexão com a base de dados.
  if (!$conectaBD) {
    print("Falha na conexão com a base de dados... Código do erro: " . mysqli_connect_errno());
  }

  //Define o padrao de caracteres do banco de dados.
  mysqli_set_charset($conectaBD, "utf8");
?>