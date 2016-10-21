<?php include 'cabecalho.php'?>
<?php require_once 'app/model/banco-produto.php'?>
<?php
$produtos = listaProdutos($conexao);
?>
<p class="alert-sucess">Produto apagado com sucesso</p>
<table class="table table-striped table-bordered">
<thead>
  <tr>
    <th>
      <p>NOME</p>
    </th>
    <th>
      <p>PREÇO</p>
    </th>
  </tr>
</thead>
<tbody>

<?php
foreach ($produtos as $produto) {
    ?>
    <tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td>
          <form action="/?controller=produtos&action=remove" method="post">
            <input type="hidden" name="param" value="<?=$produto['id']?>">
            <button class="btn btn-danger btn-xs">REMOVER</button>
          </form>
        </td>
    </tr>
<?php

}
?>
</tbody>
</table>
<?php include 'rodape.php'?>
