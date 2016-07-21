<?php
  require_once '../dbController.php';

  if(isset($_POST["cpf"])) {
    $cpf = utf8_decode($_POST["cpf"]);

    try {
      $disciplinas = $con->query("SELECT disciplina_nome FROM professores_disciplinas WHERE professor_cpf = '" . $cpf . "' ");

      foreach($disciplinas as $disciplina) {
        echo "<option>" . utf8_encode($disciplina[0]) . "</option>";
      }
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }
  }
