<?php include 'cabecalho.php' ?>
<h1>Formulário de Cadastro</h1>
<form action="/?controller=produtos&action=adiciona" method="post">
  <div class="form-group">
                 <label for="produto">Nome</label>
                 <input class="form-control" type="text" name="nome" placeholder="Informe o nome do produto">
  </div>
  <div class="form-group">
                 <label for="produto">Preço</label>
                 <input class="form-control" type="number" name="preco" placeholder="Informe o preço">
  </div>
                <input class="btn btn-default" id="enviar" type="submit" value="Cadastrar" />
  </table>
</form>
<p>
  Retorno 
</p>

<?php include 'rodape.php' ?>
