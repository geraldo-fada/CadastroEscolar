<?php
  require_once 'dbController.php';

  if(isset($_POST["id_prova"])) {
    $id_prova = utf8_decode($_POST["id_prova"]);

    $provas_check = $con->query("SELECT * FROM provas_questoes WHERE prova_id = '" . $id_prova . "' ");
    if ($provas_check->rowCount() < 1) {
      echo "<div class='msg-erro'>
            Essa prova não existe!
            <i class='fa fa-times' aria-hidden='true' onclick=\"this.parentElement.style.display='none';\"></i>
            </div>";
    }
    else {
      try {
        $provas = $con->query("SELECT provas.id, provas.professor_cpf, provas.disciplina_nome, questoes.nome, questoes.corpo " .
                              "FROM provas, provas_questoes, questoes " .
                              "WHERE provas_questoes.prova_id = provas.id AND provas_questoes.questao_nome = questoes.nome AND provas.id = " . $id_prova . " ");

      }
      catch(PDOException $e) {
        echo "Error: " . $e;
      }
    }

  }
  else {
    echo "<p>Por favor, complete todos os campos!</p>";
  }
