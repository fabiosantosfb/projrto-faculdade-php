function cpfValidadeExisting() {
  $.ajax({
    type: "POST", url: "validate",
    data: { cpf: $(cpf).val() },
    success: function(data) { $('#cpf-erro').html(data);
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
