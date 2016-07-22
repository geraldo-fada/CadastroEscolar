<?php
  require_once '../dbController.php';

  if(isset($_POST["nome"])) {
    $nome = utf8_decode($_POST["nome"]);

    try {
      $nomes = $con->query("SELECT nome FROM questoes WHERE nome = '" . $nome . "' ");

      if($nomes->rowCount() == 0) {
        echo "<i class='fa fa-check msg-sucesso' aria-hidden='true'></i><p class='msg-sucesso'>Nome disponível!</p>";
      }
      elseif($nomes->rowCount() > 0) {
        echo "<i class='fa fa-times msg-erro' aria-hidden='true'></i><p class='msg-erro'>Nome já em uso!</p>";
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
