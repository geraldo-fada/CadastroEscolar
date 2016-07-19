<!-- Parte fixa do header que é chamada em todas as páginas -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" lang="pt_BR">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Escolar</title>

    <link rel="stylesheet" href="../assets/css/font-awesome-4.6.3/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700" media="screen" title="no title" charset="utf-8">

    <link rel="stylesheet" href="../assets/css/normalize.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../assets/css/main.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <nav>
      <ul>
        <li id="nav-logo"><i class="fa fa-bookmark" aria-hidden="true"></i><h1>Portal dos Professores</h1></li>

        <!-- INICIO -->
        <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a></li>

        <!-- PROFESSORES -->
        <li class="nav-dropdown-btn">
          <a href="#"><i class="fa fa-user" aria-hidden="true"></i>Professores</a>
          <ul class="nav-dropdown">
            <li><a href="cadastroProfessor.php"><i class="fa fa-pencil" aria-hidden="true"></i>Cadastrar</a></li>
            <li><a href="consultaProfessor.php"><i class="fa fa-search" aria-hidden="true"></i>Consultar</a></li>
          </ul>
        </li>

        <!-- PROVAS -->
        <li class="nav-dropdown-btn">
          <a href="#"><i class="fa fa-file-text" aria-hidden="true"></i>Provas</a>
          <ul class="nav-dropdown">
            <li><a href="cadastroProva.php"><i class="fa fa-pencil" aria-hidden="true"></i>Cadastrar</a></li>
            <li><a href="geraProva.php"><i class="fa fa-upload" aria-hidden="true"></i>Gerar prova</a></li>
          </ul>
        </li>

      </ul>
    </nav>

    <main>
