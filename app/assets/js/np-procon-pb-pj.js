
/** FORMATAÇÃO DO NUMERO TELEFONICO */
function inputDado(_obj,_func){ v_obj=_obj; v_fun=_func; setTimeout("exeMascara()",1); }
function exeMascara(){ v_obj.value=v_fun(v_obj.value) }

function formatacaoTelefone(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{2})(\d)/g,"($1) $2"); digit=digit.replace(/(\d)(\d{4})$/,"$1-$2"); return digit;}
function formatacaoCep(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{5})(\d{3})/g,"$1-$2"); return digit }
function formatacaoCnpj(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"$1.$2.$3/$4-$5"); return digit }

function id( pf ){ return document.getElementById( pf ); }
window.onload = function(){
    id('telefone').onkeypress = function(){ inputDado( this, formatacaoTelefone ); }
    id('cnpj').onkeypress = function(){ inputDado( this, formatacaoCnpj ); }
    id('cep').onkeypress = function(){ inputDado( this, formatacaoCep ); }
}
