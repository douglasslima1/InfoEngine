
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
  scEventControl_data["descricao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["data_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["preco_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["obs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["descricao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descricao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preco_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preco_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["change"]) {
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
  if ("idordemservico_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_servico_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_servico_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_servico_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_descricao_' + iSeqRow).bind('blur', function() { sc_form_servico_descricao__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_servico_descricao__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_servico_descricao__onfocus(this, iSeqRow) });
  $('#id_sc_field_data_' + iSeqRow).bind('blur', function() { sc_form_servico_data__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_servico_data__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_servico_data__onfocus(this, iSeqRow) });
  $('#id_sc_field_preco_' + iSeqRow).bind('blur', function() { sc_form_servico_preco__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_servico_preco__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_servico_preco__onfocus(this, iSeqRow) });
  $('#id_sc_field_obs_' + iSeqRow).bind('blur', function() { sc_form_servico_obs__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_servico_obs__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_servico_obs__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_servico_id__onblur(oThis, iSeqRow) {
  do_ajax_form_servico_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_servico_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_servico_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_servico_descricao__onblur(oThis, iSeqRow) {
  do_ajax_form_servico_validate_descricao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_servico_descricao__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_servico_descricao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_servico_data__onblur(oThis, iSeqRow) {
  do_ajax_form_servico_validate_data_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_servico_data__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_servico_data__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_servico_preco__onblur(oThis, iSeqRow) {
  do_ajax_form_servico_validate_preco_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_servico_preco__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_servico_preco__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_servico_obs__onblur(oThis, iSeqRow) {
  do_ajax_form_servico_validate_obs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_servico_obs__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_servico_obs__onfocus(oThis, iSeqRow) {
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

