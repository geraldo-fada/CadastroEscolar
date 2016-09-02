<?php require_once "../templates/headerTemplate.php"; ?>

      <h1>Gerar provas</h1>

      <form id="consProva" method="post" onsubmit="geraProva(); return false;" action="">

        <!-- PESQUISAR POR -->
        <div class="form-input">
          <i class="fa fa-search" aria-hidden="true"></i>
          <!-- INPUT -->
          <input type="text" name="pesquisa" maxlength="11"
          placeholder="Pesquisar por..." size="50"
          onblur="consultarCampo('Prova');">

          <select name="campo">
            <option value="professor_cpf">CPF</option>
            <option value="tudo">Tudo</option>
          </select>
        </div>
        <div id="query_validate_check"></div>

        <br>

        <!-- ID DA PROVA -->
        <div class="form-input">
          <i class="fa fa-file-text-o" aria-hidden="true"></i>
          <input type="text" name="id_prova" maxlength="11" required="true" size="10" placeholder="Id da prova">

          <!-- GERAR PROVA -->
          <input type="submit" name="gerar" value="Gerar Prova" style="margin-left: 5px;">
        </div>

      </form>

<?php require_once "../templates/footerTemplate.php" ?>
