// Funções genericas
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
}

function validaCampo(tipo_do_campo ,campo_a_validar ,campo_wrapper, arquivo_php) {
    var campo = $(tipo_do_campo + "[name='"+ campo_a_validar +"']").val();

    if (campo !== "") {
        var wrapper = $(campo_wrapper);
        var xmlreq = CriaRequest();

        xmlreq.open("POST", "../controllers/updaters/"+ arquivo_php +".php", true);

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

        $("#query_validate_check").css({"display": "inline-block"});
        xmlreq.send(campo_a_validar + "=" + campo);
    }

}

function consultarCampo(nome_updater) {
    var pesquisa = $("input[name='pesquisa']").val();
    var campo = $("select[name='campo']").val();

    var wrapper = $("#query_validate_check");
    var xmlreq = CriaRequest();

    xmlreq.open("POST", "../controllers/updaters/consulta" + nome_updater + "ControllerUpdater.php", true);

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

    wrapper.css({"display": "inline-block"});
    xmlreq.send("pesquisa=" + pesquisa + "&campo=" + campo);
}

function deletaCampo(pk, controller) {
    var resposta = confirm("Você realmente deseja continuar?")

    if (resposta === true) {
        var wrapper = $("#resultado_query");
        var xmlreq = CriaRequest();

        xmlreq.open("POST", "../controllers/"+ controller +".php", true);

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

        xmlreq.send("pk=" + pk);
    }


}

// Professores
function cadProfessor() {
    var form = document.getElementById('cadProfessor');

    var nome = $("input[name='nome']").val();
    var idade = $("input[name='idade']").val();
    var cpf = $("input[name='cpf']").val();
    var turma = $("select[name='turma']").val();
    var disciplina = $("select[name='disciplina']").val();

    form.reset();

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

    $("#query_validate_check").css({"display": "none"});
    xmlreq.send("nome=" + nome + "&idade=" + idade + "&cpf=" + cpf + "&turma=" + turma + "&disciplina=" + disciplina);
}

function editaProfessor() {
    var form = document.getElementById('editarProfessor');

    var nome = $("input[name='nome']").val();
    var idade = $("input[name='idade']").val();
    var cpf = $("input[name='cpf']").val();
    var turma = $("select[name='turma']").val();
    var disciplina = $("select[name='disciplina']").val();

    form.reset();

    var wrapper = $("#resultado_query");
    var xmlreq = CriaRequest();

    xmlreq.open("POST", "../controllers/editarProfessorController.php", true);

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

    $("#query_validate_check").css({"display": "none"});
    xmlreq.send("nome=" + nome + "&idade=" + idade + "&cpf=" + cpf + "&turma=" + turma + "&disciplina=" + disciplina);
}

// Questões
function cadQuestao() {
    var form = document.getElementById('cadQuestao');

    var nome = $("input[name='nome']").val();
    var corpo = $("textarea[name='corpo']").val();
    var disciplina = $("select[name='disciplina']").val();
    var dificuldade = $("select[name='dificuldade']").val();
    var ano = $("select[name='ano']").val();

    form.reset();

    var wrapper = $("#resultado_query");
    var xmlreq = CriaRequest();

    xmlreq.open("POST", "../controllers/cadastroQuestaoController.php", true);

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

    $("#query_validate_check").css({"display": "none"});
    xmlreq.send("nome=" + nome + "&corpo=" + corpo + "&disciplina=" + disciplina + "&dificuldade=" + dificuldade + "&ano=" + ano);

}

// Provas
function cadProva() {
    var form = document.getElementById('cadProva');
    var cpf = $("input[name='cpf']").val();
    var disciplina = $("select[name='disciplina']").val();
    var questoes = [];

    $('#questoes_adicionadas li').each(function() {
        questoes.push($(this).text());
    });

    form.reset();

    var wrapper = $("#resultado_query");
    var xmlreq = CriaRequest();

    xmlreq.open("POST", "../controllers/cadastroProvaController.php", true);

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

    $("#query_validate_check").css({"display": "none"});
    $("#questoes_adicionadas ul").empty();
    $("#questoes_adicionadas").css({"display": "none"});
    xmlreq.send("cpf=" + cpf + "&questoes=" + questoes + "&disciplina=" + disciplina);

}

function getQuestaoProva() {
    var nome_questao = $("input[name='nome_questao']").val();
    var disciplina = $("select[name='disciplina']").val();
    var dificuldade = $("select[name='dificuldade']").val();
    var ano = $("select[name='ano']").val();


    if (nome_questao !== "" && disciplina !== "") {
        var wrapper = $("#query_table");
        var xmlreq = CriaRequest();

        xmlreq.open("POST", "../controllers/updaters/cadastroProvaControllerUpdater.php", true);

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

        $("#query_validate_check").css({"display": "inline-block"});
        xmlreq.send("nome_questao=" + nome_questao + "&disciplina=" + disciplina + "&dificuldade=" + dificuldade + "&ano=" + ano);
    }
}

// Turmas
function cadTurma() {
    var form = document.getElementById('cadTurma');

    var turma = $("input[name='turma']").val();

    form.reset();

    var wrapper = $("#resultado_query");
    var xmlreq = CriaRequest();

    xmlreq.open("POST", "../controllers/cadastroTurmaController.php", true);

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

    $("#query_validate_check").css({"display": "none"});
    xmlreq.send("turma=" + turma);

}

// Disciplinas
function cadDisciplina() {
    var form = document.getElementById('cadDisciplina');

    var disciplina = $("input[name='disciplina']").val();

    form.reset();

    var wrapper = $("#resultado_query");
    var xmlreq = CriaRequest();

    xmlreq.open("POST", "../controllers/cadastroDisciplinaController.php", true);

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

    $("#query_validate_check").css({"display": "none"});
    xmlreq.send("disciplina=" + disciplina);

}
