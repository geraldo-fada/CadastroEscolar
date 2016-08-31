<?php require_once "../templates/headerTemplate.php" ?>

      <h1>Cadastro de turmas</h1>

      <form id="cadTurma" method="post" onsubmit="cadTurma(); return false;" action="">

        <!-- CPF -->
        <div class="form-input">
          <i class="fa fa-users" aria-hidden="true"></i>
          <input type="text" name="turma" maxlength="6" required="true" placeholder="Nome da turma"
          onblur="validaCampo('input', 'turma', '#query_validate_check', 'cadastroTurmaControllerUpdater');">
          <div id="query_validate_check"></div>
        </div>

        <br>

        <!-- CADASTRO -->
        <input type="submit" name="cadastrar" value="Cadastrar">

      </form>

      <div id="resultado_query"></div>

<?php require_once "../templates/footerTemplate.php" ?>
