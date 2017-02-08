<?php
$HOME = '
<a class="nav-item" href="">
<span>Home</span>
</a>';

$PESSOA = '
<a class="nav-item" href="">
<span>Pessoa Física</span>
</a>
';

$LOGIN = '
<a class="nav-item" href="logout">
    <span>SAIR</span>
</a>';

?>
<?php include_once 'app/view/partlals/header.php' ?>
<script src="app/assets/js/update-form-session.js" charset="utf-8"></script>

<script src="app/assets/js/np-procon-pb.js" charset="utf-8"></script>
<label>Dados - Pessoa Física</label>
<form>
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
                    <td><input id="cpf" name="cpf" maxlength="14" value="<?= $pessoa['cpf']?>" required="" style="border:0;"></td>
                    <td></td>
                    <td><input id="nome" name="nome" value="<?= $pessoa['nome'] ?>" required="" style="border:0;"></td>
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
                                <td><input id="rg" name="rg" maxlength="9" value="<?=$pessoa['rg'] ?>" required="" style="border:0;"></td>
                                <td></td>
                                <td><input id="orgao_expedidor" name="orgao_expedidor" value="<?=$pessoa['org'] ?>" required="" style="border:0;"></td>
                                <td></td>
                                <td><input id="uf" name="uf" value="<?=$pessoa['uf'] ?>" required="" style="border:0;"></td>
                                <td></td>
                                <td><input id="dataexpedicao" name="dataexpedicao" maxlength="8" value="<?=$pessoa['data_expedicao'] ?>" required="" style="border:0;"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-9">
                            <input id="doc" type="hidden" value="<?=$pessoa['usuario_id_usuario'] ?>">
                            <button type="button" class="btn btn-success" onclick="updateDoc()">Alterar</button>
                        </div>
                    </div>
                </form>
                <span><div id="documento"></div></span>
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
                                        <td><input id="cep" name="cep" maxlength="9" onkeypress='cepFormat("cep")' value="<?=$endereco['cep'] ?>" required="" style="border:0;"></td>
                                        <td></td>
                                        <td><input id="rua" name="rua" value="<?=$endereco['rua'] ?>" required="" style="border:0;"></td>
                                        <td></td>
                                        <td><input id="bairro" name="bairro" value="<?=$endereco['bairro'] ?>" required="" style="border:0;"></td>
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
                                                <td><input id="cidade" name="cidade" value="<?=$endereco['cidade'] ?>" required="" style="border:0;"></td>
                                                <td></td>
                                                <td><input id="numero" name="numero" value="<?=$endereco['numero'] ?>" style="border:0;"></td>
                                                <td></td>
                                                <td><input id="complemento" name="complemento" value="<?=$endereco['complemento'] ?>" style="border:0;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-9">
                                             <input id="id_endereco" type="hidden" value="<?=$pessoa['usuario_id_usuario'] ?>">
                                            <button type="button" class="btn btn-success" onclick="updateAddress()">Alterar</button>
                                        </div>
                                    </div>
                                </form>
                                <span><div id="endereco"></div></span>
                                <br><legend></legend>
                                <label>Dados - Telefone</label>
                                <form>
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
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                foreach ($telefone as $key) { ?>
                                                    <tr style="color:#000">
                                                        <td>
                                                            <input id="id_tel<?=$i?>" value="<?=$key['id_telefone'] ?>" type="hidden"/>
                                                            <input id="id_usu<?=$i?>" value="<?=$key['usuario_id_usuario'] ?>" type="hidden"/>
                                                            <input id="tel<?=$i?>" name="telefone" maxlength="14" onkeypress='telefoneFormat("tel"+<?=$i?>)' required="" value="<?=$key['telefone_numero'] ?>" style="border:0;"/>

                                                            <button type="button" class="btn btn-success" onclick='updateTelefone("#id_tel"+<?=$i?>,"#id_usu"+<?=$i?>,"#tel"+<?=$i?>)'>Alterar</button></td>
                                                            <td></td>
                                                            <td><?=$key['data_cadastro'] ?></td>
                                                        </tr>
                                                        <?php $i++;} ?>
                                                    </tbody>
                                                </table>
                                            </form>
                                            <span><div id="tel"></div></span>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <form method="post" action="add-telefone">
                                                        <input id="usuario" name="usuario" type="hidden" value="<?=$pessoa['usuario_id_usuario'] ?>">
                                                        <input id="novo_tel" name="novo_tel" placeholder="Digite novo numero Telefone" maxlength="14" required="" style="border:0;">
                                                        <input type="submit" class="btn btn-success" value="Adicionar"/>
                                                    </form>
                                                </div>
                                            </div>
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
                                                                    <td><input id="email" name="email"  value="<?=$usuario['email'] ?>" required="" style="border:0;"></td>
                                                                    <td></td>
                                                                    <td><input id="senha" name="senha" type="password" value="*******" required="" style="border:0;"></td>
                                                                    <td></td>
                                                                    <td><input id="repetir_senha" name="repetir_senha" type="password" value="*******" required="" style="border:0;"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <input id="id_login" value="<?=$usuario['id_usuario'] ?>" type="hidden">
                                                                <button type="button" class="btn btn-success" onclick="updatePassword()">Alterar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <span><div id="login"></div></span>
                                                    <?php include_once ('app/view/partlals/footer.php') ?>
