<?php
  require_once '../dbController.php';

  if(isset($_POST["turma"])) {
    $turma = utf8_decode($_POST["turma"]);

    try {
      $nomes = $con->query("SELECT nome FROM turmas WHERE nome = '" . $turma . "' ");

      if($nomes->rowCount() == 0) {
        echo "<i class='fa fa-check msg-sucesso' aria-hidden='true'></i><p class='msg-sucesso'>Turma disponível!</p>";
      }
      elseif($nomes->rowCount() > 0) {
        echo "<i class='fa fa-times msg-erro' aria-hidden='true'></i><p class='msg-erro'>Turma já existente!</p>";
      }
      else {
        echo "";
      }

      unset($nomes);
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }
  }
