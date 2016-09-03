<?php require_once "../controllers/dbController.php";
      require_once "../templates/headerTemplate.php"; ?>

      <h1>Cadastro de provas</h1>

      <form id="cadProva" method="post" onsubmit="cadProva(); return false;" action="">

        <!-- CPF -->
        <div class="form-input">
          <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
          <input type="text" name="cpf" maxlength="11" pattern=".{11}" title="No mínimo 11 caracteres" required="true" placeholder="CPF do dono da prova"
          onblur="validaCampo('input', 'cpf', '#query_validate_check', 'cadastroProvaCpfControllerUpdater');">
          <div id="query_validate_check"></div>
        </div>

        <br>

        <!-- PROCURAR QUESTAO -->
        <div class="form-input">
          <i class="fa fa-search" aria-hidden="true"></i>
          <input type="text" name="nome_questao" maxlength="50" placeholder="Pesquisar questao"
          onblur="getQuestaoProva();">
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
        <div id="query_table"></div>

        <br>

        <!-- CADASTRO -->
        <input type="submit" name="cadastrar" value="Cadastrar">

      </form>

      <div id="questoes_adicionadas">
        <h4>Questões a serem adicionadas</h4>
        <ul>
        </ul>
      </div>

      <div id="resultado_query"></div>

<?php require_once "../templates/footerTemplate.php" ?>
