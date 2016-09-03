<?php
  require_once 'dbController.php';

  if(isset($_POST["nome"]) && isset($_POST["corpo"]) && isset($_POST["disciplina"])) {
    $nome = utf8_decode($_POST["nome"]);
    $corpo = utf8_decode($_POST["corpo"]);
    $disciplina = utf8_decode($_POST["disciplina"]);

    $questoes = $con->query("SELECT * FROM questoes WHERE nome = '" . $nome . "' ");
    if ($questoes->rowCount() > 0) {
      echo "<div class='msg-erro'>
            Nome da questão já foi utilizado!
            <i class='fa fa-times' aria-hidden='true' onclick=\"this.parentElement.style.display='none';\"></i>
            </div>";
    }
    else {
      try {
        $con->query("INSERT INTO questoes VALUES ('" . $nome . "', '" . $disciplina . "', '" . $corpo . "' )");

        echo "<div class='msg-sucesso'>
                Questão cadastrada com sucesso!
                <i class='fa fa-times' aria-hidden='true' onclick=\"this.parentElement.style.display='none';\"></i>
              </div>";
      }
      catch(PDOException $e) {
        echo "Error: " . $e;
      }
    }

  }
  else {
    echo "<p>Por favor, complete todos os campos!</p>";
  }
