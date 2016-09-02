<?php
  require_once '../dbController.php';

  if(isset($_POST["pesquisa"]) && isset($_POST["campo"])) {
    $pesquisa = utf8_decode($_POST["pesquisa"]);
    $campo = utf8_decode($_POST["campo"]);

    try {
      if ($campo == "tudo") {
        $provas = $con->query("SELECT provas.id, professor_cpf, disciplina_nome, questao_nome " .
                              "FROM provas, provas_questoes WHERE provas.id = provas_questoes.prova_id ");
      }
      else {
        $provas = $con->query("SELECT provas.id, professor_cpf, disciplina_nome, questao_nome " .
                              "FROM provas, provas_questoes WHERE provas.id = provas_questoes.prova_id AND " . $campo . " LIKE '" . $pesquisa . "%' ");
      }

      echo "<table>
              <tr>
                <th>Id da prova</th>
                <th>CPF</th>
                <th>Disciplina</th>
                <th>Questão</th>
              </tr>";
                foreach($provas as $prova) {
                  echo "<tr>";
                  echo "<td>" . utf8_encode($prova[0]) . "</td>";
                  echo "<td>" . utf8_encode($prova[1]) . "</td>";
                  echo "<td>" . utf8_encode($prova[2]) . "</td>";
                  echo "<td>" . utf8_encode($prova[3]) . "</td>";
                  echo "</tr>";
                }
      echo "</table>";
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }
  }
