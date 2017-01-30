
function updateTelefone(user) {
  $.ajax({
    type: "POST",
    url: "updtel",
    data: {
      telefone: $('#telefone').val(),
      usuario: $('#usuario').val()
    },
    success: function(data) {
      $('#txtHint').html(data);
    }
  });
}

function updateDocument(id) {
  var usuario = id;
  $.ajax({
    type: "POST",
    url: "updtel",
    data: {
      usuario: usuario
    },
    success: function() {
     $('#txtHint').html("erro");
    }
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
