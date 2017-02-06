<?php

/* ************************* SESSÃO PESSOA FISICA ************************** */
//if($_SESSION['type_user'] == 'pf'){

  $router->get('session-pf','PagesController@userPessoaFisica');
  $router->get('logout','PagesController@logout');




  $router->post('up-tel','PagesController@updateTelefone');
  $router->post('up-doc','PagesController@updateDocumentoPf');
  $router->post('up-cnpj','PagesController@updateDocumentoPj');
  $router->post('up-address','PagesController@updateAddress');
  $router->post('up-password','PagesController@updatePassword');
  $router->post('add-telefone','PagesController@addTelefone');

//} else if($_SESSION['type_user'] == 'pj'){
  $router->get('session-pj','PagesController@userPessoaJuridica');
  $router->get('logout','PagesController@logout');
//} else if($_SESSION['type_user'] == 'tlm') {
  $router->get('list','PagesController@listagemTelemarketing');
  $router->get('list-pdf','PagesController@listarPdf');
  $router->get('session-pj','PagesController@userPessoaJuridica');
  $router->get('logout','PagesController@logout');
//} else if($_SESSION['type_user'] == 'admin'){
  $router->get('admin','PagesController@userAdmin');
  $router->post('admin-status','PagesController@update');
  $router->get('pessoa-f','PagesController@pessoaFisica');
  $router->get('pessoa-j','PagesController@pessoaJuridica');
  $router->get('logout','PagesController@logout');
//} else {
    $router->get('','PagesController@home');
    $router->get('pessoa-fisica','PagesController@page_form_pessoafisica');
    $router->get('pessoa-juridica','PagesController@page_form_pessoajuridica');
    $router->get('login','PagesController@page_form_login');

    $router->post('cadastro-pf','PagesController@cadastroPessoaFisica');
    $router->post('cadastro-pj','PagesController@cadastroPessoaJuridica');
    $router->post('logar','PagesController@logar');

//}
/* ************************************************************************* */
