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

  //Evitar de adicionar questões iguais!
  $('#questoes_adicionadas li').each(function () {
    // if ($(this).text() != prova) {
    //   $('#questoes_adicionadas ul').append("<li>"+prova+"</li>");
    // }
  });

}
