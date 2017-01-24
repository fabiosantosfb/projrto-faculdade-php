<?php
      $HOME = '<a class="navbar-brand" href="">Procon Paraiba</a>';
      $PESSOA = '<ul class="list-inline"><li><a href="">Pessoa Fisica</a></li></ul>';
      $LOGIN = '<li><a href="">Bem vindo</a></li><ul class="list-inline"><li><a href="logout">Sair</a></li></ul>';
?>
<?php include_once 'app/view/partlals/header.php' ?>
<legend>Dados - Pessoa Física</legend>
<div class="row">
  <div class="col-md-9">
    <form>
      <input type="hidden" name="usuario" value="<?= $pessoa['usuario_id_usuario'];?>">
        <button id="button1id" name="button1id" onclick="addTelefone()"; class="btn btn-success">Adicionar Telefone</button>
    </form>
  </div>
</div>
<form method="post" action="update">
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
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?= $pessoa['cpf']?>" style="border:0;"></td>
        <td></td>
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?= $pessoa['nome'] ?>" style="border:0;"></td>
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
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$pessoa['rg'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$pessoa['org'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$pessoa['uf'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$pessoa['data_expedicao'] ?>" style="border:0;"></td>
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
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$endereco['cep'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$endereco['rua'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$endereco['bairro'] ?>" style="border:0;"></td>
    </tr>
  </tbody>
</table>
<table class="table table-striped table-bordered btn-primary">
<!--<legend>Dados - Endereço</legend>-->
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
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$endereco['cidade'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$endereco['numero'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$endereco['complemento'] ?>" style="border:0;"></td>

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
</tr>
</thead>
  <tbody>
    <tr style="color:#000">
      <td><input id="demo" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="<?=$telefone['telefone_numero'] ?>" style="border:0;"></td>
      <td></td>
      <td><?=$telefone['data_cadastro'] ?></td>
    </tr>
  </tbody>
</table>
<table class="table table-striped table-bordered btn-primary">
  <ledend>

    <input type="checkbox" name="telemarketing"> Editar login?

</legend>
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
        <td><input id="demo" onclick="myFunction('<?=$usuario['id_usuario'] ?>')"; value="<?=$usuario['email'] ?>" style="border:0;"></td>
        <td></td>
        <td><input id="demo" type="password" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="*******" style="border:0;"></td>
        <td></td>
        <td><input id="demo" type="password" onclick="myFunction('<?=$pessoa['usuario_id_usuario'] ?>')"; value="*******" style="border:0;"></td>
    </tr>
  </tbody>
</table>
<div class="row">
  <div class="col-md-9">
    <input type="hidden" name="usuario" value="<?= $pessoa['usuario_id_usuario'];?>">
    <button id="button1id" name="button1id" class="btn btn-success">Atualizar</button>
  </div>
</div>
</form>
<script>
  function myFunction(id) {
    alert(id);
  }
  function addTelefone(){
    var telefone = prompt('Digite um telefone!');
    alert('Seu telefone é ' + telefone);
  }
</script>
<?php include_once ('app/view/partlals/footer.php') ?>
