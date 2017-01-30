
function updateDocument(id_user){
    var params = "id="+id_user;
    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "update-doc", true);
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

function updateEndereco(id_user){
    var params = "id="+id_user;
    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "update-end", true);
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

function updateTelefone(id_user) {
    /*  var params = "id_pf="+id_user;
      var xhttp = new XMLHttpRequest();

      xhttp.open("POST", "update-telefone", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader("Content-length", params.length);
      xhttp.setRequestHeader("Connection", "close");
      xhttp.onreadystatechange = function(){
      		if (xhttp.readyState == 4)
      			if (xhttp.status == 200){
      				result.innerHTML = xhttp.responseText;
      			} else {
              alert("#######################################################################################!");
      				result.innerHTML = "Um erro ocorreu: " + xhttp.statusText;
      			}
      	};
      xhttp.send(params);
      return xhttp;*/
      var xmlHttp;
      try {// Firefox, Opera 8.0+, Safari
         xmlHttp = new XMLHttpRequest();
      } catch (e) {
          try {// Internet Explorer
             xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
           } catch (e) {
               try {
                 xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
               } catch (e) {
                 alert("Browser não suporta AJAX!");
                 return false;
               }
          }
      }
      xmlHttp.onreadystatechange = function(){
        if (xmlHttp.readyState == 4){
          alert(document.telefone.time.value = xmlHttp.responseText);
        } else {
          alert("xmlHttp.readyState != 4!");
        }
      };
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

function addTelefone(id_user){
    var params = "id="+id_user;

    var telefone = prompt('Digite um telefone!');
    alert('Seu telefone é ' + telefone);

    /*var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "add-telefone", true);
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
    return xhttp;*/
}
