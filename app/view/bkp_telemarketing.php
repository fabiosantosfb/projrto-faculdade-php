<?php
    $PESSOA = ($telemarketing)? '
    <a class="nav-item" href="session-pj">
        <span>Meus Dados</span>
    </a>
    <a class="nav-item" href="list">
        <span>Listagem</span>
    </a>
    <a class="nav-item" href="">
        <span>Pessoa Jurídica</span>
    </a>
    ';

      $HOME = '
      <a class="nav-item" href="">
        <span>Home</span>
      </a>';

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
