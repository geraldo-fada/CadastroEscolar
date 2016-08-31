<?php
  require_once 'dbController.php';

  if(isset($_POST["turma"])) {
    $turma = utf8_decode($_POST["turma"]);

    try {
      $con->query("INSERT INTO turmas VALUES ('" . $turma . "')");

      echo "<div class='msg-sucesso'>
              Turma cadastrada com sucesso!
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
