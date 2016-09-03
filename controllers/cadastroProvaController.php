<?php
  require_once 'dbController.php';

  if(isset($_POST["cpf"]) && isset($_POST["questoes"]) && isset($_POST["disciplina"])) {
    $cpf = utf8_decode($_POST["cpf"]);
    $disciplina = utf8_decode($_POST["disciplina"]);

    $cpfs = $con->query("SELECT * FROM professores WHERE cpf='" . $cpf . "' ");

    if (empty($_POST["questoes"])) {
      echo "<div class='msg-erro'>
            Por favor, adicione questões a prova!
            <i class='fa fa-times' aria-hidden='true' onclick=\"this.parentElement.style.display='none';\"></i>
            </div>";
    }
    elseif ($cpfs->rowCount() == 0) {
      echo "<div class='msg-erro'>
            CPF não pertencente a um professor!
            <i class='fa fa-times' aria-hidden='true' onclick=\"this.parentElement.style.display='none';\"></i>
            </div>";
    }
    else {
      try {
        $questoes = explode(",", $_POST["questoes"]);

        $con->query("INSERT INTO provas (professor_cpf, disciplina_nome) VALUES ('" . $cpf . "', '" . $disciplina . "')");

        foreach($questoes as $questao) {
          $con->query("INSERT INTO provas_questoes VALUES (LAST_INSERT_ID(), '" . utf8_decode($questao) . "')");
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
  }
  else {
    echo "<p>Por favor, complete todos os campos!</p>";
  }
