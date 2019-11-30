<?php

namespace App\View\ViwAdmin;

$HOME = '<a class="nav-item is-active" href="admin"><span>Liberação Telemarketing</span></a>';
$PESSOA = '<a class="nav-item" href="pessoa-f"><span>Pessoa Física</span></a><a class="nav-item" href="pessoa-j"><span>Pessoa Jurídica</span></a>';
$LOGIN = '<a class="nav-item" href="logout"><span>SAIR</span></a>';
?>

<?php include_once 'app/view/partlals/header.php' ?>

<script src="app/assets/js/update-form.js" charset="utf-8"></script>
<div class="principal  np-card-1">
    <section class="hero np-padding-20">
        <div class="npTitle">
            <h1 class="title is-4">
                Administração
            </h1>
            <h2 class="subtitle is-6">
                Liberação de Telemarketing
            </h2>
            <hr>

            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image icon is-large" style="height: 40px; width: 40px;">
                                        <i class="fa fa-exclamation-triangle deepskyblue"></i>
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <div class="content">
                                        O processo de liberação serve para o acompanhamento, por parte do usuario, das empresas que procuram receber a listagem.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="title is-6">
                                <strong>Empresas Cadastradas</strong>
                            </p>
                        </div>
                        <div class="panel-block">
							<?php if(count($usuario) > 0) {?>
                                <table id="dataTable" class="display compact dataTable">
                                    <thead>
                                    <tr>
                                        <th>CNPJ</th>
                                        <th>NOME/RAZAO SOCIAL</th>
                                        <th>EMAIL</th>
                                        <th>DATA REGISTRO</th>
                                        <th>STATUS</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Cnpj</th>
                                        <th>Nome/Razão Social</th>
                                        <th>EMAIL</th>
                                        <th>DATA REGISTRO</th>
                                        <th>Status</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <form>
										<?php foreach ($usuario as $key) { ?>
                                            <tr>
                                                <td><?=$key['cnpj'] ?></td>
                                                <td><?=$key['nome'] ?></td>
                                                <td><?=$key['email'] ?></td>
                                                <td><?=date('d/m/Y', strtotime($key['data_cadastro'])) ?></td>
                                                <td>
                                                    <p class="control">
                                                        <label class="checkbox is-medium">
                                                            <input type="checkbox" name="id" id="id" onclick='modifiStatus(<?=$key['id_usuario'] ?>,<?=$key['status_telemarketing'] ?>)'; <?php if($key['status_telemarketing'] == 1) echo "checked='checked'"; ?>  >
                                                            Ativo
                                                        </label>
                                                    </p>
                                                </td>
                                            </tr>
										<?php } ?>
                                    </form>
                                    </tbody>
                                </table>
							<?php } ?>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php include_once ('app/view/partlals/footer.php') ?>
