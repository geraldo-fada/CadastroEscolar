<?php
  require_once 'dbController.php';

  if(isset($_POST["nome"]) && isset($_POST["idade"]) && isset($_POST["cpf"]) && isset($_POST["turma"]) && isset($_POST["disciplina"])) {
    $nome = utf8_decode($_POST["nome"]);
    $idade = utf8_decode($_POST["idade"]);
    $cpf = utf8_decode($_POST["cpf"]);
    $turma = utf8_decode($_POST["turma"]);
    $disciplina = utf8_decode($_POST["disciplina"]);

    try {
      $con->query("INSERT INTO professores VALUES ('" . $cpf . "', '" . $nome . "', '" . $idade . "');
                   INSERT INTO professores_disciplinas VALUES ('" . $cpf . "', '" . $disciplina . "');
                   INSERT INTO professores_turmas VALUES ('" . $cpf . "', '" . $turma . "')" );

      echo "<div class='msg-sucesso'>
              Professor cadastrado com sucesso!
              <i class='fa fa-times' aria-hidden='true' onclick=\"this.parentElement.style.display='none';\"></i>
            </div>";
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }

  }
  else {
    echo "<p>Por favor, complete todos os campos!</p>";
  }
