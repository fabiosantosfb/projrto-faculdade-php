<?php
    $HOME = '<a class="navbar-brand" href="admin">Administrador</a>';
    $PESSOA = '<ul class="list-inline"><li><a href="pessoa-f">Pessoa Fisica</a></li><li><a href="pessoa-j">Pessoa Juridica</a></li></ul>';
    $LOGIN = '<li><a href="">Bem vindo</a></li><ul class="list-inline"><li><a href="logout">Sair</a></li></ul>';

    include_once ('app/view/partlals/header.php');
?>
<script src="app/assets/js/update-form.js" charset="utf-8"></script>
<form class="form-inline" method="post" action="/search">
  <div class="form-group">
    <input type="txt" class="form-control" id="empresa" name="param" placeholder="Buscar por Id">
  </div>
  <button class="btn btn-primary">Buscar</button>
</form>
  <?php if(count($listastl) > 0) {?>
  <table class="table table-striped table-bordered btn-primary">
    <legend>Telemarketing</legend>
    <thead>
      <tr>
        <th>
          <p>CNPJ</p>
        </th>
        <th>
        <th>
          <p>NOME</p>
        </th>
        <th>
        <th>
          <p>DATA CADASTRO</p>
        </th>
        <th>
          <th>
          <p>STATUS</p>
        </th>
      </tr>
    </thead>
    <tbody>
      <form>
      <?php foreach ($listastl as $key) { ?>
        <tr style="color:#000">
            <td><?=$key['cnpj'] ?></td>
            <td></td>
            <td><?=$key['nome'] ?></td>
            <td></td>
            <td><?=$key['data_cadastro'] ?></td>
            <td></td>
            <td><input type="checkbox" name="id" id="id" onclick='modifiStatus(<?=$key['pessoa_juridica_usuario_id_usuario'] ?>,<?=$key['status_ativo'] ?>)'; <?php if($key['status_ativo'] == 1) echo "checked='checked'"; ?> ></td>
        </tr>
      <?php } ?>
    </form>
    </tbody>
    </table>
<?php } ?>
<?php include ('app/view/partlals/footer.php');?>
