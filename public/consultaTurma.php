<?php require_once "../templates/headerTemplate.php"; ?>

   <h1>Consultar turmas</h1>

   <form id="consTurma" method="post" action="">

      <!-- PESQUISAR POR -->
      <div class="form-input">
         <i class="fa fa-search" aria-hidden="true"></i>
         <!-- INPUT -->
         <input type="text" name="pesquisa" maxlength="6" placeholder="Pesquisar por..." size="50"
                onblur="consultarCampo('Turma');">

         <select name="campo">
            <option value="nome">Nome</option>
            <option value="tudo">Tudo</option>
         </select>
      </div>
      <div id="query_validate_check"></div>
      <div id="resultado_query"></div>

   </form>

<?php require_once "../templates/footerTemplate.php" ?>
