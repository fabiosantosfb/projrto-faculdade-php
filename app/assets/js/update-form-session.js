function updateTelefone(id, user, tel) {
  $.ajax({
    type: "POST", url: "up-tel",
    data: { telefone: $(tel).val(), usuario: $(user).val(), id_telefone: $(id).val() },
    success: function(data) { $('#tel').html(data);
  }
  });
}

function deleteTelefone(id, user, tel) {
  location.reload();
  $.ajax({
    type: "POST", url: "del-tel",
    data: { telefone: $(tel).val(), usuario: $(user).val(), id_telefone: $(id).val() },
    success: function(data) {$('#tel').html(data);
    }
  });
}

function updateDoc() {
  $.ajax({
    type: "POST",url: "up-doc",
    data: { cpf: $('#cpf').val(), nome: $('#nome').val(), rg: $('#rg').val(), orgao_expedidor: $('#orgao_expedidor').val(), uf: $('#uf').val(), dataexpedicao: $('#dataexpedicao').val(), usuario: $('#doc').val() },
    success: function(data) { $('#documento').html(data);}
  });
}

function updateDocPj() {
  $.ajax({
    type: "POST",url: "up-cnpj",
    data: { cnpj: $('#cnpj').val(), nome: $('#nome').val(), usuario: $('#doc').val() },
    success: function(data) { $('#documento').html(data);}
  });
}

function updateAddress() {
  $.ajax({
    type: "POST",url: "up-address",
    data: { cep: $('#cep').val(), rua: $('#rua').val(), bairro: $('#bairro').val(), cidade: $('#cidade').val(), numero: $('#numero').val(), complemento: $('#complemento').val(), id_endereco: $('#id_endereco').val() },
    success: function(data) { $('#endereco').html(data); }
  });
}

function updatePassword() {
  $.ajax({
    type: "POST",url: "up-password",
    data: { email: $('#email').val(), senha: $('#senha').val(), repetir_senha: $('#repetir_senha').val(), id: $('#id_login').val() },
    success: function(data) { $('#login').html(data); }
  });
}

function gerarToken() {
    if($('#token').val() != ""){
        $.ajax({
          type: "POST", url: "gerar-token",
          data: { token: $('#token').val(), id: $('#usuario').val() },
          success: function(data) {
               var data = $.parseJSON(data);
                $('#tokeng').html(data.token);
                $('#identificador').html(data.id);
            }
        });
    } else {
        alert("Digiter uma chave!");
    }
}
