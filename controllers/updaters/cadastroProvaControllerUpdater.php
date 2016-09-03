<?php
  require_once '../dbController.php';

  if(isset($_POST["nome_questao"]) && isset($_POST["disciplina"])) {
    $nome_questao = utf8_decode($_POST["nome_questao"]);
    $disciplina = utf8_decode($_POST["disciplina"]);

    try {
      $questoes = $con->query("SELECT disciplina_nome, nome, corpo FROM questoes WHERE nome LIKE '" . $nome_questao . "%' AND disciplina_nome = '" . $disciplina . "' ");

      echo "<table>
              <tr>
                <th>Disciplina</th>
                <th>Questão</th>
                <th>Enunciado</th>
                <th><i class='fa fa-check' aria-hidden='true'></i></th>
              </tr>";
                foreach($questoes as $questao) {
                  echo "<tr>";
                  echo "<td>" . utf8_encode($questao[0]) . "</td>";
                  echo "<td>" . utf8_encode($questao[1]) . "</td>";
                  echo "<td>" . utf8_encode($questao[2]) . "</td>";
                  echo "<td><i class='fa fa-plus table-check' aria-hidden='true'onclick='addQuestao(this);'></i></td>";
                  echo "</tr>";
                }
      echo "</table>";
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }
  }
