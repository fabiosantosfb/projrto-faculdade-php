function modifiStatus(id, _status){
    var params = "id="+id+"&status="+_status;
    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "admin-status", true);
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
