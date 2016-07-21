<?php require_once "../controllers/dbController.php";
      require_once "../templates/headerTemplate.php"; ?>

      <h1>Cadastro de provas</h1>

      <form id="cadProva" method="post" onsubmit="cadProva(); return false;" action="">

        <!-- CPF -->
        <div class="form-input">
          <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
          <input type="text" name="cpf" maxlength="11" required="true" placeholder="CPF do dono da prova">
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
        <input type="submit" name="cadastrar" value="Cadastrar">

      </form>

      <div id="resultado_query"></div>

<?php require_once "../templates/footerTemplate.php" ?>
