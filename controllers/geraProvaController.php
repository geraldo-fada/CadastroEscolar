<?php
   require_once 'dbController.php';
   require_once '../vendor/autoload.php';

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
            $provas = $con->query("SELECT professores.nome, provas.disciplina_nome, questoes.corpo " .
               "FROM provas, provas_questoes, questoes, professores " .
               "WHERE provas_questoes.prova_id = provas.id AND provas_questoes.questao_nome = questoes.nome AND professores.cpf = provas.professor_cpf " .
               "AND provas.id = " . $id_prova . " ");

            $html = "<div class=\"cabecalho\">
   
                     <div class=\"info\">
                       <h4>Colégio Pedro II</h4>
                       <p>
                         <b>Professor(a):</b>__________________________________________________________<b>Matéria:</b>______________________<b>Série:</b>_____
                       </p>
                       <p>
                         <b>Aluno(a):</b>_______________________________________________________________ <b>Nº:</b>___ <b>Turma:</b>_________ <b>Data:</b>__/__/____
                       </p>
                     </div>
   
                   </div>";

            $count = 1;
            foreach ($provas as $prova) {
               $html .= "<div class='questao'>
                         <p class='questao_num'>Questão " . $count . ")</p>
                         <p class=\"corpo\">" . utf8_encode($prova[2]) . "</p>
                       </div>";
               $count++;
            }

            $mpdf = new mPDF();
            $mpdf->SetDisplayMode('fullpage');
            $css = file_get_contents("../assets/css/prova_gerada.css");
            $mpdf->WriteHTML($css, 1);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();

         }
         catch(PDOException $e) {
            echo "Error: " . $e;
         }

      }
   }
   else {
      echo "Por favor, retorne a página de gerar provas";
   }
