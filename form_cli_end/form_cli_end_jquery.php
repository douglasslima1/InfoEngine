
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
  scEventControl_data["idcliente_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cep_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["endereco_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["numero_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["complemento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["bairro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["municipio_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idestado_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idcliente_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcliente_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cep_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cep_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["endereco_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["endereco_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["complemento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["complemento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bairro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bairro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["municipio_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["municipio_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idestado_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idestado_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idestado_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_cli_end_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_cli_end_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_cli_end_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_idcliente_' + iSeqRow).bind('blur', function() { sc_form_cli_end_idcliente__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cli_end_idcliente__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cli_end_idcliente__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_' + iSeqRow).bind('blur', function() { sc_form_cli_end_tipo__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_cli_end_tipo__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cli_end_tipo__onfocus(this, iSeqRow) });
  $('#id_sc_field_endereco_' + iSeqRow).bind('blur', function() { sc_form_cli_end_endereco__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cli_end_endereco__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cli_end_endereco__onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_' + iSeqRow).bind('blur', function() { sc_form_cli_end_numero__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_cli_end_numero__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cli_end_numero__onfocus(this, iSeqRow) });
  $('#id_sc_field_complemento_' + iSeqRow).bind('blur', function() { sc_form_cli_end_complemento__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cli_end_complemento__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cli_end_complemento__onfocus(this, iSeqRow) });
  $('#id_sc_field_bairro_' + iSeqRow).bind('blur', function() { sc_form_cli_end_bairro__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_cli_end_bairro__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cli_end_bairro__onfocus(this, iSeqRow) });
  $('#id_sc_field_municipio_' + iSeqRow).bind('blur', function() { sc_form_cli_end_municipio__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cli_end_municipio__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cli_end_municipio__onfocus(this, iSeqRow) });
  $('#id_sc_field_idestado_' + iSeqRow).bind('blur', function() { sc_form_cli_end_idestado__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cli_end_idestado__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cli_end_idestado__onfocus(this, iSeqRow) });
  $('#id_sc_field_cep_' + iSeqRow).bind('blur', function() { sc_form_cli_end_cep__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_cli_end_cep__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cli_end_cep__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cli_end_id__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_end_idcliente__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_idcliente_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_idcliente__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_idcliente__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_end_tipo__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_tipo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_tipo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_tipo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_end_endereco__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_endereco_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_endereco__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_endereco__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_end_numero__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_numero_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_numero__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_numero__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_end_complemento__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_complemento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_complemento__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_complemento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_end_bairro__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_bairro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_bairro__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_bairro__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_end_municipio__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_municipio_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_municipio__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_municipio__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_end_idestado__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_idestado_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_idestado__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_idestado__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_end_cep__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_end_validate_cep_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_end_cep__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_end_cep__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

