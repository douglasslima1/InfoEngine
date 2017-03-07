<?php
class form_cli_car_form extends form_cli_car_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - cli_car"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - cli_car"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
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
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cli_car/form_cli_car_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cli_car_sajax_js.php");
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
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
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
<?php

include_once('form_cli_car_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
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
 include_once("form_cli_car_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
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
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" /> 
<?php
$_SESSION['scriptcase']['error_span_title']['form_cli_car'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cli_car'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - cli_car"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - cli_car"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['fast_search'][2] : "";
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
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "do_ajax_form_cli_car_add_new_line(); return false;", "do_ajax_form_cli_car_add_new_line(); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
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
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R")
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
   if (!isset($this->nmgp_cmp_hidden['id_']))
   {
       $this->nmgp_cmp_hidden['id_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idcliente_']))
   {
       $this->nmgp_cmp_hidden['idcliente_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['id_']) || $this->nmgp_cmp_hidden['id_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_'])) {
          $this->nm_new_label['id_'] = "Id"; } ?>

    <TD class="scFormLabelOddMult css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>" > <?php echo $this->nm_new_label['id_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idcliente_']) && $this->nmgp_cmp_hidden['idcliente_'] == 'off') { $sStyleHidden_idcliente_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idcliente_']) || $this->nmgp_cmp_hidden['idcliente_'] == 'on') {
      if (!isset($this->nm_new_label['idcliente_'])) {
          $this->nm_new_label['idcliente_'] = "Id Cliente"; } ?>

    <TD class="scFormLabelOddMult css_idcliente__label" id="hidden_field_label_idcliente_" style="<?php echo $sStyleHidden_idcliente_; ?>" > <?php echo $this->nm_new_label['idcliente_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idmarca_']) && $this->nmgp_cmp_hidden['idmarca_'] == 'off') { $sStyleHidden_idmarca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idmarca_']) || $this->nmgp_cmp_hidden['idmarca_'] == 'on') {
      if (!isset($this->nm_new_label['idmarca_'])) {
          $this->nm_new_label['idmarca_'] = "Marca"; } ?>

    <TD class="scFormLabelOddMult css_idmarca__label" id="hidden_field_label_idmarca_" style="<?php echo $sStyleHidden_idmarca_; ?>" > <?php echo $this->nm_new_label['idmarca_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idmodelo_']) && $this->nmgp_cmp_hidden['idmodelo_'] == 'off') { $sStyleHidden_idmodelo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idmodelo_']) || $this->nmgp_cmp_hidden['idmodelo_'] == 'on') {
      if (!isset($this->nm_new_label['idmodelo_'])) {
          $this->nm_new_label['idmodelo_'] = "Modelo"; } ?>

    <TD class="scFormLabelOddMult css_idmodelo__label" id="hidden_field_label_idmodelo_" style="<?php echo $sStyleHidden_idmodelo_; ?>" > <?php echo $this->nm_new_label['idmodelo_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idcor_']) && $this->nmgp_cmp_hidden['idcor_'] == 'off') { $sStyleHidden_idcor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idcor_']) || $this->nmgp_cmp_hidden['idcor_'] == 'on') {
      if (!isset($this->nm_new_label['idcor_'])) {
          $this->nm_new_label['idcor_'] = "Cor"; } ?>

    <TD class="scFormLabelOddMult css_idcor__label" id="hidden_field_label_idcor_" style="<?php echo $sStyleHidden_idcor_; ?>" > <?php echo $this->nm_new_label['idcor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['placa_']) && $this->nmgp_cmp_hidden['placa_'] == 'off') { $sStyleHidden_placa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['placa_']) || $this->nmgp_cmp_hidden['placa_'] == 'on') {
      if (!isset($this->nm_new_label['placa_'])) {
          $this->nm_new_label['placa_'] = "Placa"; } ?>

    <TD class="scFormLabelOddMult css_placa__label" id="hidden_field_label_placa_" style="<?php echo $sStyleHidden_placa_; ?>" > <?php echo $this->nm_new_label['placa_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ano_']) && $this->nmgp_cmp_hidden['ano_'] == 'off') { $sStyleHidden_ano_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ano_']) || $this->nmgp_cmp_hidden['ano_'] == 'on') {
      if (!isset($this->nm_new_label['ano_'])) {
          $this->nm_new_label['ano_'] = "Ano"; } ?>

    <TD class="scFormLabelOddMult css_ano__label" id="hidden_field_label_ano_" style="<?php echo $sStyleHidden_ano_; ?>" > <?php echo $this->nm_new_label['ano_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sStyleHidden_obs_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['obs_']) || $this->nmgp_cmp_hidden['obs_'] == 'on') {
      if (!isset($this->nm_new_label['obs_'])) {
          $this->nm_new_label['obs_'] = "Obs"; } ?>

    <TD class="scFormLabelOddMult css_obs__label" id="hidden_field_label_obs_" style="<?php echo $sStyleHidden_obs_; ?>" > <?php echo $this->nm_new_label['obs_'] ?> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_cli_car);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_cli_car = $this->form_vert_form_cli_car;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_cli_car))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
   foreach ($this->form_vert_form_cli_car as $sc_seq_vert => $sc_lixo)
   {
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_'] = true;
           $this->nmgp_cmp_readonly['idcliente_'] = true;
           $this->nmgp_cmp_readonly['idmarca_'] = true;
           $this->nmgp_cmp_readonly['idmodelo_'] = true;
           $this->nmgp_cmp_readonly['idcor_'] = true;
           $this->nmgp_cmp_readonly['placa_'] = true;
           $this->nmgp_cmp_readonly['ano_'] = true;
           $this->nmgp_cmp_readonly['obs_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idcliente_']) || $this->nmgp_cmp_readonly['idcliente_'] != "on") {$this->nmgp_cmp_readonly['idcliente_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idmarca_']) || $this->nmgp_cmp_readonly['idmarca_'] != "on") {$this->nmgp_cmp_readonly['idmarca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idmodelo_']) || $this->nmgp_cmp_readonly['idmodelo_'] != "on") {$this->nmgp_cmp_readonly['idmodelo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idcor_']) || $this->nmgp_cmp_readonly['idcor_'] != "on") {$this->nmgp_cmp_readonly['idcor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['placa_']) || $this->nmgp_cmp_readonly['placa_'] != "on") {$this->nmgp_cmp_readonly['placa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ano_']) || $this->nmgp_cmp_readonly['ano_'] != "on") {$this->nmgp_cmp_readonly['ano_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['obs_']) || $this->nmgp_cmp_readonly['obs_'] != "on") {$this->nmgp_cmp_readonly['obs_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_ = $this->form_vert_form_cli_car[$sc_seq_vert]['id_']; 
       $id_ = $this->id_; 
       if (!isset($this->nmgp_cmp_hidden['id_']))
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }
       $sStyleHidden_id_ = '';
       if (isset($sCheckRead_id_))
       {
           unset($sCheckRead_id_);
       }
       if (isset($this->nmgp_cmp_readonly['id_']))
       {
           $sCheckRead_id_ = $this->nmgp_cmp_readonly['id_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_']);
           $sStyleHidden_id_ = 'display: none;';
       }
       $bTestReadOnly_id_ = true;
       $sStyleReadLab_id_ = 'display: none;';
       $sStyleReadInp_id_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_"]) &&  $this->nmgp_cmp_readonly["id_"] == "on"))
       {
           $bTestReadOnly_id_ = false;
           unset($this->nmgp_cmp_readonly['id_']);
           $sStyleReadLab_id_ = '';
           $sStyleReadInp_id_ = 'display: none;';
       }
       $this->idcliente_ = $this->form_vert_form_cli_car[$sc_seq_vert]['idcliente_']; 
       $idcliente_ = $this->idcliente_; 
       if (!isset($this->nmgp_cmp_hidden['idcliente_']))
       {
           $this->nmgp_cmp_hidden['idcliente_'] = 'off';
       }
       $sStyleHidden_idcliente_ = '';
       if (isset($sCheckRead_idcliente_))
       {
           unset($sCheckRead_idcliente_);
       }
       if (isset($this->nmgp_cmp_readonly['idcliente_']))
       {
           $sCheckRead_idcliente_ = $this->nmgp_cmp_readonly['idcliente_'];
       }
       if (isset($this->nmgp_cmp_hidden['idcliente_']) && $this->nmgp_cmp_hidden['idcliente_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idcliente_']);
           $sStyleHidden_idcliente_ = 'display: none;';
       }
       $bTestReadOnly_idcliente_ = true;
       $sStyleReadLab_idcliente_ = 'display: none;';
       $sStyleReadInp_idcliente_ = '';
       if (isset($this->nmgp_cmp_readonly['idcliente_']) && $this->nmgp_cmp_readonly['idcliente_'] == 'on')
       {
           $bTestReadOnly_idcliente_ = false;
           unset($this->nmgp_cmp_readonly['idcliente_']);
           $sStyleReadLab_idcliente_ = '';
           $sStyleReadInp_idcliente_ = 'display: none;';
       }
       $this->idmarca_ = $this->form_vert_form_cli_car[$sc_seq_vert]['idmarca_']; 
       $idmarca_ = $this->idmarca_; 
       $sStyleHidden_idmarca_ = '';
       if (isset($sCheckRead_idmarca_))
       {
           unset($sCheckRead_idmarca_);
       }
       if (isset($this->nmgp_cmp_readonly['idmarca_']))
       {
           $sCheckRead_idmarca_ = $this->nmgp_cmp_readonly['idmarca_'];
       }
       if (isset($this->nmgp_cmp_hidden['idmarca_']) && $this->nmgp_cmp_hidden['idmarca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idmarca_']);
           $sStyleHidden_idmarca_ = 'display: none;';
       }
       $bTestReadOnly_idmarca_ = true;
       $sStyleReadLab_idmarca_ = 'display: none;';
       $sStyleReadInp_idmarca_ = '';
       if (isset($this->nmgp_cmp_readonly['idmarca_']) && $this->nmgp_cmp_readonly['idmarca_'] == 'on')
       {
           $bTestReadOnly_idmarca_ = false;
           unset($this->nmgp_cmp_readonly['idmarca_']);
           $sStyleReadLab_idmarca_ = '';
           $sStyleReadInp_idmarca_ = 'display: none;';
       }
       $this->idmodelo_ = $this->form_vert_form_cli_car[$sc_seq_vert]['idmodelo_']; 
       $idmodelo_ = $this->idmodelo_; 
       $sStyleHidden_idmodelo_ = '';
       if (isset($sCheckRead_idmodelo_))
       {
           unset($sCheckRead_idmodelo_);
       }
       if (isset($this->nmgp_cmp_readonly['idmodelo_']))
       {
           $sCheckRead_idmodelo_ = $this->nmgp_cmp_readonly['idmodelo_'];
       }
       if (isset($this->nmgp_cmp_hidden['idmodelo_']) && $this->nmgp_cmp_hidden['idmodelo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idmodelo_']);
           $sStyleHidden_idmodelo_ = 'display: none;';
       }
       $bTestReadOnly_idmodelo_ = true;
       $sStyleReadLab_idmodelo_ = 'display: none;';
       $sStyleReadInp_idmodelo_ = '';
       if (isset($this->nmgp_cmp_readonly['idmodelo_']) && $this->nmgp_cmp_readonly['idmodelo_'] == 'on')
       {
           $bTestReadOnly_idmodelo_ = false;
           unset($this->nmgp_cmp_readonly['idmodelo_']);
           $sStyleReadLab_idmodelo_ = '';
           $sStyleReadInp_idmodelo_ = 'display: none;';
       }
       $this->idcor_ = $this->form_vert_form_cli_car[$sc_seq_vert]['idcor_']; 
       $idcor_ = $this->idcor_; 
       $sStyleHidden_idcor_ = '';
       if (isset($sCheckRead_idcor_))
       {
           unset($sCheckRead_idcor_);
       }
       if (isset($this->nmgp_cmp_readonly['idcor_']))
       {
           $sCheckRead_idcor_ = $this->nmgp_cmp_readonly['idcor_'];
       }
       if (isset($this->nmgp_cmp_hidden['idcor_']) && $this->nmgp_cmp_hidden['idcor_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idcor_']);
           $sStyleHidden_idcor_ = 'display: none;';
       }
       $bTestReadOnly_idcor_ = true;
       $sStyleReadLab_idcor_ = 'display: none;';
       $sStyleReadInp_idcor_ = '';
       if (isset($this->nmgp_cmp_readonly['idcor_']) && $this->nmgp_cmp_readonly['idcor_'] == 'on')
       {
           $bTestReadOnly_idcor_ = false;
           unset($this->nmgp_cmp_readonly['idcor_']);
           $sStyleReadLab_idcor_ = '';
           $sStyleReadInp_idcor_ = 'display: none;';
       }
       $this->placa_ = $this->form_vert_form_cli_car[$sc_seq_vert]['placa_']; 
       $placa_ = $this->placa_; 
       $sStyleHidden_placa_ = '';
       if (isset($sCheckRead_placa_))
       {
           unset($sCheckRead_placa_);
       }
       if (isset($this->nmgp_cmp_readonly['placa_']))
       {
           $sCheckRead_placa_ = $this->nmgp_cmp_readonly['placa_'];
       }
       if (isset($this->nmgp_cmp_hidden['placa_']) && $this->nmgp_cmp_hidden['placa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['placa_']);
           $sStyleHidden_placa_ = 'display: none;';
       }
       $bTestReadOnly_placa_ = true;
       $sStyleReadLab_placa_ = 'display: none;';
       $sStyleReadInp_placa_ = '';
       if (isset($this->nmgp_cmp_readonly['placa_']) && $this->nmgp_cmp_readonly['placa_'] == 'on')
       {
           $bTestReadOnly_placa_ = false;
           unset($this->nmgp_cmp_readonly['placa_']);
           $sStyleReadLab_placa_ = '';
           $sStyleReadInp_placa_ = 'display: none;';
       }
       $this->ano_ = $this->form_vert_form_cli_car[$sc_seq_vert]['ano_']; 
       $ano_ = $this->ano_; 
       $sStyleHidden_ano_ = '';
       if (isset($sCheckRead_ano_))
       {
           unset($sCheckRead_ano_);
       }
       if (isset($this->nmgp_cmp_readonly['ano_']))
       {
           $sCheckRead_ano_ = $this->nmgp_cmp_readonly['ano_'];
       }
       if (isset($this->nmgp_cmp_hidden['ano_']) && $this->nmgp_cmp_hidden['ano_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ano_']);
           $sStyleHidden_ano_ = 'display: none;';
       }
       $bTestReadOnly_ano_ = true;
       $sStyleReadLab_ano_ = 'display: none;';
       $sStyleReadInp_ano_ = '';
       if (isset($this->nmgp_cmp_readonly['ano_']) && $this->nmgp_cmp_readonly['ano_'] == 'on')
       {
           $bTestReadOnly_ano_ = false;
           unset($this->nmgp_cmp_readonly['ano_']);
           $sStyleReadLab_ano_ = '';
           $sStyleReadInp_ano_ = 'display: none;';
       }
       $this->obs_ = $this->form_vert_form_cli_car[$sc_seq_vert]['obs_']; 
       $obs_ = $this->obs_; 
       $obs__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $obs_);
       $obs__val = nl2br($obs__tmp);
       $sStyleHidden_obs_ = '';
       if (isset($sCheckRead_obs_))
       {
           unset($sCheckRead_obs_);
       }
       if (isset($this->nmgp_cmp_readonly['obs_']))
       {
           $sCheckRead_obs_ = $this->nmgp_cmp_readonly['obs_'];
       }
       if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['obs_']);
           $sStyleHidden_obs_ = 'display: none;';
       }
       $bTestReadOnly_obs_ = true;
       $sStyleReadLab_obs_ = 'display: none;';
       $sStyleReadInp_obs_ = '';
       if (isset($this->nmgp_cmp_readonly['obs_']) && $this->nmgp_cmp_readonly['obs_'] == 'on')
       {
           $bTestReadOnly_obs_ = false;
           unset($this->nmgp_cmp_readonly['obs_']);
           $sStyleReadLab_obs_ = '';
           $sStyleReadInp_obs_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl)) { echo " checked";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_botoes['delete'] == "on" && $this->nmgp_opcao != "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_botoes['update'] == "on" && $this->nmgp_opcao != "novo") {
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_cli_car_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_cli_car_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cli_car_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_cli_car_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cli_car_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_cli_car_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id__line" id="hidden_field_data_id_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_<?php echo $sc_seq_vert ?>" class="css_id__line" style="<?php echo $sStyleReadLab_id_; ?>"><?php echo $this->form_encode_input($this->id_); ?></span><span id="id_read_off_id_<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_; ?>"><input type="hidden" id="id_sc_field_id_<?php echo $sc_seq_vert ?>" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"?><span id="id_ajax_label_id_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idcliente_']) && $this->nmgp_cmp_hidden['idcliente_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idcliente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idcliente_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idcliente__line" id="hidden_field_data_idcliente_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idcliente_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idcliente__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idcliente_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcliente_"]) &&  $this->nmgp_cmp_readonly["idcliente_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $old_value_placa_ = $this->placa_;
   $old_value_ano_ = $this->ano_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_placa_ = $this->placa_;
   $unformatted_value_ano_ = $this->ano_;

   $nm_comando = "SELECT id, id FROM cliente ORDER BY id";

   $this->id_ = $old_value_id_;
   $this->placa_ = $old_value_placa_;
   $this->ano_ = $old_value_ano_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $idcliente__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idcliente__1))
          {
              foreach ($this->idcliente__1 as $tmp_idcliente_)
              {
                  if (trim($tmp_idcliente_) === trim($cadaselect[1])) { $idcliente__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idcliente_) === trim($cadaselect[1])) { $idcliente__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idcliente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idcliente_) . "\">" . $idcliente__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $old_value_placa_ = $this->placa_;
   $old_value_ano_ = $this->ano_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_placa_ = $this->placa_;
   $unformatted_value_ano_ = $this->ano_;

   $nm_comando = "SELECT id, id FROM cliente ORDER BY id";

   $this->id_ = $old_value_id_;
   $this->placa_ = $old_value_placa_;
   $this->ano_ = $old_value_ano_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcliente_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $idcliente__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idcliente__1))
          {
              foreach ($this->idcliente__1 as $tmp_idcliente_)
              {
                  if (trim($tmp_idcliente_) === trim($cadaselect[1])) { $idcliente__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idcliente_) === trim($cadaselect[1])) { $idcliente__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idcliente__look))
          {
              $idcliente__look = $this->idcliente_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idcliente_" . $sc_seq_vert . "\" class=\"css_idcliente__line\" style=\"" .  $sStyleReadLab_idcliente_ . "\">" . $this->form_encode_input($idcliente__look) . "</span><span id=\"id_read_off_idcliente_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_idcliente_ . "\">";
   echo " <span id=\"idAjaxSelect_idcliente_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_idcliente__obj\" style=\"\" id=\"id_sc_field_idcliente_" . $sc_seq_vert . "\" name=\"idcliente_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idcliente_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idcliente_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcliente_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcliente_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idmarca_']) && $this->nmgp_cmp_hidden['idmarca_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idmarca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idmarca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idmarca__line" id="hidden_field_data_idmarca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idmarca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idmarca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idmarca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idmarca_"]) &&  $this->nmgp_cmp_readonly["idmarca_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $old_value_placa_ = $this->placa_;
   $old_value_ano_ = $this->ano_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_placa_ = $this->placa_;
   $unformatted_value_ano_ = $this->ano_;

   $nm_comando = "SELECT id, marca 
FROM tbl_marcas 
ORDER BY marca";

   $this->id_ = $old_value_id_;
   $this->placa_ = $old_value_placa_;
   $this->ano_ = $old_value_ano_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $idmarca__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmarca__1))
          {
              foreach ($this->idmarca__1 as $tmp_idmarca_)
              {
                  if (trim($tmp_idmarca_) === trim($cadaselect[1])) { $idmarca__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmarca_) === trim($cadaselect[1])) { $idmarca__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idmarca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idmarca_) . "\">" . $idmarca__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $old_value_placa_ = $this->placa_;
   $old_value_ano_ = $this->ano_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_placa_ = $this->placa_;
   $unformatted_value_ano_ = $this->ano_;

   $nm_comando = "SELECT id, marca 
FROM tbl_marcas 
ORDER BY marca";

   $this->id_ = $old_value_id_;
   $this->placa_ = $old_value_placa_;
   $this->ano_ = $old_value_ano_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $idmarca__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmarca__1))
          {
              foreach ($this->idmarca__1 as $tmp_idmarca_)
              {
                  if (trim($tmp_idmarca_) === trim($cadaselect[1])) { $idmarca__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmarca_) === trim($cadaselect[1])) { $idmarca__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idmarca__look))
          {
              $idmarca__look = $this->idmarca_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idmarca_" . $sc_seq_vert . "\" class=\"css_idmarca__line\" style=\"" .  $sStyleReadLab_idmarca_ . "\">" . $this->form_encode_input($idmarca__look) . "</span><span id=\"id_read_off_idmarca_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_idmarca_ . "\">";
   echo " <span id=\"idAjaxSelect_idmarca_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_idmarca__obj\" style=\"\" id=\"id_sc_field_idmarca_" . $sc_seq_vert . "\" name=\"idmarca_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmarca_'][] = ''; 
   echo "  <option value=\"\">Selecione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idmarca_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idmarca_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idmarca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idmarca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idmodelo_']) && $this->nmgp_cmp_hidden['idmodelo_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idmodelo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idmodelo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idmodelo__line" id="hidden_field_data_idmodelo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idmodelo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idmodelo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idmodelo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idmodelo_"]) &&  $this->nmgp_cmp_readonly["idmodelo_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'] = array(); 
}
if ($this->idmarca_ != "")
{ 
   $this->nm_clear_val("idmarca_");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $old_value_placa_ = $this->placa_;
   $old_value_ano_ = $this->ano_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_placa_ = $this->placa_;
   $unformatted_value_ano_ = $this->ano_;

   $nm_comando = "SELECT id, modelo 
FROM tbl_modelos 
WHERE marca = '$this->idmarca_'
ORDER BY modelo";

   $this->id_ = $old_value_id_;
   $this->placa_ = $old_value_placa_;
   $this->ano_ = $old_value_ano_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
   $x = 0; 
   $idmodelo__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmodelo__1))
          {
              foreach ($this->idmodelo__1 as $tmp_idmodelo_)
              {
                  if (trim($tmp_idmodelo_) === trim($cadaselect[1])) { $idmodelo__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmodelo_) === trim($cadaselect[1])) { $idmodelo__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idmodelo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idmodelo_) . "\">" . $idmodelo__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'] = array(); 
}
if ($this->idmarca_ != "")
{ 
   $this->nm_clear_val("idmarca_");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $old_value_placa_ = $this->placa_;
   $old_value_ano_ = $this->ano_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_placa_ = $this->placa_;
   $unformatted_value_ano_ = $this->ano_;

   $nm_comando = "SELECT id, modelo 
FROM tbl_modelos 
WHERE marca = '$this->idmarca_'
ORDER BY modelo";

   $this->id_ = $old_value_id_;
   $this->placa_ = $old_value_placa_;
   $this->ano_ = $old_value_ano_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $idmodelo__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idmodelo__1))
          {
              foreach ($this->idmodelo__1 as $tmp_idmodelo_)
              {
                  if (trim($tmp_idmodelo_) === trim($cadaselect[1])) { $idmodelo__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idmodelo_) === trim($cadaselect[1])) { $idmodelo__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idmodelo__look))
          {
              $idmodelo__look = $this->idmodelo_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idmodelo_" . $sc_seq_vert . "\" class=\"css_idmodelo__line\" style=\"" .  $sStyleReadLab_idmodelo_ . "\">" . $this->form_encode_input($idmodelo__look) . "</span><span id=\"id_read_off_idmodelo_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_idmodelo_ . "\">";
   echo " <span id=\"idAjaxSelect_idmodelo_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_idmodelo__obj\" style=\"\" id=\"id_sc_field_idmodelo_" . $sc_seq_vert . "\" name=\"idmodelo_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idmodelo_'][] = ''; 
   echo "  <option value=\"\">Selecione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idmodelo_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idmodelo_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idmodelo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idmodelo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idcor_']) && $this->nmgp_cmp_hidden['idcor_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idcor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idcor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idcor__line" id="hidden_field_data_idcor_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idcor_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idcor__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idcor_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcor_"]) &&  $this->nmgp_cmp_readonly["idcor_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $old_value_placa_ = $this->placa_;
   $old_value_ano_ = $this->ano_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_placa_ = $this->placa_;
   $unformatted_value_ano_ = $this->ano_;

   $nm_comando = "SELECT id, descricao FROM cor ORDER BY id";

   $this->id_ = $old_value_id_;
   $this->placa_ = $old_value_placa_;
   $this->ano_ = $old_value_ano_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $idcor__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idcor__1))
          {
              foreach ($this->idcor__1 as $tmp_idcor_)
              {
                  if (trim($tmp_idcor_) === trim($cadaselect[1])) { $idcor__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idcor_) === trim($cadaselect[1])) { $idcor__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idcor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idcor_) . "\">" . $idcor__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $old_value_placa_ = $this->placa_;
   $old_value_ano_ = $this->ano_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_placa_ = $this->placa_;
   $unformatted_value_ano_ = $this->ano_;

   $nm_comando = "SELECT id, descricao FROM cor ORDER BY id";

   $this->id_ = $old_value_id_;
   $this->placa_ = $old_value_placa_;
   $this->ano_ = $old_value_ano_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   $x = 0; 
   $idcor__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idcor__1))
          {
              foreach ($this->idcor__1 as $tmp_idcor_)
              {
                  if (trim($tmp_idcor_) === trim($cadaselect[1])) { $idcor__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idcor_) === trim($cadaselect[1])) { $idcor__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idcor__look))
          {
              $idcor__look = $this->idcor_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idcor_" . $sc_seq_vert . "\" class=\"css_idcor__line\" style=\"" .  $sStyleReadLab_idcor_ . "\">" . $this->form_encode_input($idcor__look) . "</span><span id=\"id_read_off_idcor_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_idcor_ . "\">";
   echo " <span id=\"idAjaxSelect_idcor_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_idcor__obj\" style=\"\" id=\"id_sc_field_idcor_" . $sc_seq_vert . "\" name=\"idcor_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['Lookup_idcor_'][] = ''; 
   echo "  <option value=\"\">Selecione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idcor_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idcor_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcor_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcor_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['placa_']) && $this->nmgp_cmp_hidden['placa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="placa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($placa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_placa__line" id="hidden_field_data_placa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_placa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_placa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_placa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["placa_"]) &&  $this->nmgp_cmp_readonly["placa_"] == "on") { 

 ?>
<input type="hidden" name="placa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($placa_) . "\">" . $placa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_placa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-placa_<?php echo $sc_seq_vert ?> css_placa__line" style="<?php echo $sStyleReadLab_placa_; ?>"><?php echo $this->form_encode_input($this->placa_); ?></span><span id="id_read_off_placa_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_placa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_placa__obj" style="" id="id_sc_field_placa_<?php echo $sc_seq_vert ?>" type=text name="placa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($placa_) ?>"
 size=10 maxlength=18 alt="{datatype: 'mask', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', maskList: 'aaa-9999', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_placa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_placa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ano_']) && $this->nmgp_cmp_hidden['ano_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ano_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ano_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ano__line" id="hidden_field_data_ano_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ano_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ano__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ano_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ano_"]) &&  $this->nmgp_cmp_readonly["ano_"] == "on") { 

 ?>
<input type="hidden" name="ano_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ano_) . "\">" . $ano_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ano_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ano_<?php echo $sc_seq_vert ?> css_ano__line" style="<?php echo $sStyleReadLab_ano_; ?>"><?php echo $this->form_encode_input($this->ano_); ?></span><span id="id_read_off_ano_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ano_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ano__obj" style="" id="id_sc_field_ano_<?php echo $sc_seq_vert ?>" type=text name="ano_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ano_) ?>"
 size=4 alt="{datatype: 'integer', maxLength: 4, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ano_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ano_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ano_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ano_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($obs_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_obs__line" id="hidden_field_data_obs_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_obs_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_obs__line" style="vertical-align: top;padding: 0px">
<?php
$obs__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obs_));

?>

<?php if ($bTestReadOnly_obs_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obs_"]) &&  $this->nmgp_cmp_readonly["obs_"] == "on") { 

 ?>
<input type="hidden" name="obs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($obs_) . "\">" . $obs__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-obs_<?php echo $sc_seq_vert ?> css_obs__line" style="<?php echo $sStyleReadLab_obs_; ?>"><?php echo $this->form_encode_input($obs__val); ?></span><span id="id_read_off_obs_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obs_; ?>">
 <textarea  class="sc-js-input scFormObjectOddMult css_obs__obj" style="white-space: pre-wrap;" name="obs_<?php echo $sc_seq_vert ?>" id="id_sc_field_obs_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}">
<?php echo $obs_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_))
       {
           $this->nmgp_cmp_readonly['id_'] = $sCheckRead_id_;
       }
       if ('display: none;' == $sStyleHidden_id_)
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }
       if (isset($sCheckRead_idcliente_))
       {
           $this->nmgp_cmp_readonly['idcliente_'] = $sCheckRead_idcliente_;
       }
       if ('display: none;' == $sStyleHidden_idcliente_)
       {
           $this->nmgp_cmp_hidden['idcliente_'] = 'off';
       }
       if (isset($sCheckRead_idmarca_))
       {
           $this->nmgp_cmp_readonly['idmarca_'] = $sCheckRead_idmarca_;
       }
       if ('display: none;' == $sStyleHidden_idmarca_)
       {
           $this->nmgp_cmp_hidden['idmarca_'] = 'off';
       }
       if (isset($sCheckRead_idmodelo_))
       {
           $this->nmgp_cmp_readonly['idmodelo_'] = $sCheckRead_idmodelo_;
       }
       if ('display: none;' == $sStyleHidden_idmodelo_)
       {
           $this->nmgp_cmp_hidden['idmodelo_'] = 'off';
       }
       if (isset($sCheckRead_idcor_))
       {
           $this->nmgp_cmp_readonly['idcor_'] = $sCheckRead_idcor_;
       }
       if ('display: none;' == $sStyleHidden_idcor_)
       {
           $this->nmgp_cmp_hidden['idcor_'] = 'off';
       }
       if (isset($sCheckRead_placa_))
       {
           $this->nmgp_cmp_readonly['placa_'] = $sCheckRead_placa_;
       }
       if ('display: none;' == $sStyleHidden_placa_)
       {
           $this->nmgp_cmp_hidden['placa_'] = 'off';
       }
       if (isset($sCheckRead_ano_))
       {
           $this->nmgp_cmp_readonly['ano_'] = $sCheckRead_ano_;
       }
       if ('display: none;' == $sStyleHidden_ano_)
       {
           $this->nmgp_cmp_hidden['ano_'] = 'off';
       }
       if (isset($sCheckRead_obs_))
       {
           $this->nmgp_cmp_readonly['obs_'] = $sCheckRead_obs_;
       }
       if ('display: none;' == $sStyleHidden_obs_)
       {
           $this->nmgp_cmp_hidden['obs_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_cli_car = $guarda_form_vert_form_cli_car;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div> 
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R")
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
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['masterValue']);
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
 parent.scAjaxDetailStatus("form_cli_car");
 parent.scAjaxDetailHeight("form_cli_car", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_cli_car", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cli_car", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_car']['sc_modal'])
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
</body> 
</html> 
<?php 
 } 
} 
?> 
