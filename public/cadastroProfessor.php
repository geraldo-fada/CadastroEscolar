<?php require_once "../templates/headerTemplate.php" ?>

      <h1>Cadastro de professores</h1>

      <form method="post">

        <div class="form-input">
          <i class="fa fa-user" aria-hidden="true"></i>
          <input type="text" name="nome" value="" maxlength="255" required="true" placeholder="Nome" size="70">
        </div>

        <div class="form-input">
          <i class="fa fa-birthday-cake" aria-hidden="true"></i>
          <input type="text" name="idade" value="" maxlength="3" required="true" placeholder="Idade" size="10">
        </div>

        <div class="form-input">
          <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
          <input type="text" name="cpf" value="" maxlength="11" required="true" placeholder="CPF">
        </div>

        <br>

        <div class="form-input">
          <i class="fa fa-users" aria-hidden="true"></i>
          <select>
            <option value="turma1">turma1</option>
            <option value="turma2">turma2</option>
            <option value="turma3">turma3</option>
            <option value="turma4">turma4</option>
          </select>
        </div>

        <div class="form-input">
          <i class="fa fa-book" aria-hidden="true"></i>
          <select>
            <option value="materia1">materia1</option>
            <option value="materia2">materia2</option>
            <option value="materia3">materia3</option>
            <option value="materia4">materia4</option>
          </select>
        </div>

        <br>

        <input type="submit" name="cadastrar" value="Cadastrar">

      </form>

<?php require_once "../templates/footerTemplate.php" ?>
