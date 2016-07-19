function CriaRequest() {
   try {
      request = new XMLHttpRequest();
   }
   catch (IEAtual) {
      try {
         request = new ActiveXObject("Msxml2.XMLHTTP");
      }
      catch(IEAntigo) {
         try {
            request = new ActiveXObject("Microsoft.XMLHTTP");
         }
         catch(falha) {
            request = false;
         }
      }
   }
   if (!request)
      alert("Seu navegador não suporta Ajax, por favor faça atualização do navegador.");
   else
      return request;
};

function getControllerPessoa(controller, id_div) {
  var nome = $("input[name='nome_search']").val();
  var wrapper = $("#"+ id_div);
  var xmlreq = CriaRequest();

  xmlreq.open("GET", "../controllers/controller"+ controller +".php?nome_search=" + nome, true);

  xmlreq.onreadystatechange = function() {
    if (xmlreq.readyState == 4) {
      if (xmlreq.status == 200) {
        wrapper.html(xmlreq.responseText);
      }
      else {
        wrapper.html("Erro: " + xmlreq.statusText);
      }
    }
  };

  xmlreq.send(null);
};

function cadProfessor() {
  var nome = $("input[name='nome']").val();
  var idade = $("input[name='idade']").val();
  var cpf = $("input[name='cpf']").val();
  var turma = $("select[name='turma']").val();
  var disciplina = $("select[name='disciplina']").val();

  console.log(nome);

  var wrapper = $("#resultado_query");
  var xmlreq = CriaRequest();

  xmlreq.open("POST", "../controllers/cadastroProfessorController.php", true);

  xmlreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xmlreq.onreadystatechange = function() {
    if (xmlreq.readyState == 4) {
      if (xmlreq.status == 200) {
        wrapper.html(xmlreq.responseText);
      }
      else {
        wrapper.html("Erro: " + xmlreq.statusText);
      }
    }
  };

  xmlreq.send("nome=" + nome + "&idade=" + idade + "&cpf=" + cpf + "&turma=" + turma + "&disciplina=" + disciplina);

};
