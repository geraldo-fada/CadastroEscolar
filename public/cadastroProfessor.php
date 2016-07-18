<?php require_once "../templates/headerTemplate.php" ?>

      <h1>Cadastro de professores</h1>

      <form method="post">

        CPF:
        <br><input type="text" name="cpf" value="" maxlength="11" required="true">
        Turma:
        <select>
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="mercedes">Mercedes</option>
          <option value="audi">Audi</option>
        </select>
        Disciplina:
        <select>
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="mercedes">Mercedes</option>
          <option value="audi">Audi</option>
        </select><br><br>

        Nome:
        <br><input type="text" name="nome" value="" maxlength="255" required="true"><br><br>
        Idade:
        <br><input type="text" name="idade" value="" maxlength="3" required="true">

        <br><br><input type="submit" name="cadastrar" value="Cadastrar">

      </form>

<?php require_once "../templates/footerTemplate.php" ?>
