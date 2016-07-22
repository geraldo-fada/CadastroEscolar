<?php require_once "../templates/headerTemplate.php"; ?>

      <h1>Cadastro de questões</h1>

      <form id="cadQuestao" method="post" onsubmit="cadQuestao(); return false;" action="">

        <!-- NOME -->
        <div class="form-input">
          <i class="fa fa-file" aria-hidden="true"></i>
          <input type="text" name="nome" maxlength="50" required="true" placeholder="Nome da questão"
          onblur="validaCampo('nome', '#query_validate_check', 'cadastroQuestaoControllerUpdater');">
          <div id="query_validate_check"></div>
        </div>

        <br>

        <!-- CORPO -->
        <div class="form-input">
          <textarea name="corpo" rows="15" cols="80" required="true" placeholder="Corpo da questão"></textarea>
        </div>

        <br>

        <!-- CADASTRO -->
        <input type="submit" name="cadastrar" value="Cadastrar">

      </form>

      <div id="resultado_query"></div>

<?php require_once "../templates/footerTemplate.php" ?>
