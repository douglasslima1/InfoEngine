
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cpfcnpj" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nome" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["nomeres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipoinscricao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["inscricao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ativo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["md_cli_end" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["md_cli_tel2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["md_cli_car" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cpfcnpj" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cpfcnpj" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nome" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nome" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomeres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomeres" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoinscricao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoinscricao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscricao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscricao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ativo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ativo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["md_cli_end" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["md_cli_end" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["md_cli_tel2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["md_cli_tel2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["md_cli_car" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["md_cli_car" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipoinscricao" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_nome' + iSeqRow).bind('blur', function() { sc_form_cliente_nome_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cliente_nome_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomeres' + iSeqRow).bind('blur', function() { sc_form_cliente_nomeres_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cliente_nomeres_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo' + iSeqRow).bind('blur', function() { sc_form_cliente_tipo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_cliente_tipo_onchange(this, iSeqRow) })
                                  .bind('click', function() { sc_form_cliente_tipo_onclick(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cliente_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cpfcnpj' + iSeqRow).bind('blur', function() { sc_form_cliente_cpfcnpj_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cliente_cpfcnpj_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoinscricao' + iSeqRow).bind('blur', function() { sc_form_cliente_tipoinscricao_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cliente_tipoinscricao_onfocus(this, iSeqRow) });
  $('#id_sc_field_inscricao' + iSeqRow).bind('blur', function() { sc_form_cliente_inscricao_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cliente_inscricao_onfocus(this, iSeqRow) });
  $('#id_sc_field_ativo' + iSeqRow).bind('blur', function() { sc_form_cliente_ativo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cliente_ativo_onfocus(this, iSeqRow) });
  $('#id_sc_field_md_cli_end' + iSeqRow).bind('blur', function() { sc_form_cliente_md_cli_end_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cliente_md_cli_end_onfocus(this, iSeqRow) });
  $('#id_sc_field_md_cli_tel2' + iSeqRow).bind('blur', function() { sc_form_cliente_md_cli_tel2_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cliente_md_cli_tel2_onfocus(this, iSeqRow) });
  $('#id_sc_field_md_cli_car' + iSeqRow).bind('blur', function() { sc_form_cliente_md_cli_car_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cliente_md_cli_car_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cliente_nome_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_nome();
  scCssBlur(oThis);
}

function sc_form_cliente_nome_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cliente_nomeres_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_nomeres();
  scCssBlur(oThis);
}

function sc_form_cliente_nomeres_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cliente_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_tipo();
  scCssBlur(oThis);
}

function sc_form_cliente_tipo_onchange(oThis, iSeqRow) {
  sc_tipo_onchange();
}

function sc_form_cliente_tipo_onclick(oThis, iSeqRow) {
  sc_tipo_onclick();
}

function sc_form_cliente_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cliente_cpfcnpj_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_cpfcnpj();
  scCssBlur(oThis);
}

function sc_form_cliente_cpfcnpj_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cliente_tipoinscricao_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_tipoinscricao();
  scCssBlur(oThis);
}

function sc_form_cliente_tipoinscricao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cliente_inscricao_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_inscricao();
  scCssBlur(oThis);
}

function sc_form_cliente_inscricao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cliente_ativo_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_ativo();
  scCssBlur(oThis);
}

function sc_form_cliente_ativo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cliente_md_cli_end_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_md_cli_end();
  scCssBlur(oThis);
}

function sc_form_cliente_md_cli_end_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cliente_md_cli_tel2_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_md_cli_tel2();
  scCssBlur(oThis);
}

function sc_form_cliente_md_cli_tel2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cliente_md_cli_car_onblur(oThis, iSeqRow) {
  do_ajax_form_cliente_mob_validate_md_cli_car();
  scCssBlur(oThis);
}

function sc_form_cliente_md_cli_car_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
