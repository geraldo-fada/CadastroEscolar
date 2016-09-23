<?php
   require_once 'dbController.php';

   if (isset($_POST['pk'])) {
      $cpf = utf8_decode($_POST['pk']);

      try {
         $con->query("DELETE FROM professores WHERE cpf='" . $cpf . "'");

         echo "<div class='msg-sucesso'>
                Professor removido com sucesso!
                <i class='fa fa-times' aria-hidden='true' onclick=\"this.parentElement.style.display='none';\"></i>
              </div>";
      }
      catch (PDOException $e) {
         echo "Error: " . $e;
      }

   }
   else {
      echo "<p>Por favor, complete todos os campos!</p>";
   }