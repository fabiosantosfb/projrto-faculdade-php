
function updateTelefone() {
  $.ajax({ type: "POST", url: "up-tel",
    data: { telefone: $('#telefone').val(), usuario: $('#usuario').val() },
    success: function(data) { $('#telefone').html(data); }
  });
}

function updateDoc() {
  $.ajax({
    type: "POST",url: "up-doc",
    data: { cpf: $('#cpf').val(), nome: $('#nome').val(), rg: $('#rg').val(), orgao_expedidor: $('#orgao_expedidor').val(), uf: $('#uf').val(), dataexpedicao: $('#dataexpedicao').val(), usuario: $('#doc').val() },
    success: function(data) { $('#documento').html(data); }
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

















function updateLogin(id_user){
    var params = "id="+id_user;
    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "update-login", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("Content-length", params.length);
    xhttp.setRequestHeader("Connection", "close");
    xhttp.onreadystatechange = function(){
    		if (xhttp.readyState == 4)
    			if (xhttp.status == 200){
    				result.innerHTML = xhttp.responseText;
    			} else {
    				result.innerHTML = "Um erro ocorreu: " + xhttp.statusText;
    			}
    	};
    xhttp.send(params);
    return xhttp;
}
