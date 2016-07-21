<?php
  require_once 'dbController.php';

  if(isset($_POST["nome"]) && isset($_POST["corpo"])) {
    $nome = utf8_decode($_POST["nome"]);
    $corpo = utf8_decode($_POST["corpo"]);

    try {
      $con->query("INSERT INTO questoes (nome, corpo) VALUES ('" . $nome . "', '" . $corpo . "' )");

      echo "<div class='msg-sucesso'>
              Questão cadastrado com sucesso!
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
