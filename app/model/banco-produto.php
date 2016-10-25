<?php include 'conecta.php'

function inserirPessoaJuridica($cnpj, $r_social,$email, $pwd)
{
    $usuario = "INSERT INTO usuario (id_usuario, login, senha, ativo) values (default,'{$email}','{$pwd}',0)";
    if($resultadoDaInsercao = mysqli_query($conexao, $usuario)){
        $endereco = "INSERT INTO endereco (id_endereco, rua, numero, complemento, cidade, uf, cep, id_fisica, data_cadastro, data_atualiza) values (default,'{$rua}','{$numero}','{$complemento}','{$cidade}','{$uf}','{$cep}',null,default,default)";
        if($resultadoDaInsercao = mysqli_query($conexao, $endereco)){
          $telemarketing = "INSERT into telemarketing values(default,default,'{$r_social}','{$email}',default,0,default,default)";
          if($resultadoDaInsercao = mysqli_query($conexao, $telemarketing)){
            return $resultadoDaInsercao;
          } else{
            printf("Error Cadastro de Telemarketing: %s\n", mysqli_error($conexao));
          }
        }else{
          printf("Error Cadastro Endereço: %s\n", mysqli_error($conexao));
        }
    } else {
      printf("Error Cadastro Login: %s\n", mysqli_error($conexao));
    }

    return false;
}

function listaTelemarketing($conexao)
{
    $_telemarketing = array();
    $resultado = mysqli_query($conexao, 'SELECT * FROM telemarketing ');

    while ($telemarketing = mysqli_fetch_assoc($resultado)) {
        array_push($_telemarketing, $telemarketing);
    }
    return $_telemarketing;
}

function removeProduto($conexao, $id)
{
    $query = "DELETE FROM telemarketing WHERE id_telemarketing={$id}";

    return  mysqli_query($conexao, $query);
}

function ativarProduto($conexao, $id, $ativa){
    $query = "UPDATE telemarketing SET ativa={$ativa} WHERE id_telemarketing={$id}";

    if (!$query) {
        printf("Error: %s\n", mysqli_error($conexao));
    }
    return mysqli_query($conexao, $query);
}

function searchTelemarketing($conexao, $id){

    $query =  "SELECT * FROM telemarketing WHERE nome_razao='$id'";
    $resultado = mysqli_query($conexao, $query);

    if (!$resultado) {
        printf("Error: %s\n", mysqli_error($conexao));
    }
    if (mysqli_num_rows($resultado) === 1) {
        $row = mysqli_fetch_array($r);
    }
    return $row;
}
