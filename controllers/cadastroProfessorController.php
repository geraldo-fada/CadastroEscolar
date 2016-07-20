<?php
  require_once 'dbController.php';

  if(isset($_POST["nome"]) && isset($_POST["idade"]) && isset($_POST["cpf"]) && isset($_POST["turma"]) && isset($_POST["disciplina"])) {
    $nome = utf8_decode($_POST["nome"]);
    $idade = utf8_decode($_POST["idade"]);
    $cpf = utf8_decode($_POST["cpf"]);
    $turma = utf8_decode($_POST["turma"]);
    $disciplina = utf8_decode($_POST["disciplina"]);

    $con->query("INSERT INTO professores VALUES ('" . $cpf . "', '" . $nome . "', " . $idade . ")");
    $con->query("INSERT INTO professores_disciplinas VALUES ('" . $cpf . "', '" . $disciplina . "')");
    $con->query("INSERT INTO professores_turmas VALUES ('" . $cpf . "', '" . $turma . "')");

    echo "<p>Professor cadastrado com sucesso!</p>";
  }
  else {
    echo "<p>Por favor, complete todos os campos!</p>";
  }
