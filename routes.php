<?php

if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'pj') {
	/**
	 * @var \App\Core\Router $router
	 */
	$router->get('session-pj','PagesController@redirection');
	$router->get('logar','PagesController@redirection');
	$router->get('','PagesController@redirection');

	$router->get('logout','PagesController@logout');

	$router->post('up-tel','PagesController@updateTelefone');
	$router->post('del-tel','PagesController@deleteTelefone');
	$router->post('up-doc','PagesController@updateDocumentoPf');
	$router->post('up-cnpj','PagesController@updateDocumentoPj');
	$router->post('up-address','PagesController@updateAddress');
	$router->post('up-password','PagesController@updatePassword');
	$router->post('redefinir-password','PagesController@redefinirPassword');
	$router->post('add-telefone','PagesController@addTelefone');

	$router->post('validate','PagesController@ValidateExisting');

}

if(!isset($_SESSION['type_user']) && empty($_SESSION['type_user'])) {
	/**
	 * @var \App\Core\Router $router
	 */
	$router->get('','PagesController@home');
	$router->post('cadastro-pj','PagesController@cadastroPessoaJuridica');

	$router->get('pessoa-juridica','PagesController@page_form_pessoajuridica');
	$router->post('autenticar-user','PagesController@logar');
	$router->get('login','PagesController@page_form_login');
}


