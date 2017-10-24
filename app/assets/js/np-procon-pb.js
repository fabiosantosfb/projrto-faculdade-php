
/** FORMATAÇÃO DO NUMERO TELEFONICO */
var size_fone = 1;
function inputDado(_obj,_func){ v_obj=_obj; v_fun=_func; setTimeout("exeMascara()",1); }
function exeMascara(){ v_obj.value=v_fun(v_obj.value) }

//function formatacaoTelefone(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/(\d{5})(\d{4})(\d{4})$/,"$1-$2"); digit=digit.replace(/^(\d{2})(\d)/g,"($1) $2"); return digit; }
function formatacaoTelefone(digit){
  if(size_fone == 12) {
    size_fone = digit.length;
    digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{2})(\d)/g,"($1) $2"); digit=digit.replace(/(\d{4})(\d{4})$/,"$1-$2");
  } else {
      size_fone = digit.length;
      digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{2})(\d)/g,"($1) $2"); digit=digit.replace(/(\d{5})(\d{4})$/,"$1-$2");
      return digit;
  }
  return digit;
}
function formatacaoData(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{2})(\d{2})(\d{2})/g,"$1/$2/$3"); return digit }
function formatacaoCpf(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{3})(\d{3})(\d{3})/g,"$1.$2.$3"); digit=digit.replace(/(\d)(\d{2})$/,"$1-$2"); return digit; }
function formatacaoRg(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d)(\d{3})(\d{2})/g,"$1.$2.$3"); return digit; }
function formatacaoCep(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{5})(\d{3})/g,"$1-$2"); return digit; }
function formatacaoCnpj(digit){ digit=digit.replace(/\D/g,""); digit=digit.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"$1.$2.$3/$4-$5"); return digit; }

function id( pf ){ return document.getElementById( pf ); }
window.onload = function(){
    id('dataexpedicao').onkeypress = function(){  inputDado( this, formatacaoData ); }
    id('cpf').onkeypress = function(){ inputDado( this, formatacaoCpf ); }
    id('rg').onkeypress = function(){ inputDado( this, formatacaoRg ); }
}
function telefoneFormat(camp) { id(camp).onkeypress = function(){ inputDado( this, formatacaoTelefone ); }}
function cnpjFormat(camp) { id(camp).onkeypress = function(){ inputDado( this, formatacaoCnpj ); }}
function cepFormat(camp) { id(camp).onkeypress = function(){ inputDado( this, formatacaoCep ); }}
function newPhone(){ id('novo_tel').onkeypress = function(){ inputDado( this, formatacaoTelefone ); }}
function ocultarMsg(){ $(".ocultar").hide("slow",callback); }

//ADICIONAR VARIOS
$(document).ready(function() {
  var max_fields = 10;
  var wrapper = $(".telefone");
  var add_button = $(".button_telefone_add");

  var x = 1;
  $(add_button).click(function(e) {

    if (x < max_fields) {
        $(wrapper).append('<div><br><input class="input-w-4 is-sucess telefone" id="telefone_' + (x) + '" name="telefone[]" type="text"  maxlength="14" placeholder="(DD) xxxxx-xxxx" onkeypress=telefoneFormat("telefone_' + (x) + '")>&nbsp<button class="button is-danger remove_field" type="button" title="Remover"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>'); }
        x++;
  });

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })

});
