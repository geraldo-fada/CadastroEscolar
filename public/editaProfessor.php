<?php require_once "../controllers/dbController.php";
      require_once "../templates/headerTemplate.php"; ?>

      <h1>Editar professor</h1>

      <form id="editarProfessor" method="post" onsubmit="editaProfessor(); return false;" action="">

         <!-- NOME -->
         <div class="form-input">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" name="nome" maxlength="255" required="true" placeholder="Nome" size="70">
         </div>

         <!-- IDADE -->
         <div class="form-input">
            <i class="fa fa-birthday-cake" aria-hidden="true"></i>
            <input type="text" name="idade" maxlength="3" required="true" placeholder="Idade" size="10">
         </div>

         <!-- CPF -->
         <div class="form-input">
            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
            <input type="text" name="cpf" value="<?php if (isset($_GET['cpf'])) echo $_GET['cpf']; else echo "Error!"; ?>" required="true" placeholder="CPF"
             readonly="true" />
         </div>

         <br>

         <!-- TURMA -->
         <div class="form-input">
            <i class="fa fa-users" aria-hidden="true"></i>
            <select name="turma">
               <?php
               $turmas = $con->query("SELECT * FROM turmas");
               foreach($turmas as $turma) {
                  echo "<option>" . utf8_encode($turma[0]) . "</option>";
               }
               ?>
            </select>
         </div>

         <!-- DISCIPLINA -->
         <div class="form-input">
            <i class="fa fa-book" aria-hidden="true"></i>
            <select name="disciplina">
               <?php
               $disciplinas = $con->query("SELECT * FROM disciplinas");
               foreach($disciplinas as $disciplina) {
                  echo "<option>" . utf8_encode($disciplina[0]) . "</option>";
               }
               ?>
            </select>
         </div>

         <br>

         <!-- CADASTRO -->
         <input type="submit" name="cadastrar" value="Editar">

      </form>

      <div id="resultado_query"></div>

<?php require_once "../templates/footerTemplate.php" ?>
