<?php require_once ('app/view/view-admin/admin-home.php'); ?>

<form class="form-inline" method="post" action="/?controller=produtos&action=search">
  <div class="form-group">
    <input type="txt" class="form-control" id="empresa" name="param" placeholder="Buscar por Id">
  </div>
  <button class="btn btn-primary">Buscar</button>
</form>

<table class="table table-striped table-bordered">
<thead>
  <tr>
    <th>
      <p>ID</p>
    </th>
    <th>
    <th>
      <p>RAZAO SOCIAL</p>
    </th>
    <th>
      <th>
        <p>EMAIL</p>
      </th>
      <th>
        <th>
          <p>ATIVO</p>
        </th>
        <th>
          <th>
            <p>DATA CRIAÇÃO</p>
          </th>
          <th>
      <p>DATA ATUALIZAÇÃO</p>
    </th>
  </tr>
</thead>
<tbody>

<?php
    $t_empresa = listaTelemarketing($conexao);
    foreach ($t_empresa as $empresa) {
?>
    <tr>
        <td><?= $empresa['id_telemarketing'] ?></td>
        <td></td>
        <td><?= $empresa['nome_razao'] ?></td>
        <td></td>
        <td><?= $empresa['email'] ?></td>
        <td></td>
        <td><?= $empresa['ativa'] ?></td>
        <td></td>
        <td><?= $empresa['data_cadastro'] ?></td>
        <td><?= $empresa['data_atualiza'] ?></td>
        <td>
          <form method="post" action="/?controller=produtos&action=remove">
            <input type="hidden" name="id_telemarketing" value="<?=$empresa['id_telemarketing']?>">
          </form>
        </td>
        <td>
          <form method="post" action="<?php if($empresa['ativa']==0) echo '/?controller=produtos&action=ativar'; else echo '/?controller=produtos&action=desativar';?>">
            <input type="hidden" name="id_telemarketing" value="<?=$empresa['id_telemarketing']?>">
            <button class="<?php if($empresa['ativa']==0){ echo 'btn btn-danger btn-xs'; echo '">Ativar';}else {echo 'btn ativar btn-xs'; echo '">Desativar';}?></button>
          </form>
        </td>
    </tr>
<?php
}
?>
</tbody>
</table>
<?php include 'rodape.php'?>
