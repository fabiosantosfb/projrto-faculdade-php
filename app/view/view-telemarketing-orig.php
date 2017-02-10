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
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>-->
<section class="hero np-padding-20">
    <div class="npTitle">
        <h1 class="title is-4">
            Telemarketing
        </h1>
        <h2 class="subtitle is-6">
            Listagem de telefones Bloquados
        </h2>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="title is-6">
                            <strong>EXPORTAÇÃO</strong>
                        </p>
                    </div>
                    <div class="panel-block">
                        <?php if($telemarketing['status_ativo'] == 0) { ?>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <div class="control notification is-danger">
                                <button class="delete"></button>
                                <p>
                                    No momento você não está habilitado para receber a listagem de bloqueio. <br/>Aguarde a liberação.
                                </p>
                            </div>

                            <?php } else {?>
                                <form class="control" method="get" action="list-relatorio">
                                    <input class="button is-primary is-outlined" id="pdf" name="pdf" type="submit" value="Formato PDF"/>
                                    <span class="help">Será gerado uma listagem em PDF com a relação de telefones para bloqueio.</span>
                                    <input class="button is-primary is-outlined" id="xml" name="xml" type="submit" value="Formato XML"/>
                                    <span class="help">Será gerado um arquivo em XML com a relação de telefones para bloqueio.</span>
                                    <input class="button is-primary is-outlined" id="json" name="json" type="submit" value="Formato JSON"/>
                                    <span class="help">Será gerado um arquivo em formato JSON com a relação de telefones para bloqueio.</span>
                                </form>

                                <form class="control" id="form1">
                                    <div id="dvContainer">
                                        Listagem Pdf.
                                    </div>
                                    <input class="button is-primary is-outlined" id="btnPrint" onclick="pdf()" type="button" value="Gerar arquivo PDF"/>
                                    <span class="help">Será gerado um arquivo em PDF com a relação de telefones para bloqueio.</span>
                                </form>
                                <?php } ?>



                            </form>
                            <p>&nbsp;</p>
                        </div>
                        <div id="tel"></div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image icon is-large" style="height: 40px; width: 40px;">
                                        <i class="fa fa-exclamation-triangle deepskyblue"></i>
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">Não Pertube</p>
                                    <p class="subtitle is-6">Projeto de Lei N. 599</p>
                                </div>
                            </div>

                            <div class="content">
                                Art. 2 - A partir do 30 (trigésimo) dia do ingresso do usuário no cadastro <strong>"NÃO PERTUBE"</strong>, as empresas que prestam serviços relacionados ao parágrafo único do artigo 1 ou pessoas físicas contratadas com tal propósito, não poderão efetuar ligações telefônicas às pessoas inscritas no cadastro supracitado.
                                <br>
                                <small>16:18 PM - 6 Fev 2017</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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