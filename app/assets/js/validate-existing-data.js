function cpfValidadeExisting() {
  $.ajax({
    type: "POST", url: "validate",
    data: { cpf: $(cpf).val() },
    success: function(data) { $('#cpf-erro').html(data);
  }
  });
}

function cnpjValidadeExisting() {
  $.ajax({
    type: "POST", url: "validate",
    data: { cnpj: $(cnpj).val() },
    success: function(data) { $('#cnpj-erro').html(data);
  }
  });
}

function emailValidadeExisting() {
  $.ajax({
    type: "POST",url: "validate",
    data: { email: $('#email').val() },
    success: function(data) { $('#email-erro').html(data);
  }
  });
}

function telefoneValidadeExisting() {
  $.ajax({
    type: "POST",url: "validate",
    data: { telefone: $('#telefone').val() },
    success: function(data) { $('#tel-erro').html(data);
  }
  });
}

function rgValidadeExisting() {
  $.ajax({
    type: "POST",url: "validate",
    data: { rg: $('#rg').val() },
    success: function(data) { $('#rg-erro').html(data);
  }
  });
}

function dataValidadeExisting() {
  $.ajax({
    type: "POST",url: "validate",
    data: { dataexpedicao: $('#dataexpedicao').val() },
    success: function(data) { $('#data-erro').html(data);
  }
  });
}

function cepValidadeExisting() {
  $.ajax({
    type: "POST",url: "validate",
    data: { cep: $('#cep').val() },
    success: function(data) { $('#cep-erro').html(data);
  }
  });
}
