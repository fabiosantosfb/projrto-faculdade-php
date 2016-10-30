<?php
include_once ('app/model/Telefone.class.php');
include_once ('app/model/Usuario.class.php');
include_once ('app/model/PessoaJuridica.class.php');

    $USER   = Usuario::getInstanceUsuario()->getNome();
    $LOGIN  = "<li><a>Bem Vindo - $USER</a></li><li><a href='/?controller=pages&action=logout'>Sair</a></li>";
    $PESSOA = '<ul class="list-inline"><li><a href="/?controller=pages&action=adminpessoajuridica">Pessoa Jurídica</a></li>
                  <li><a href="/?controller=pages&action=adminpessoafisica">Pessoa Fisica</a></li>
                  <li><a href="/?controller=pages&action=adminTelemarketing">Telemarketing</a></li>
                  <li><a href="/?controller=pages&action=adminAdministrador">Admin</a></li>
              </ul>';
    $HOME   = '<a class="navbar-brand">Painel Administrativo::</a><a style="font-size:14" class="navbar-brand">Procon Paraiba</a>';

    include_once ('app/view/cabecalho.php');?>
