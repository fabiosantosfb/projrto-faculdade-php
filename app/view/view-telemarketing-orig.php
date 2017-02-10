<?php

    $PESSOA = ($telemarketing)? '
    <a class="nav-item" href="session-pj">
        <span>Meus Dados</span>
    </a>
    <a class="nav-item" href="list">
        <span>Listagem</span>
    </a>
    ':

      $HOME = '
      <a class="nav-item" href="">
        <span>Home</span>
      </a>';

      $LOGIN = '
      <a class="nav-item" href="logout">
          <span>SAIR</span>
      </a>';

?>
<?php include_once 'app/view/partlals/header.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

<legend>Telemarketing</legend>
<?php if($telemarketing['status_ativo'] == 0) { ?>
    No momento você não está habilitado para receber a listagem de bloqueio. Aguarde a liberação.
<?php } else {?>
<form method="get" action="/list-pdf">
<table class="table table-striped table-bordered btn-primary">
  <tr style="color:#000"><td>Listagem pdf:</td>
  <td><button id="button1id" class="btn btn-success" type="submit">Baixar</button></td><tr>

  <tr style="color:#000"><td>Listagem xml:</td>
  <td><button id="button1id" class="btn btn-success" type="submit">Baixar</button></td><tr>

  <tr style="color:#000"><td>Listagem json:</td>
  <td><button id="button1id" class="btn btn-success" type="submit">Baixar</button></td><tr>
</table>
</form>
  <form id="form1">
      <div id="dvContainer">
          Listagem Pdf.
      </div>
      <input type="button" value="Gerar Pdf" id="btnPrint" onclick="pdf()" />
  </form>
<?php } ?>


<script type="text/javascript">
    function pdf(){
        var doc = new jsPDF();
        doc.text('Hello world!', 10, 10);
        doc.save('a4.pdf');
    }
</script>

<!--<script>
$(document).ready(function() {
  $("#pdfDiv").click(function() {
    var pdf = new jsPDF('p','pt','letter');
    var specialElementHandlers = {
    '#rentalListCan': function (element, renderer) {return true;}};
    pdf.addHTML($('#rentalListCan').first(), function() {pdf.save("caravan.pdf");});
  });
});
</script>-->
<?php include_once ('app/view/partlals/footer.php') ?>
