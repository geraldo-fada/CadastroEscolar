<?php require_once "../templates/headerTemplate.php" ?>

      <h1>Cadastro de provas</h1>

      <form id="cadProva" method="post" onsubmit="cadProva(); return false;" action="">

        <!-- CPF -->
        <div class="form-input">
          <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
          <input type="text" name="cpf" maxlength="11" pattern=".{11}" title="No mínimo 11 caracteres" required="true" placeholder="CPF do dono da prova">
        </div>

        <!-- PROCURAR QUESTAO -->
        <div class="form-input">
          <i class="fa fa-search" aria-hidden="true"></i>
          <input type="text" name="nome_questao" maxlength="50" placeholder="Pesquisar questao"
          onblur="validaCampo('input', 'nome_questao', '#query_validate_check', 'cadastroProvaControllerUpdater');">
        </div>
        <div id="query_validate_check"></div>

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
