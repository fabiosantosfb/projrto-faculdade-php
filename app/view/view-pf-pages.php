<?php
    $HOME = '
    <a class="nav-item" href="">
      <span class="icon"><i class="fa fa-home"></i></span>
      <span>Início</span>
    </a>';

    $PESSOA = '
    <a class="nav-item" href="">
        <span class="icon"><i class="fa fa-user"></i></span>
        <span>Pessoa Física</span>
    </a>
    ';

    $LOGIN = '
    <a class="nav-item" href="">Bem Vindo</a>
    <a class="button is-primary" href="logout">
      <span class="icon">
        <i class="fa fa-sign-out"></i>
      </span>
      <span>SAIR</span>
    </a>';

?>
<?php include_once 'app/view/partlals/header.php' ?>
<script src="app/assets/js/np-procon-pb-pf.js" charset="utf-8"></script>
<script src="app/assets/js/update-form-pf.js" charset="utf-8"></script>
<label>Dados - Pessoa Física</label>

<form>
  <input name="type" type="hidden" value="pf">
<table class="table table-striped table-bordered btn-primary">
<thead>
  <tr>
    <th>
      <p>CPF</p>
    </th>
    <th>
    <th>
      <p>Nome</p>
    </th>
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><input id="cpf" name="cpf" value="<?= $pessoa['cpf']?>" style="border:0;"></td>
        <td></td>
        <td><input id="nome" name="nome" value="<?= $pessoa['nome'] ?>" style="border:0;"></td>
    </tr>
</tbody>
</table>
<table class="table table-striped table-bordered btn-primary">
<thead>
  <tr>
    <th>
      <p>RG</p>
    </th>
    <th>
    <th>
      <p>ORGÃO EMISSOR</p>
    </th>
    <th>
    <th>
      <p>UF</p>
    </th>
    <th>
    <th>
      <p>DATA EXPEDIÇÃO</p>
    </th>
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><input id="rg" name="rg" value="<?=$pessoa['rg'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="orgao_expedidor" name="orgao_expedidor" value="<?=$pessoa['org'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="uf" name="uf" value="<?=$pessoa['uf'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="dataexpedicao" name="dataexpedicao" value="<?=$pessoa['data_expedicao'] ?>" style="border:0;"></td>
    </tr>
</tbody>
</table>
  <div class="row">
    <div class="col-md-9">
        <button id="update-doc" name="update-doc" onclick='updateDocument(<?=$pessoa['usuario_id_usuario'] ?>)'; class="btn btn-success">Atualizar</button>
    </div>
  </div>
</form>
<br><legend></legend>
<label>Dados - Endereço</label>
<form>
<table class="table table-striped table-bordered btn-primary">
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
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><input id="cep" name="cep" value="<?=$endereco['cep'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="rua" name="rua" value="<?=$endereco['rua'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="bairro" name="bairro" value="<?=$endereco['bairro'] ?>" style="border:0;"></td>
    </tr>
  </tbody>
</table>
<table class="table table-striped table-bordered btn-primary">
<thead>
  <tr>
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
        <td><input id="cidade" name="cidade" value="<?=$endereco['cidade'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="numero" name="numero" value="<?=$endereco['numero'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="complemento" name="complemento" value="<?=$endereco['complemento'] ?>" style="border:0;"></td>
    </tr>
  </tbody>
</table>
<div class="row">
  <div class="col-md-9">
      <button id="button1id" name="button1id" onclick="updateEndereco(<?=$pessoa['usuario_id_usuario'] ?>)"; class="btn btn-success">Atualizar</button>
  </div>
</div>
</form>
<br><legend></legend>
<label>Dados - Telefone</label>

<table class="table table-striped table-bordered btn-primary">
<thead>
<tr>
  <th>
    <p>TELEFONE</p>
  </th>
  <th>
  <th>
    <p>DATA CADASTRO</p>
  </th>
</tr>
</thead>
<form method="post">
  <tbody>
    <tr style="color:#000">
      <td><input id="telefone" name="telefone" value="<?=$telefone['telefone_numero'] ?>" style="border:0;"></td>
      <td></td>
      <td><?=$telefone['data_cadastro'] ?></td>
    </tr>
  </tbody>
</table>
<div class="row">
  <div class="col-md-9">
      <input onclick="updateTelefone(<?=$pessoa['usuario_id_usuario'] ?>)"; class="btn btn-success" value="Atualizar"/>
      <button onclick="addTelefone(<?=$pessoa['usuario_id_usuario'] ?>)"; class="btn btn-success">Add</button>
  </div>
</div>
</form>
<br><legend></legend>
  <label>Dados login</label>
<form>
  <table class="table table-striped table-bordered btn-primary">
  <thead>
  <tr>
    <th>
      <p>EMAIL</p>
    </th>
    <th>
    <th>
      <p>SENHA</p>
    </th>
    <th>
    <th>
      <p>CONFIRMA SENHA</p>
    </th>
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><input id="email" name="email"  value="<?=$usuario['email'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="senha" name="senha" type="password" value="*******" style="border:0;"></td>
        <td></td>
        <td><input id="repetir_senha" name="repetir_senha" type="password" value="*******" style="border:0;"></td>
    </tr>
  </tbody>
</table>
<div class="row">
  <div class="col-md-9">
    <button id="button1id" name="button1id" onclick="updateLogin(<?=$pessoa['usuario_id_usuario'] ?>)"; class="btn btn-success">Atualizar</button>
  </div>
</div>
</form>
<?php include_once ('app/view/partlals/footer.php') ?>
