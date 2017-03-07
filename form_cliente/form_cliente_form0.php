<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Cliente"); } else { echo strip_tags("Cliente"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cliente/form_cliente_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cliente_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}

 function removerOptions() {
  $('#id_sc_field_tipoinscricao>option[value="R"]').remove();
  $('#id_sc_field_tipoinscricao>option[value="M"]').remove();
  $('#id_sc_field_tipoinscricao>option[value="F"]').remove();
 } // removerOptions
<?php

include_once('form_cliente_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  sc_form_onload();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
     scQuickSearchInit(false, '');
     if (document.getElementById('SC_fast_search_t')) {
         $('#SC_fast_search_t').listen();
     }
     if (document.getElementById('SC_fast_search_t')) {
         scQuickSearchKeyUp('t', null);
     }
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if (document.getElementById('SC_fast_search_t')) {
           if ('' == sPos || 't' == sPos) {
               scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
           }
       }
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = 'margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_cliente_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method="post" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_cliente'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cliente'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="75%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "Cliente"; } else { echo "Cliente"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{watermark:'<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>', watermarkClass: 'scFormToolbarInputWm', maxLength: 255}">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = ''; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['empty_filter'] = true;
       }
  }
  else
  {
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><script type="text/javascript">
function sc_change_tabs(bTabDisp, sTabId, sTabParts)
{
  if (document.getElementById(sTabId)) {
    if (bTabDisp) {
      document.getElementById("div_" + sTabId).style.width = "";
      document.getElementById("div_" + sTabId).style.height = "";
      document.getElementById("div_" + sTabId).style.display = "";
      document.getElementById("div_" + sTabId).style.overflow = "visible";
      document.getElementById(sTabParts).className = "scTabActive";
      if ("hidden_bloco_1" == sTabId) {
        scAjaxDetailHeight("form_cli_end", "280");
      }
      if ("hidden_bloco_2" == sTabId) {
        scAjaxDetailHeight("form_cli_tel", "280");
      }
      if ("hidden_bloco_3" == sTabId) {
        scAjaxDetailHeight("form_cli_car", "280");
      }
    }
    else {
      document.getElementById("div_" + sTabId).style.width = "1px";
      document.getElementById("div_" + sTabId).style.height = "0px";
      document.getElementById("div_" + sTabId).style.display = "none";
      document.getElementById("div_" + sTabId).style.overflow = "scroll";
      document.getElementById(sTabParts).className = "scTabInactive";
    }
  }
}
</script>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipo']))
    {
        $this->nm_new_label['tipo'] = "Tipo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo = $this->tipo;
   $sStyleHidden_tipo = '';
   if (isset($this->nmgp_cmp_hidden['tipo']) && $this->nmgp_cmp_hidden['tipo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo']);
       $sStyleHidden_tipo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo = 'display: none;';
   $sStyleReadInp_tipo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo']) && $this->nmgp_cmp_readonly['tipo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo']);
       $sStyleReadLab_tipo = '';
       $sStyleReadInp_tipo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo']) && $this->nmgp_cmp_hidden['tipo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo" value="<?php echo $this->form_encode_input($tipo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_line" id="hidden_field_data_tipo" style="<?php echo $sStyleHidden_tipo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_label"><span id="id_label_tipo"><?php echo $this->nm_new_label['tipo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['php_cmp_required']['tipo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['php_cmp_required']['tipo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo"]) &&  $this->nmgp_cmp_readonly["tipo"] == "on") { 

 if ("F" == $this->tipo) { $tipo_look = "Física";} 
 if ("J" == $this->tipo) { $tipo_look = "Jurídica";} 
$tipo_look = "";
 if (empty($tipo_look)) { $tipo_look = $this->tipo; }
?>
<input type="hidden" name="tipo" value="<?php echo $this->form_encode_input($tipo) . "\">" . $tipo_look . ""; ?>
<?php } else { ?>

<?php

 if ("F" == $this->tipo) { $tipo_look = "Física";} 
 if ("J" == $this->tipo) { $tipo_look = "Jurídica";} 
$tipo_look = "";
 if (empty($tipo_look)) { $tipo_look = $this->tipo; }
?>
<span id="id_read_on_tipo"  class="css_tipo_line" style="<?php echo $sStyleReadLab_tipo; ?>"><?php echo $this->form_encode_input($tipo_look); ?></span><span id="id_read_off_tipo" style="<?php echo $sStyleReadInp_tipo; ?>"><div id="idAjaxRadio_tipo" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_tipo_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="tipo" value="F"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['Lookup_tipo'][] = 'F'; ?>
<?php  if ("F" == $this->tipo)  { echo " checked" ;} ?><?php  if (empty($this->tipo)) { echo " checked" ;} ?>  onClick="sc_tipo_onclick()">Física</TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_tipo_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="tipo" value="J"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['Lookup_tipo'][] = 'J'; ?>
<?php  if ("J" == $this->tipo)  { echo " checked" ;} ?>  onClick="sc_tipo_onclick()">Jurídica</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['cpfcnpj']))
    {
        $this->nm_new_label['cpfcnpj'] = "CPF";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cpfcnpj = $this->cpfcnpj;
   $sStyleHidden_cpfcnpj = '';
   if (isset($this->nmgp_cmp_hidden['cpfcnpj']) && $this->nmgp_cmp_hidden['cpfcnpj'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cpfcnpj']);
       $sStyleHidden_cpfcnpj = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cpfcnpj = 'display: none;';
   $sStyleReadInp_cpfcnpj = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cpfcnpj']) && $this->nmgp_cmp_readonly['cpfcnpj'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cpfcnpj']);
       $sStyleReadLab_cpfcnpj = '';
       $sStyleReadInp_cpfcnpj = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cpfcnpj']) && $this->nmgp_cmp_hidden['cpfcnpj'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cpfcnpj" value="<?php echo $this->form_encode_input($cpfcnpj) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cpfcnpj_line" id="hidden_field_data_cpfcnpj" style="<?php echo $sStyleHidden_cpfcnpj; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cpfcnpj_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cpfcnpj_label"><span id="id_label_cpfcnpj"><?php echo $this->nm_new_label['cpfcnpj']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['php_cmp_required']['cpfcnpj']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['php_cmp_required']['cpfcnpj'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cpfcnpj"]) &&  $this->nmgp_cmp_readonly["cpfcnpj"] == "on") { 

 ?>
<input type="hidden" name="cpfcnpj" value="<?php echo $this->form_encode_input($cpfcnpj) . "\">" . $cpfcnpj . ""; ?>
<?php } else { ?>
<span id="id_read_on_cpfcnpj" class="sc-ui-readonly-cpfcnpj css_cpfcnpj_line" style="<?php echo $sStyleReadLab_cpfcnpj; ?>"><?php echo $this->form_encode_input($this->cpfcnpj); ?></span><span id="id_read_off_cpfcnpj" style="white-space: nowrap;<?php echo $sStyleReadInp_cpfcnpj; ?>">
 <input class="sc-js-input scFormObjectOdd css_cpfcnpj_obj" style="" id="id_sc_field_cpfcnpj" type=text name="cpfcnpj" value="<?php echo $this->form_encode_input($cpfcnpj) ?>"
 size=14 alt="{datatype: 'mask', maskList: '999.999.999-99;99.999.999/9999-99', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cpfcnpj_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cpfcnpj_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_tipo_dumb = ('' == $sStyleHidden_tipo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tipo_dumb" style="<?php echo $sStyleHidden_tipo_dumb; ?>"></TD>
<?php $sStyleHidden_cpfcnpj_dumb = ('' == $sStyleHidden_cpfcnpj) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cpfcnpj_dumb" style="<?php echo $sStyleHidden_cpfcnpj_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nome']))
    {
        $this->nm_new_label['nome'] = "Nome";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nome = $this->nome;
   $sStyleHidden_nome = '';
   if (isset($this->nmgp_cmp_hidden['nome']) && $this->nmgp_cmp_hidden['nome'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nome']);
       $sStyleHidden_nome = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nome = 'display: none;';
   $sStyleReadInp_nome = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nome']) && $this->nmgp_cmp_readonly['nome'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nome']);
       $sStyleReadLab_nome = '';
       $sStyleReadInp_nome = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nome']) && $this->nmgp_cmp_hidden['nome'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nome" value="<?php echo $this->form_encode_input($nome) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nome_line" id="hidden_field_data_nome" style="<?php echo $sStyleHidden_nome; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nome_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nome_label"><span id="id_label_nome"><?php echo $this->nm_new_label['nome']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['php_cmp_required']['nome']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['php_cmp_required']['nome'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nome"]) &&  $this->nmgp_cmp_readonly["nome"] == "on") { 

 ?>
<input type="hidden" name="nome" value="<?php echo $this->form_encode_input($nome) . "\">" . $nome . ""; ?>
<?php } else { ?>
<span id="id_read_on_nome" class="sc-ui-readonly-nome css_nome_line" style="<?php echo $sStyleReadLab_nome; ?>"><?php echo $this->form_encode_input($this->nome); ?></span><span id="id_read_off_nome" style="white-space: nowrap;<?php echo $sStyleReadInp_nome; ?>">
 <input class="sc-js-input scFormObjectOdd css_nome_obj" style="" id="id_sc_field_nome" type=text name="nome" value="<?php echo $this->form_encode_input($nome) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nome_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nome_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['nomeres']))
    {
        $this->nm_new_label['nomeres'] = "Nome Resumido";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nomeres = $this->nomeres;
   $sStyleHidden_nomeres = '';
   if (isset($this->nmgp_cmp_hidden['nomeres']) && $this->nmgp_cmp_hidden['nomeres'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nomeres']);
       $sStyleHidden_nomeres = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nomeres = 'display: none;';
   $sStyleReadInp_nomeres = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nomeres']) && $this->nmgp_cmp_readonly['nomeres'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nomeres']);
       $sStyleReadLab_nomeres = '';
       $sStyleReadInp_nomeres = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nomeres']) && $this->nmgp_cmp_hidden['nomeres'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomeres" value="<?php echo $this->form_encode_input($nomeres) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nomeres_line" id="hidden_field_data_nomeres" style="<?php echo $sStyleHidden_nomeres; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nomeres_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nomeres_label"><span id="id_label_nomeres"><?php echo $this->nm_new_label['nomeres']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomeres"]) &&  $this->nmgp_cmp_readonly["nomeres"] == "on") { 

 ?>
<input type="hidden" name="nomeres" value="<?php echo $this->form_encode_input($nomeres) . "\">" . $nomeres . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomeres" class="sc-ui-readonly-nomeres css_nomeres_line" style="<?php echo $sStyleReadLab_nomeres; ?>"><?php echo $this->form_encode_input($this->nomeres); ?></span><span id="id_read_off_nomeres" style="white-space: nowrap;<?php echo $sStyleReadInp_nomeres; ?>">
 <input class="sc-js-input scFormObjectOdd css_nomeres_obj" style="" id="id_sc_field_nomeres" type=text name="nomeres" value="<?php echo $this->form_encode_input($nomeres) ?>"
 size=50 maxlength=80 alt="{datatype: 'text', maxLength: 80, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nomeres_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nomeres_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_nome_dumb = ('' == $sStyleHidden_nome) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_nome_dumb" style="<?php echo $sStyleHidden_nome_dumb; ?>"></TD>
<?php $sStyleHidden_nomeres_dumb = ('' == $sStyleHidden_nomeres) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_nomeres_dumb" style="<?php echo $sStyleHidden_nomeres_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipoinscricao']))
   {
       $this->nm_new_label['tipoinscricao'] = "Tipo Inscricao";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipoinscricao = $this->tipoinscricao;
   $sStyleHidden_tipoinscricao = '';
   if (isset($this->nmgp_cmp_hidden['tipoinscricao']) && $this->nmgp_cmp_hidden['tipoinscricao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipoinscricao']);
       $sStyleHidden_tipoinscricao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipoinscricao = 'display: none;';
   $sStyleReadInp_tipoinscricao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipoinscricao']) && $this->nmgp_cmp_readonly['tipoinscricao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipoinscricao']);
       $sStyleReadLab_tipoinscricao = '';
       $sStyleReadInp_tipoinscricao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipoinscricao']) && $this->nmgp_cmp_hidden['tipoinscricao'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipoinscricao" value="<?php echo $this->form_encode_input($this->tipoinscricao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipoinscricao_line" id="hidden_field_data_tipoinscricao" style="<?php echo $sStyleHidden_tipoinscricao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipoinscricao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipoinscricao_label"><span id="id_label_tipoinscricao"><?php echo $this->nm_new_label['tipoinscricao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipoinscricao"]) &&  $this->nmgp_cmp_readonly["tipoinscricao"] == "on") { 

$tipoinscricao_look = "";
 if ($this->tipoinscricao == "R") { $tipoinscricao_look .= "RG" ;} 
 if ($this->tipoinscricao == "M") { $tipoinscricao_look .= "Municipal" ;} 
 if ($this->tipoinscricao == "F") { $tipoinscricao_look .= "Federal" ;} 
 if (empty($tipoinscricao_look)) { $tipoinscricao_look = $this->tipoinscricao; }
?>
<input type="hidden" name="tipoinscricao" value="<?php echo $this->form_encode_input($tipoinscricao) . "\">" . $tipoinscricao_look . ""; ?>
<?php } else { ?>
<?php

$tipoinscricao_look = "";
 if ($this->tipoinscricao == "R") { $tipoinscricao_look .= "RG" ;} 
 if ($this->tipoinscricao == "M") { $tipoinscricao_look .= "Municipal" ;} 
 if ($this->tipoinscricao == "F") { $tipoinscricao_look .= "Federal" ;} 
 if (empty($tipoinscricao_look)) { $tipoinscricao_look = $this->tipoinscricao; }
?>
<span id="id_read_on_tipoinscricao" class="css_tipoinscricao_line"  style="<?php echo $sStyleReadLab_tipoinscricao; ?>"><?php echo $this->form_encode_input($tipoinscricao_look); ?></span><span id="id_read_off_tipoinscricao" style="<?php echo $sStyleReadInp_tipoinscricao; ?>">
 <span id="idAjaxSelect_tipoinscricao"><select class="sc-js-input scFormObjectOdd css_tipoinscricao_obj" style="" id="id_sc_field_tipoinscricao" name="tipoinscricao" size="1" alt="{type: 'select', enterTab: false}">
 <option value="R" <?php  if ($this->tipoinscricao == "R") { echo " selected" ;} ?><?php  if (empty($this->tipoinscricao)) { echo " selected" ;} ?>>RG</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['Lookup_tipoinscricao'][] = 'R'; ?>
 <option value="M" <?php  if ($this->tipoinscricao == "M") { echo " selected" ;} ?>>Municipal</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['Lookup_tipoinscricao'][] = 'M'; ?>
 <option value="F" <?php  if ($this->tipoinscricao == "F") { echo " selected" ;} ?>>Federal</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['Lookup_tipoinscricao'][] = 'F'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipoinscricao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipoinscricao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['inscricao']))
    {
        $this->nm_new_label['inscricao'] = "Inscricao";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inscricao = $this->inscricao;
   $sStyleHidden_inscricao = '';
   if (isset($this->nmgp_cmp_hidden['inscricao']) && $this->nmgp_cmp_hidden['inscricao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inscricao']);
       $sStyleHidden_inscricao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inscricao = 'display: none;';
   $sStyleReadInp_inscricao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inscricao']) && $this->nmgp_cmp_readonly['inscricao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inscricao']);
       $sStyleReadLab_inscricao = '';
       $sStyleReadInp_inscricao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inscricao']) && $this->nmgp_cmp_hidden['inscricao'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscricao" value="<?php echo $this->form_encode_input($inscricao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_inscricao_line" id="hidden_field_data_inscricao" style="<?php echo $sStyleHidden_inscricao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inscricao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_inscricao_label"><span id="id_label_inscricao"><?php echo $this->nm_new_label['inscricao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscricao"]) &&  $this->nmgp_cmp_readonly["inscricao"] == "on") { 

 ?>
<input type="hidden" name="inscricao" value="<?php echo $this->form_encode_input($inscricao) . "\">" . $inscricao . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscricao" class="sc-ui-readonly-inscricao css_inscricao_line" style="<?php echo $sStyleReadLab_inscricao; ?>"><?php echo $this->form_encode_input($this->inscricao); ?></span><span id="id_read_off_inscricao" style="white-space: nowrap;<?php echo $sStyleReadInp_inscricao; ?>">
 <input class="sc-js-input scFormObjectOdd css_inscricao_obj" style="" id="id_sc_field_inscricao" type=text name="inscricao" value="<?php echo $this->form_encode_input($inscricao) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscricao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscricao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_tipoinscricao_dumb = ('' == $sStyleHidden_tipoinscricao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_tipoinscricao_dumb" style="<?php echo $sStyleHidden_tipoinscricao_dumb; ?>"></TD>
<?php $sStyleHidden_inscricao_dumb = ('' == $sStyleHidden_inscricao) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_inscricao_dumb" style="<?php echo $sStyleHidden_inscricao_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ativo']))
    {
        $this->nm_new_label['ativo'] = "Ativo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ativo = $this->ativo;
   $sStyleHidden_ativo = '';
   if (isset($this->nmgp_cmp_hidden['ativo']) && $this->nmgp_cmp_hidden['ativo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ativo']);
       $sStyleHidden_ativo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ativo = 'display: none;';
   $sStyleReadInp_ativo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ativo']) && $this->nmgp_cmp_readonly['ativo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ativo']);
       $sStyleReadLab_ativo = '';
       $sStyleReadInp_ativo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ativo']) && $this->nmgp_cmp_hidden['ativo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ativo" value="<?php echo $this->form_encode_input($ativo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ativo_line" id="hidden_field_data_ativo" style="<?php echo $sStyleHidden_ativo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ativo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ativo_label"><span id="id_label_ativo"><?php echo $this->nm_new_label['ativo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ativo"]) &&  $this->nmgp_cmp_readonly["ativo"] == "on") { 

 if ("1" == $this->ativo) { $ativo_look = "Sim";} 
 if ("0" == $this->ativo) { $ativo_look = "Não";} 
?>
<input type="hidden" name="ativo" value="<?php echo $this->form_encode_input($ativo) . "\">" . $ativo_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->ativo) { $ativo_look = "Sim";} 
 if ("0" == $this->ativo) { $ativo_look = "Não";} 
?>
<span id="id_read_on_ativo"  class="css_ativo_line" style="<?php echo $sStyleReadLab_ativo; ?>"><?php echo $this->form_encode_input($ativo_look); ?></span><span id="id_read_off_ativo" style="<?php echo $sStyleReadInp_ativo; ?>"><div id="idAjaxRadio_ativo" style="display: inline-block">
<TABLE cellspacing="0" cellpadding="0" border="0"><TR>
  <TD class="scFormDataFontOdd css_ativo_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="ativo" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['Lookup_ativo'][] = '1'; ?>
<?php  if ("1" == $this->ativo)  { echo " checked" ;} ?><?php  if (empty($this->ativo)) { echo " checked" ;} ?>  onClick="" >Sim</TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_ativo_line">    <input style="float:left; position:relative; top: -3px;" type=radio name="ativo" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['Lookup_ativo'][] = '0'; ?>
<?php  if ("0" == $this->ativo)  { echo " checked" ;} ?>  onClick="" >Não</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ativo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ativo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
<?php $sStyleHidden_ativo_dumb = ('' == $sStyleHidden_ativo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_ativo_dumb" style="<?php echo $sStyleHidden_ativo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
<script type="text/javascript">
function sc_control_tabs_1(iTabIndex)
{
  sc_change_tabs(iTabIndex == 1, 'hidden_bloco_1', 'id_tabs_1_1');
  sc_change_tabs(iTabIndex == 2, 'hidden_bloco_2', 'id_tabs_1_2');
  sc_change_tabs(iTabIndex == 3, 'hidden_bloco_3', 'id_tabs_1_3');
  scQuickSearchInit(true, '');
}
</script>
<ul class="scTabLine">
<li id="id_tabs_1_1" class="scTabActive"><a href="javascript: sc_control_tabs_1(1)">Endereços</a></li>
<li id="id_tabs_1_2" class="scTabInactive"><a href="javascript: sc_control_tabs_1(2)">Telefones</a></li>
<li id="id_tabs_1_3" class="scTabInactive"><a href="javascript: sc_control_tabs_1(3)">Carros</a></li>
</ul>
<div style='clear:both'></div>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['md_cli_end']))
    {
        $this->nm_new_label['md_cli_end'] = "Endereço";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $md_cli_end = $this->md_cli_end;
   $sStyleHidden_md_cli_end = '';
   if (isset($this->nmgp_cmp_hidden['md_cli_end']) && $this->nmgp_cmp_hidden['md_cli_end'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['md_cli_end']);
       $sStyleHidden_md_cli_end = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_md_cli_end = 'display: none;';
   $sStyleReadInp_md_cli_end = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['md_cli_end']) && $this->nmgp_cmp_readonly['md_cli_end'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['md_cli_end']);
       $sStyleReadLab_md_cli_end = '';
       $sStyleReadInp_md_cli_end = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['md_cli_end']) && $this->nmgp_cmp_hidden['md_cli_end'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="md_cli_end" value="<?php echo $this->form_encode_input($md_cli_end) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_md_cli_end_line" id="hidden_field_data_md_cli_end" style="<?php echo $sStyleHidden_md_cli_end; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_md_cli_end_line" style="vertical-align: top;padding: 0px">
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['foreign_key']['idcliente'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['where_filter'] = "idCliente = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['where_detal']  = "idCliente = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_cliente_empty.htm' : $this->Ini->link_form_cli_end_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=280px');
?>
<iframe border="0" id="nmsc_iframe_liga_form_cli_end"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="280px" width="100%" name="nmsc_iframe_liga_form_cli_end"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_md_cli_end_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_md_cli_end_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['md_cli_tel2']))
    {
        $this->nm_new_label['md_cli_tel2'] = "Telefone";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $md_cli_tel2 = $this->md_cli_tel2;
   $sStyleHidden_md_cli_tel2 = '';
   if (isset($this->nmgp_cmp_hidden['md_cli_tel2']) && $this->nmgp_cmp_hidden['md_cli_tel2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['md_cli_tel2']);
       $sStyleHidden_md_cli_tel2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_md_cli_tel2 = 'display: none;';
   $sStyleReadInp_md_cli_tel2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['md_cli_tel2']) && $this->nmgp_cmp_readonly['md_cli_tel2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['md_cli_tel2']);
       $sStyleReadLab_md_cli_tel2 = '';
       $sStyleReadInp_md_cli_tel2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['md_cli_tel2']) && $this->nmgp_cmp_hidden['md_cli_tel2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="md_cli_tel2" value="<?php echo $this->form_encode_input($md_cli_tel2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_md_cli_tel2_line" id="hidden_field_data_md_cli_tel2" style="<?php echo $sStyleHidden_md_cli_tel2; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_md_cli_tel2_line" style="vertical-align: top;padding: 0px">
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['foreign_key']['idcliente'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['where_filter'] = "idCliente = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['where_detal']  = "idCliente = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_tel']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_cliente_empty.htm' : $this->Ini->link_form_cli_tel_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=280px');
?>
<iframe border="0" id="nmsc_iframe_liga_form_cli_tel"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="280px" width="100%" name="nmsc_iframe_liga_form_cli_tel"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_md_cli_tel2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_md_cli_tel2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_3"></a>
<div id="div_hidden_bloco_3" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['md_cli_car']))
    {
        $this->nm_new_label['md_cli_car'] = "Carros";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $md_cli_car = $this->md_cli_car;
   $sStyleHidden_md_cli_car = '';
   if (isset($this->nmgp_cmp_hidden['md_cli_car']) && $this->nmgp_cmp_hidden['md_cli_car'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['md_cli_car']);
       $sStyleHidden_md_cli_car = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_md_cli_car = 'display: none;';
   $sStyleReadInp_md_cli_car = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['md_cli_car']) && $this->nmgp_cmp_readonly['md_cli_car'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['md_cli_car']);
       $sStyleReadLab_md_cli_car = '';
       $sStyleReadInp_md_cli_car = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['md_cli_car']) && $this->nmgp_cmp_hidden['md_cli_car'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="md_cli_car" value="<?php echo $this->form_encode_input($md_cli_car) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_md_cli_car_line" id="hidden_field_data_md_cli_car" style="<?php echo $sStyleHidden_md_cli_car; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_md_cli_car_line" style="vertical-align: top;padding: 0px">
<?php
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_proc']  = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_form']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_call']  = true;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_multi'] = false;
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_parms'] = "NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['foreign_key']['idcliente'] = $this->nmgp_dados_form['id'];
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['where_filter'] = "idCliente = " . $this->nmgp_dados_form['id'] . "";
 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['where_detal']  = "idCliente = " . $this->nmgp_dados_form['id'] . "";
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['total'] < 0)
 {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_cliente_empty.htm' : $this->Ini->link_form_cli_car_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page . '&script_case_session=' . session_id() . '&script_case_detail=Y&sc_ifr_height=280px');
?>
<iframe border="0" id="nmsc_iframe_liga_form_cli_car"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="280px" width="100%" name="nmsc_iframe_liga_form_cli_car"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_md_cli_car_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_md_cli_car_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






</TABLE></div><!-- bloco_f -->
<?php
  }
?>
</td></tr>
<tr><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);
  $nm_sc_blocos_aba    = array(1 => 1,2 => 1,3 => 1);
  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);
  $nm_sc_blocos_aba    = array(1 => 1,2 => 1,3 => 1);
  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['masterValue']);
?>
}
<?php
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cliente");
 parent.scAjaxDetailHeight("form_cliente", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_cliente", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cliente", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cliente']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
</body> 
</html> 
