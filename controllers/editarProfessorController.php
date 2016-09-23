<?php
   require_once 'dbController.php';

   if(isset($_POST["nome"]) && isset($_POST["idade"]) && isset($_POST["cpf"]) && isset($_POST["turma"]) && isset($_POST["disciplina"])) {
      $nome = utf8_decode($_POST["nome"]);
      $idade = utf8_decode($_POST["idade"]);
      $cpf = utf8_decode($_POST["cpf"]);
      $turma = utf8_decode($_POST["turma"]);
      $disciplina = utf8_decode($_POST["disciplina"]);

      try {
         $con->query("UPDATE professores SET cpf='" . $cpf . "', nome='" . $nome . "', idade='" . $idade . "' WHERE cpf='" . $cpf . "';
                      UPDATE professores_disciplinas SET professor_cpf='" . $cpf . "', disciplina_nome='" . $disciplina . "' WHERE professor_cpf='" . $cpf . "';
                      UPDATE professores_turmas SET professor_cpf='" . $cpf . "', turma_nome='" . $turma . "' WHERE professor_cpf='" . $cpf . "'; ");

         echo "<div class='msg-sucesso'>
                <a href='consultaProfessor.php'><i class=\"fa fa-arrow-left\" aria-hidden=\"true\" style='margin: 0 20px 0 0;'></i></a>
                Professor editado com sucesso!
              </div>";
      }
      catch (PDOException $e) {
            echo "Error: " . $e;
      }

   }
   else {
      echo "<p>Por favor, complete todos os campos!</p>";
   }
