<?php
  require_once 'dbController.php';

  if(isset($_POST["cpf"]) && isset($_POST["questoes"])) {
    $cpf = utf8_decode($_POST["cpf"]);
    $questoes = $_POST["questoes"];

    try {
      $con->query("INSERT INTO provas (professor_cpf, disciplina_nome) VALUES ('" . $cpf . "', 'Matemática');");

      foreach($questoes as $questao) {
        echo $questao;
        $con->query("INSERT INTO provas_questoes VALUES (LAST_INSERT_ID(), '" . utf8_decode($questao) . "');");
      }

      echo "<div class='msg-sucesso'>
              Prova cadastrada com sucesso!
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
