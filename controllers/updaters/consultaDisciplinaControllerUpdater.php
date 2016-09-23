<?php
  require_once '../dbController.php';

  if(isset($_POST["pesquisa"]) && isset($_POST["campo"])) {
    $pesquisa = utf8_decode($_POST["pesquisa"]);
    $campo = utf8_decode($_POST["campo"]);

    try {
      if ($campo == "tudo") {
        $disciplinas = $con->query("SELECT * FROM disciplinas ");
      }
      else {
        $disciplinas = $con->query("SELECT * FROM disciplinas WHERE " . $campo . " LIKE '" . $pesquisa . "%' ");
      }

      echo "<table>
              <tr>
                <th>Nome</th>
                <th>Ações</th>
              </tr>";
                foreach($disciplinas as $disciplina) {
                  echo "<tr>";
                  echo "<td>" . utf8_encode($disciplina[0]) . "</td>";
                  echo "<td>
                          <i class='fa fa-trash' aria-hidden='true' onclick='deletaCampo(\"" . utf8_encode($disciplina[0]) . "\", \"deletaDisciplinaController\")'></i>
                        </td>";
                  echo "</tr>";
                }
      echo "</table>";
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }
  }
