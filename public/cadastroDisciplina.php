<?php require_once "../templates/headerTemplate.php" ?>

      <h1>Cadastro de disciplinas</h1>

      <form id="cadDisciplina" method="post" onsubmit="cadDisciplina(); return false;" action="">

        <!-- CPF -->
        <div class="form-input">
          <i class="fa fa-book" aria-hidden="true"></i>
          <input type="text" name="disciplina" maxlength="10" required="true" placeholder="Nome da disciplina"
          onblur="validaCampo('input', 'disciplina', '#query_validate_check', 'cadastroDisciplinaControllerUpdater');">
          <div id="query_validate_check"></div>
        </div>

        <br>

        <!-- CADASTRO -->
        <input type="submit" name="cadastrar" value="Cadastrar">

      </form>

      <div id="resultado_query"></div>

<?php require_once "../templates/footerTemplate.php" ?>
