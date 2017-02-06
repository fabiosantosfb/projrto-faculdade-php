
/** FORMATAÇÃO DO NUMERO TELEFONICO */
function inputDado(_obj,_func){ v_obj=_obj; v_fun=_func; setTimeout("exeMascara()",1); }
function exeMascara(){ v_obj.value=v_fun(v_obj.value) }

function formatacaoTelefone(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{2})(\d)/g,"($1)$2"); digit=digit.replace(/(\d)(\d{4})$/,"$1-$2"); return digit;}
function formatacaoData(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{2})(\d{2})(\d{2})/g,"$1/$2/$3"); return digit }
function formatacaoCpf(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{3})(\d{3})(\d{3})/g,"$1.$2.$3"); digit=digit.replace(/(\d)(\d{2})$/,"$1-$2"); return digit; }
function formatacaoRg(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d)(\d{3})(\d{2})/g,"$1.$2.$3"); return digit }
function formatacaoCep(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{5})(\d{3})/g,"$1-$2"); return digit }
function formatacaoCnpj(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"$1.$2.$3/$4-$5"); return digit }

function id( pf ){ return document.getElementById( pf ); }
window.onload = function(){
    id('dataexpedicao').onkeypress = function(){  inputDado( this, formatacaoData ); }
    id('cpf').onkeypress = function(){ inputDado( this, formatacaoCpf ); }
    id('rg').onkeypress = function(){ inputDado( this, formatacaoRg ); }
}
function telefoneFormat(camp) { id(camp).onkeypress = function(){ inputDado( this, formatacaoTelefone ); }}
function cnpjFormat(camp) { id(camp).onkeypress = function(){ inputDado( this, formatacaoCnpj ); }}
function cepFormat(camp) { id(camp).onkeypress = function(){ inputDado( this, formatacaoCep ); }}
function newPhone(){ id('novo_tel').onkeypress = function(){ inputDado( this, formatacaoTelefone ); } }
