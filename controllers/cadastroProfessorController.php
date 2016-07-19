<?php
  require_once 'dbController.php';

  if(isset($_POST["nome"]) && isset($_POST["idade"]) && isset($_POST["cpf"]) && isset($_POST["turma"]) && isset($_POST["disciplina"])) {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $cpf = $_POST["cpf"];
    $turma = $_POST["turma"];
    $disciplina = $_POST["disciplina"];

    $con->query("INSERT INTO professores VALUES ('" . $cpf . "', '" . $nome . "', " . $idade . ")");
    $con->query("INSERT INTO professores_disciplinas VALUES ('" . $cpf . "', '" . $disciplina . "')");
    $con->query("INSERT INTO professores_turmas VALUES ('" . $cpf . "', '" . $turma . "')");

    echo "<p>Professor cadastrado com sucesso!</p>";
  }
  else {
    echo "<p>Por favor, complete todos os campos!</p>";
  }
