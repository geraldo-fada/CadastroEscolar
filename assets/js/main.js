$(document).ready(function() {
  //Faz o dropdown do navbar
  $('.nav-dropdown-btn').click(function() {
    $(this).children('.nav-dropdown').slideToggle();
  });

  //Checa a url e adiciona a classe .nav-active a página atual
  var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
  $('nav a').each(function() {
    if ($(this).attr('href') === pgurl || $(this).attr('href') === '') {
      $(this).addClass('nav-active').closest('.nav-dropdown').css('display', 'block');
    }
  });

});

function addQuestao(id) {
  prova = $(id).parent().parent().find('td:eq(1)').text();
  $('#questoes_adicionadas').slideDown();
  var questoesul = $('#questoes_adicionadas ul');
  var questoesli = $('#questoes_adicionadas li');

  if (questoesli.length) {
    var count = 0;
    questoesli.each(function () {
      if ($(this).text() == prova) {
        count++;
      }
    });
    if (count === 0) {
      questoesul.append("<li>"+prova+"</li>");
    }
  }
  else {
    questoesul.append("<li>"+prova+"</li>");
  }

}
