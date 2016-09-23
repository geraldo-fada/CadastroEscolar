<?php
  require_once '../dbController.php';

  if(isset($_POST["pesquisa"]) && isset($_POST["campo"])) {
    $pesquisa = utf8_decode($_POST["pesquisa"]);
    $campo = utf8_decode($_POST["campo"]);

    try {
      $professores = $con->query("SELECT professores.cpf, nome, idade, turma_nome, disciplina_nome " .
                                 "FROM professores, professores_turmas, professores_disciplinas " .
                                 "WHERE " . $campo . " LIKE '" . $pesquisa . "%' " .
                                 "AND professores.cpf = professores_turmas.professor_cpf " .
                                 "AND professores.cpf = professores_disciplinas.professor_cpf ");

      echo "<table>
              <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Turma</th>
                <th>Disciplina</th>
                <th>Ações</th>
              </tr>";
                foreach($professores as $professor) {
                  echo "<tr>";
                  echo "<td>" . utf8_encode($professor[0]) . "</td>";
                  echo "<td>" . utf8_encode($professor[1]) . "</td>";
                  echo "<td>" . utf8_encode($professor[2]) . "</td>";
                  echo "<td>" . utf8_encode($professor[3]) . "</td>";
                  echo "<td>" . utf8_encode($professor[4]) . "</td>";
                  echo "<td>
                          <a href='editaProfessor.php?cpf=" . utf8_encode($professor[0]) . "'><i class='fa fa-pencil' aria-hidden='true'></i></a>
                          <i class='fa fa-trash' aria-hidden='true' onclick='deletaCampo(\"" . utf8_encode($professor[0]) . "\", \"deletaProfessorController\");'></i>
                        </td>";
                  echo "</tr>";
                }
      echo "</table>";
    }
    catch(PDOException $e) {
      echo "Error: " . $e;
    }
  }
