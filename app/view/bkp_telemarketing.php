<?php
      $PESSOA = ($telemarketing)? '<ul class="list-inline"><li><a href="session-pj">Meus Dados</a></li><li><a href="list">Listagem</a></li></ul>' : '<ul class="list-inline"><li><a href="">Pessoa Juridica</a></li></ul>';
      $HOME = '<a class="navbar-brand" href="">Procon Paraiba</a>';
      //$PESSOA = '<ul class="list-inline"><li><a href="">Pessoa Juridica</a></li></ul>';
      $LOGIN = '<li><a href="">Bem vindo</a></li>
                <ul class="list-inline">
                  <li><a href="logout">Sair</a></li>
                </ul>';
?>
<?php include_once 'app/view/partlals/header.php' ?>
<legend>Telemarketing</legend>
<table class="table table-striped table-bordered btn-primary">
      <?php if($telemarketing['status_ativo'] == 0) { ?>
          No momento você não está habilitado para receber a listagem de bloqueio. Aguarde a liberação.
      <?php } else { ?>
          <h4>Listagem:</h4>
          <thead>
            <tr>
              <th>
                <p>NOME</p>
              </th>
              <th>
                <p>CPF/CNPJ</p>
              </th>
              <th>
                <p>TELEFONE</p>
              </th>
            </tr>
          </thead>
        <?php  foreach ($listagemPf as $key) { ?>
            <tr style="color:#000">
                <td><?=$key['nome'] ?></td>
                <td><?=$key['cpf']?><td>
                <?=$key['telefone_numero'] ?>
            </tr>
      <?php } foreach ($listagemPj as $key) { ?>
          <tr style="color:#000">
              <td><?=$key['nome'] ?></td>
              <td><?=$key['cnpj']?><td>
              <?=$key['telefone_numero'] ?>
          </tr>
    <?php }
    } ?>
</table>
<?php include_once ('app/view/partlals/footer.php') ?>
