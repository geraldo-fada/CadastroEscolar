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
      alert("Seu Navegador não suporta Ajax!");
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

function cadPessoa() {
  var nome = $("input[name='nome']").val();
  var idade = $("input[name='idade']").val();
  var telcel = $("input[name='telcel']").val();
  var telres = $("input[name='telres']").val();

  var wrapper = $("#resultado_query");
  var xmlreq = CriaRequest();

  xmlreq.open("POST", "../controllers/controllerCadastro.php", true);

  //FIXME: erro aqui, não descobri ainda o que é....
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

  xmlreq.send("nome=" + nome + "&idade=" + idade + "&telcel=" + telcel + "&telres=" + telres);

};
