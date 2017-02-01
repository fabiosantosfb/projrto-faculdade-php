
function updateTelefone(id, user, tel) {
  $.ajax({
    type: "POST", url: "up-tel",
    data: { telefone: $(tel).val(), usuario: $(user).val(), id_telefone: $(id).val() },
    success: function(data) { $('#tel').html(data);
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


function addteTelefone(){
    var xhttp = new XMLHttpRequest();

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = result;
    xhttp.open("POST", "add-telefone", false);
    xhttp.send(null);
    return xhttp;
}
function result(){
    if (xhttp.readyState == 4)
      if (xhttp.status == 200){
        result.innerHTML = xhttp.responseText;
      } else {
        result.innerHTML = "Um erro ocorreu: " + xhttp.statusText;
      }
  }
