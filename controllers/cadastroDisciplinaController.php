<?php
  require_once 'dbController.php';

  if(isset($_POST["disciplina"])) {
    $disciplina = utf8_decode($_POST["disciplina"]);

    $disciplinas = $con->query("SELECT * FROM disciplinas WHERE nome = '" . $disciplina . "' ");
    if ($disciplinas->rowCount() > 0) {
      echo "<div class='msg-erro'>
            Disciplina já cadastrada!
            <i class='fa fa-times' aria-hidden='true' onclick=\"this.parentElement.style.display='none';\"></i>
            </div>";
    }
    else {
      try {
        $con->query("INSERT INTO disciplinas VALUES ('" . $disciplina . "')");

        echo "<div class='msg-sucesso'>
                Disciplina cadastrada com sucesso!
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
