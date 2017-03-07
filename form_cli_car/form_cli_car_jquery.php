
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
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idcliente_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idmarca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idmodelo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idcor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["placa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["ano_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["obs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcliente_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcliente_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idmarca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idmarca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idmodelo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idmodelo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["placa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["placa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ano_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ano_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["change"]) {
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
  if ("idcliente_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idmarca_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idmodelo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idcor_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_cli_car_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_cli_car_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_cli_car_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_idmarca_' + iSeqRow).bind('blur', function() { sc_form_cli_car_idmarca__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_cli_car_idmarca__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cli_car_idmarca__onfocus(this, iSeqRow) });
  $('#id_sc_field_idmodelo_' + iSeqRow).bind('blur', function() { sc_form_cli_car_idmodelo__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cli_car_idmodelo__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cli_car_idmodelo__onfocus(this, iSeqRow) });
  $('#id_sc_field_idcor_' + iSeqRow).bind('blur', function() { sc_form_cli_car_idcor__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cli_car_idcor__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cli_car_idcor__onfocus(this, iSeqRow) });
  $('#id_sc_field_placa_' + iSeqRow).bind('blur', function() { sc_form_cli_car_placa__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cli_car_placa__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cli_car_placa__onfocus(this, iSeqRow) });
  $('#id_sc_field_idcliente_' + iSeqRow).bind('blur', function() { sc_form_cli_car_idcliente__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cli_car_idcliente__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cli_car_idcliente__onfocus(this, iSeqRow) });
  $('#id_sc_field_ano_' + iSeqRow).bind('blur', function() { sc_form_cli_car_ano__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_cli_car_ano__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cli_car_ano__onfocus(this, iSeqRow) });
  $('#id_sc_field_obs_' + iSeqRow).bind('blur', function() { sc_form_cli_car_obs__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_cli_car_obs__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cli_car_obs__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cli_car_id__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_car_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_car_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_car_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_car_idmarca__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_car_validate_idmarca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_car_idmarca__onchange(oThis, iSeqRow) {
  do_ajax_form_cli_car_refresh_idmarca_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_cli_car_idmarca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_car_idmodelo__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_car_validate_idmodelo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_car_idmodelo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_car_idmodelo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_car_idcor__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_car_validate_idcor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_car_idcor__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_car_idcor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_car_placa__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_car_validate_placa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_car_placa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_car_placa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_car_idcliente__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_car_validate_idcliente_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_car_idcliente__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_car_idcliente__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_car_ano__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_car_validate_ano_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_car_ano__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_car_ano__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cli_car_obs__onblur(oThis, iSeqRow) {
  do_ajax_form_cli_car_validate_obs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cli_car_obs__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_cli_car_obs__onfocus(oThis, iSeqRow) {
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

