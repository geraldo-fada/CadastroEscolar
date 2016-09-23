<?php
  require_once '../dbController.php';

  if(isset($_POST["pesquisa"]) && isset($_POST["campo"])) {
    $pesquisa = utf8_decode($_POST["pesquisa"]);
    $campo = utf8_decode($_POST["campo"]);

    try {
      if ($campo == "tudo") {
        $turmas = $con->query("SELECT * FROM turmas ");
      }
      else {
        $turmas = $con->query("SELECT * FROM turmas WHERE " . $campo . " LIKE '" . $pesquisa . "%' ");
      }

      echo "<table>
              <tr>
                <th>Nome</th>
                <th>Ações</th>
              </tr>";
                foreach($turmas as $turma) {
                  echo "<tr>";
                  echo "<td>" . utf8_encode($turma[0]) . "</td>";
                  echo "<td>
                          <i class='fa fa-trash' aria-hidden='true' onclick='deletaCampo(\"" . utf8_encode($turma[0]) . "\", \"deletaTurmaController\")'></i>
                        </td>";
                  echo "</tr>";
                }
      echo "</table>";
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }
  }
