<?php

$router->get('','PagesController@home');
$router->get('pessoa-fisica','PagesController@page_form_pessoafisica');
$router->get('pessoa-juridica','PagesController@page_form_pessoajuridica');
$router->get('login','PagesController@page_form_login');
$router->get('logout','PagesController@logout');

$router->get('session-pf','PagesController@userPessoaFisica');
$router->get('session-pj','PagesController@userPessoaJuridica');
$router->get('admin','PagesController@userAdmin');

$router->get('pessoa-f','PagesController@pessoaFisica');
$router->get('pessoa-j','PagesController@pessoaJuridica');

$router->post('cadastro-pf','PagesController@cadastroPessoaFisica');
$router->post('cadastro-pj','PagesController@cadastroPessoaJuridica');
$router->post('logar','PagesController@logar');
$router->post('admin-status','PagesController@update');
