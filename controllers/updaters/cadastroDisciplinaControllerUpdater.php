<?php
  require_once '../dbController.php';

  if(isset($_POST["disciplina"])) {
    $disciplina = utf8_decode($_POST["disciplina"]);

    try {
      $disciplinas = $con->query("SELECT nome FROM disciplinas WHERE nome = '" . $disciplina . "' ");

      if($disciplinas->rowCount() == 0) {
        echo "<i class='fa fa-check msg-sucesso' aria-hidden='true'></i><p class='msg-sucesso'>Disciplina disponível!</p>";
      }
      elseif($disciplinas->rowCount() > 0) {
        echo "<i class='fa fa-times msg-erro' aria-hidden='true'></i><p class='msg-erro'>Disciplina já existente!</p>";
      }
      else {
        echo "";
      }

      unset($disciplinas);
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }
  }
