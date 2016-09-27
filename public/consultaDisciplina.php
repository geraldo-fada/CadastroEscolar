<?php require_once "../templates/headerTemplate.php"; ?>

   <h1>Consultar disciplinas</h1>

   <form id="consDisciplina" method="post" action="">

      <!-- PESQUISAR POR -->
      <div class="form-input">
         <i class="fa fa-search" aria-hidden="true"></i>
         <!-- INPUT -->
         <input type="text" name="pesquisa" maxlength="10" placeholder="Pesquisar por..." size="50" />

         <select name="campo">
            <option value="nome">Nome</option>
            <option value="tudo">Tudo</option>
         </select>

         <input type="button" value="Pesquisar" onclick="consultarCampo('Disciplina');" />
      </div>
      <div id="query_validate_check"></div>
      <div id="resultado_query"></div>

   </form>

<?php require_once "../templates/footerTemplate.php" ?>
