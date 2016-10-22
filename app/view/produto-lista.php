<?php include 'cabecalho.php'; ?>
<?php  require_once 'app/model/banco-produto.php'; ?>

<!-- <p class="alert-sucess">Produto apagado com sucesso</p> -->
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
          <form method="post">
            <input type="hidden" name="param" value="<?=$empresa['id_telemarketing']?>">
            <button class="btn btn-danger btn-xs">REMOVER</button>
          </form>
        </td>
        <td>
          <form method="post">
            <input type="hidden" name="param" value="<?=$empresa['id_telemarketing']?>">
            <button class="<?php if($empresa['ativa']==1){ echo 'btn btn-danger btn-xs'; echo '">Ativar';}else {echo 'btn ativar btn-xs'; echo '">Desativar';}?></button>
          </form>
        </td>
    </tr>
<?php
}
?>
</tbody>
</table>
<?php include 'rodape.php'?>
