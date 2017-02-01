<?php


    $PESSOA = ($telemarketing)? '
    <a class="nav-item" href="session-pj">
        <span class="icon"><i class="fa fa-info"></i></span>
        <span>Meus Dados</span>
    </a>
    <a class="nav-item" href="list">
        <span class="icon"><i class="fa fa-list"></i></span>
        <span>Listagem</span>
    </a>
    <a class="nav-item" href="">
        <span class="icon"><i class="fa fa-building"></i></span>
        <span>Pessoa Jurídica</span>
    </a>
    ':

      $HOME = '
      <a class="nav-item" href="">
        <span class="icon"><i class="fa fa-home"></i></span>
        <span>Início</span>
      </a>';

      $LOGIN = '
      <a class="nav-item" href="">Bem vindo</a>
      <a class="button is-primary" href="logout">
          <span class="icon">
            <i class="fa fa-sign-out"></i>
          </span>
          <span>SAIR</span>
      </a>';
?>
<?php include_once 'app/view/partlals/header.php' ?>
<table class="table table-striped table-bordered btn-primary">
<legend>Dados - Pessoa Jurídica</legend>
<thead>
  <tr>
    <th>
      <p>CNPJ</p>
    </th>
    <th>
    <th>
      <p>RAZÃO SOCIAL</p>
    </th>
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><?=$pessoa['cnpj'] ?></td>
        <td></td>
        <td><?=$pessoa['nome'] ?></td>
    </tr>
</tbody>
</table>
<table class="table table-striped table-bordered btn-primary">
<!--<legend>Dados - Endereço</legend>-->
<thead>
  <tr>
    <th>
      <p>CEP</p>
    </th>
    <th>
    <th>
      <p>RUA</p>
    </th>
    <th>
    <th>
      <p>BAIRRO</p>
    </th>
    <th>
    <th>
      <p>CIDADE</p>
    </th>
    <th>
    <th>
      <p>NUMERO</p>
    </th>
    <th>
    <th>
      <p>COMPLEMENTO</p>
    </th>
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><?=$endereco['cep'] ?></td>
        <td></td>
        <td><?=$endereco['rua'] ?></td>
        <td></td>
        <td><?=$endereco['bairro'] ?></td>
        <td></td>
        <td><?=$endereco['cidade']?></td>
        <td></td>
        <td><?=$endereco['numero'] ?></td>
        <td></td>
        <td><?=$endereco['complemento'] ?></td>
    </tr>
  </tbody>
</table>
<table class="table table-striped table-bordered btn-primary">
<!--<legend>Dados - Telefones Cadastrados para Bloqueio</legend>-->
<thead>
  <tr>
    <th>
      <p>TELEFONE</p>
    </th>
    <th>
    <th>
      <p>DATA CADASTRO</p>
    </th>
      <th>
      <form method="post" action="/?controller=produtos&action=desativar">
        <input type="hidden" name="telefone_numero" value="">
        <button id="button1id" name="button1id" class="btn btn-primary">Adicionar</button>
      </form>
  </tr>
</thead>
<tbody>
  <tr style="color:#000">
    <td ><?=$telefone['telefone_numero'] ?></td>
    <td></td>
    <td><?=$telefone['data_cadastro'] ?></td>
    <td></td>
  </tr>
</tbody>
</table>
<?php include_once ('app/view/partlals/footer.php') ?>
