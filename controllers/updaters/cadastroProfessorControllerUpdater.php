<?php
  require_once '../dbController.php';

  if(isset($_POST["cpf"])) {
    $cpf = utf8_decode($_POST["cpf"]);

    try {
      $cpfs = $con->query("SELECT cpf FROM professores WHERE cpf = '" . $cpf . "' ");

      if($cpfs->rowCount() == 0 && strlen($cpf) > 10) {
        echo "<i class='fa fa-check msg-sucesso' aria-hidden='true'></i><p class='msg-sucesso'>Cpf disponível!</p>";
      }
      elseif(strlen($cpf) > 10) {
        echo "<i class='fa fa-times msg-erro' aria-hidden='true'></i><p class='msg-erro'>Cpf já em uso!</p>";
      }
      else {
        echo "";
      }

      unset($cpfs);
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }
  }
