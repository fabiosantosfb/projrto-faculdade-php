<?php

  if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'pj') {
    $router->get('session-pj','PagesController@redirection');
    $router->get('logar','PagesController@redirection');
    $router->get('','PagesController@redirection');
  }

  if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'tlm') {
    $router->get('session-pj','PagesController@redirection');
    $router->get('list','PagesController@listagemTelemarketing');
    $router->get('list-relatorio-browser','PagesController@listarRelatorio');
    $router->post('list-relatorio','PagesController@listarRelatorio');
    $router->get('logar','PagesController@redirection');
    $router->get('','PagesController@redirection');
  }

  if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'pf') {
    $router->get('session-pf','PagesController@redirection');
    $router->get('logar','PagesController@redirection');
    $router->get('','PagesController@redirection');
  }

  if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'admin') {
    $router->post('admin-status','PagesController@update');
    $router->post('search','PagesController@search');
    $router->get('pessoa-f','PagesController@pessoaFisica');
    $router->get('pessoa-j','PagesController@pessoaJuridica');
    $router->get('admin','PagesController@redirection');
    $router->get('','PagesController@redirection');
  }

  if(!isset($_SESSION['type_user']) && empty($_SESSION['type_user'])) {
    $router->get('','PagesController@home');
    $router->get('pessoa-fisica','PagesController@page_form_pessoafisica');
    $router->get('pessoa-juridica','PagesController@page_form_pessoajuridica');
    $router->get('login','PagesController@page_form_login');

    $router->get('recuperar-pwd','PagesController@page_form_recuperar_pwd');
    $router->get('redirect','PagesController@linkRecuperarPwd');
  }
  $router->post('recuperar','PagesController@recuperarPwd');

  $router->post('cadastro-pf','PagesController@cadastroPessoaFisica');
  $router->post('cadastro-pj','PagesController@cadastroPessoaJuridica');
  $router->post('logar','PagesController@logar');
  $router->post('logar_reCAPTCHA','PagesController@logar_reCAPTCHA');

  $router->get('logout','PagesController@logout');

  $router->post('up-tel','PagesController@updateTelefone');
  $router->post('up-doc','PagesController@updateDocumentoPf');
  $router->post('up-cnpj','PagesController@updateDocumentoPj');
  $router->post('up-address','PagesController@updateAddress');
  $router->post('up-password','PagesController@updatePassword');
  $router->post('redefinir-password','PagesController@redefinirPassword');
  $router->post('add-telefone','PagesController@addTelefone');

  $router->post('validate','PagesController@ValidateExisting');
