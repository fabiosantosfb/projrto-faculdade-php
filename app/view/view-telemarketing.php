<?php

    $PESSOA = (telemarketing)? '
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
    ';

      $HOME = '
      <a class="nav-item" href="">
        <span class="icon"><i class="fa fa-home"></i></span>
        <span>Início</span>
      </a>';

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
    <script src="app/assets/js/jsPDF-1.3.2/jspdf.js"></script>
    <script src="js/jspdf.plugin.from_html.js"></script>
    <script src="js/jspdf.plugin.addhtml.js"></script>
    <script src="//mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
    <script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>
    <script type="text/javascript" src="./libs/FileSaver.js/FileSaver.js"></script>
    <script type="text/javascript" src="./libs/Blob.js/Blob.js"></script>
    <script type="text/javascript" src="./libs/deflate.js"></script>
    <script type="text/javascript" src="./libs/adler32cs.js/adler32cs.js"></script>

    <script type="text/javascript" src="js/jspdf.plugin.addimage.js"></script>
    <script type="text/javascript" src="js/jspdf.plugin.sillysvgrenderer.js"></script>
    <script type="text/javascript" src="js/jspdf.plugin.split_text_to_size.js"></script>
    <script type="text/javascript" src="js/jspdf.plugin.standard_fonts_metrics.js"></script>
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
          This content needs to be printed.
      </div>
      <input type="button" value="Print Div Contents" id="btnPrint" />
  </form>
<?php } ?>
<script>
    var doc = new jsPDF();
    var elementHandler = {'#ignorePDF': function (element, renderer) {return true;}};
    var source = window.document.getElementsByTagName("body")[0];
    doc.fromHTML(source,15,15,{'width': 180,'elementHandlers': elementHandler});
    doc.output("dataurlnewwindow");
</script>

<script type="text/javascript">
  $("#btnPrint").live("click", function () {
      var divContents = $("#dvContainer").html();
      var doc = new jsPDF();
      doc.text('Hello world!', 10, 10);
      doc.save('a4.pdf');
      //var printWindow = window.open('', '', 'height=400,width=800');
      //printWindow.document.write('<html><head><title>DIV Contents</title>');
      //printWindow.document.write('</head><body >');
      //printWindow.document.write(divContents);
      //printWindow.document.write('</body></html>');
      //printWindow.document.close();
      //printWindow.print();
  });
</script>

<script>
$(document).ready(function() {
  $("#pdfDiv").click(function() {
    var pdf = new jsPDF('p','pt','letter');
    var specialElementHandlers = {
    '#rentalListCan': function (element, renderer) {return true;}};
    pdf.addHTML($('#rentalListCan').first(), function() {pdf.save("caravan.pdf");});
  });
});
</script>
<?php include_once ('app/view/partlals/footer.php') ?>
