<?php
class form_cli_end_form extends form_cli_end_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - cli_end"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - cli_end"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_cli_end/form_cli_end_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cli_end_sajax_js.php");
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

 function nm_field_disabled(Fields, Opt, Seq, Opcao) {
  if (Opcao != null) {
      opcao = Opcao;
  }
  else {
      opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  }
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     ini = 1;
     xx = document.F1.sc_contr_vert.value;
     if (Seq != null) 
     {
         ini = parseInt(Seq);
         xx  = ini + 1;
     }
     if (F_name == "endereco_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "endereco_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "bairro_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "bairro_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "municipio_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "municipio_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "idestado_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "idestado_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("endereco_=enabled", "", i);
    nm_field_disabled("bairro_=enabled", "", i);
    nm_field_disabled("municipio_=enabled", "", i);
    nm_field_disabled("idestado_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_cli_end_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  sc_form_onload();

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['recarga'];
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
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
 include_once("form_cli_end_js0.php");
?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
$_SESSION['scriptcase']['error_span_title']['form_cli_end'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cli_end'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - cli_end"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - cli_end"; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['fast_search'][2] : "";
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
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "do_ajax_form_cli_end_add_new_line(); return false;", "do_ajax_form_cli_end_add_new_line(); return false;", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['empty_filter'] = true;
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
   <?php if (isset($this->nmgp_cmp_hidden['idcliente_']) && $this->nmgp_cmp_hidden['idcliente_'] == 'off') { $sStyleHidden_idcliente_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idcliente_']) || $this->nmgp_cmp_hidden['idcliente_'] == 'on') {
      if (!isset($this->nm_new_label['idcliente_'])) {
          $this->nm_new_label['idcliente_'] = "Id Cliente"; } ?>

    <TD class="scFormLabelOddMult css_idcliente__label" id="hidden_field_label_idcliente_" style="<?php echo $sStyleHidden_idcliente_; ?>" > <?php echo $this->nm_new_label['idcliente_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off') { $sStyleHidden_tipo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tipo_']) || $this->nmgp_cmp_hidden['tipo_'] == 'on') {
      if (!isset($this->nm_new_label['tipo_'])) {
          $this->nm_new_label['tipo_'] = "Tipo"; } ?>

    <TD class="scFormLabelOddMult css_tipo__label" id="hidden_field_label_tipo_" style="<?php echo $sStyleHidden_tipo_; ?>" > <?php echo $this->nm_new_label['tipo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cep_']) && $this->nmgp_cmp_hidden['cep_'] == 'off') { $sStyleHidden_cep_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cep_']) || $this->nmgp_cmp_hidden['cep_'] == 'on') {
      if (!isset($this->nm_new_label['cep_'])) {
          $this->nm_new_label['cep_'] = "Cep"; } ?>

    <TD class="scFormLabelOddMult css_cep__label" id="hidden_field_label_cep_" style="<?php echo $sStyleHidden_cep_; ?>" > <?php echo $this->nm_new_label['cep_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['endereco_']) && $this->nmgp_cmp_hidden['endereco_'] == 'off') { $sStyleHidden_endereco_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['endereco_']) || $this->nmgp_cmp_hidden['endereco_'] == 'on') {
      if (!isset($this->nm_new_label['endereco_'])) {
          $this->nm_new_label['endereco_'] = "Endereco"; } ?>

    <TD class="scFormLabelOddMult css_endereco__label" id="hidden_field_label_endereco_" style="<?php echo $sStyleHidden_endereco_; ?>" > <?php echo $this->nm_new_label['endereco_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off') { $sStyleHidden_numero_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['numero_']) || $this->nmgp_cmp_hidden['numero_'] == 'on') {
      if (!isset($this->nm_new_label['numero_'])) {
          $this->nm_new_label['numero_'] = "Numero"; } ?>

    <TD class="scFormLabelOddMult css_numero__label" id="hidden_field_label_numero_" style="<?php echo $sStyleHidden_numero_; ?>" > <?php echo $this->nm_new_label['numero_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['complemento_']) && $this->nmgp_cmp_hidden['complemento_'] == 'off') { $sStyleHidden_complemento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['complemento_']) || $this->nmgp_cmp_hidden['complemento_'] == 'on') {
      if (!isset($this->nm_new_label['complemento_'])) {
          $this->nm_new_label['complemento_'] = "Complemento"; } ?>

    <TD class="scFormLabelOddMult css_complemento__label" id="hidden_field_label_complemento_" style="<?php echo $sStyleHidden_complemento_; ?>" > <?php echo $this->nm_new_label['complemento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['bairro_']) && $this->nmgp_cmp_hidden['bairro_'] == 'off') { $sStyleHidden_bairro_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['bairro_']) || $this->nmgp_cmp_hidden['bairro_'] == 'on') {
      if (!isset($this->nm_new_label['bairro_'])) {
          $this->nm_new_label['bairro_'] = "Bairro"; } ?>

    <TD class="scFormLabelOddMult css_bairro__label" id="hidden_field_label_bairro_" style="<?php echo $sStyleHidden_bairro_; ?>" > <?php echo $this->nm_new_label['bairro_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['municipio_']) && $this->nmgp_cmp_hidden['municipio_'] == 'off') { $sStyleHidden_municipio_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['municipio_']) || $this->nmgp_cmp_hidden['municipio_'] == 'on') {
      if (!isset($this->nm_new_label['municipio_'])) {
          $this->nm_new_label['municipio_'] = "Municipio"; } ?>

    <TD class="scFormLabelOddMult css_municipio__label" id="hidden_field_label_municipio_" style="<?php echo $sStyleHidden_municipio_; ?>" > <?php echo $this->nm_new_label['municipio_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idestado_']) && $this->nmgp_cmp_hidden['idestado_'] == 'off') { $sStyleHidden_idestado_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idestado_']) || $this->nmgp_cmp_hidden['idestado_'] == 'on') {
      if (!isset($this->nm_new_label['idestado_'])) {
          $this->nm_new_label['idestado_'] = "Id Estado"; } ?>

    <TD class="scFormLabelOddMult css_idestado__label" id="hidden_field_label_idestado_" style="<?php echo $sStyleHidden_idestado_; ?>" > <?php echo $this->nm_new_label['idestado_'] ?> </TD>
   <?php } ?>

   <?php if ((!isset($this->nmgp_cmp_hidden['id_']) || $this->nmgp_cmp_hidden['id_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_'])) {
          $this->nm_new_label['id_'] = "Id"; } ?>

    <TD class="scFormLabelOddMult css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>" > <?php echo $this->nm_new_label['id_'] ?> </TD>
   <?php }?>





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
       $iStart = sizeof($this->form_vert_form_cli_end);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_cli_end = $this->form_vert_form_cli_end;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_cli_end))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idcliente_']))
           {
               $this->nmgp_cmp_readonly['idcliente_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['endereco_']))
           {
               $this->nmgp_cmp_readonly['endereco_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['bairro_']))
           {
               $this->nmgp_cmp_readonly['bairro_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['municipio_']))
           {
               $this->nmgp_cmp_readonly['municipio_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idestado_']))
           {
               $this->nmgp_cmp_readonly['idestado_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
   foreach ($this->form_vert_form_cli_end as $sc_seq_vert => $sc_lixo)
   {
       $this->ordem_ = $this->form_vert_form_cli_end[$sc_seq_vert]['ordem_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['idcliente_'] = true;
           $this->nmgp_cmp_readonly['tipo_'] = true;
           $this->nmgp_cmp_readonly['cep_'] = true;
           $this->nmgp_cmp_readonly['endereco_'] = true;
           $this->nmgp_cmp_readonly['numero_'] = true;
           $this->nmgp_cmp_readonly['complemento_'] = true;
           $this->nmgp_cmp_readonly['bairro_'] = true;
           $this->nmgp_cmp_readonly['municipio_'] = true;
           $this->nmgp_cmp_readonly['idestado_'] = true;
           $this->nmgp_cmp_readonly['id_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['idcliente_']) || $this->nmgp_cmp_readonly['idcliente_'] != "on") {$this->nmgp_cmp_readonly['idcliente_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_']) || $this->nmgp_cmp_readonly['tipo_'] != "on") {$this->nmgp_cmp_readonly['tipo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cep_']) || $this->nmgp_cmp_readonly['cep_'] != "on") {$this->nmgp_cmp_readonly['cep_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['endereco_']) || $this->nmgp_cmp_readonly['endereco_'] != "on") {$this->nmgp_cmp_readonly['endereco_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['numero_']) || $this->nmgp_cmp_readonly['numero_'] != "on") {$this->nmgp_cmp_readonly['numero_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['complemento_']) || $this->nmgp_cmp_readonly['complemento_'] != "on") {$this->nmgp_cmp_readonly['complemento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['bairro_']) || $this->nmgp_cmp_readonly['bairro_'] != "on") {$this->nmgp_cmp_readonly['bairro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['municipio_']) || $this->nmgp_cmp_readonly['municipio_'] != "on") {$this->nmgp_cmp_readonly['municipio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idestado_']) || $this->nmgp_cmp_readonly['idestado_'] != "on") {$this->nmgp_cmp_readonly['idestado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->idcliente_ = $this->form_vert_form_cli_end[$sc_seq_vert]['idcliente_']; 
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
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idcliente_"]) &&  $this->nmgp_cmp_readonly["idcliente_"] == "on"))
       {
           $bTestReadOnly_idcliente_ = false;
           unset($this->nmgp_cmp_readonly['idcliente_']);
           $sStyleReadLab_idcliente_ = '';
           $sStyleReadInp_idcliente_ = 'display: none;';
       }
       $this->tipo_ = $this->form_vert_form_cli_end[$sc_seq_vert]['tipo_']; 
       $tipo_ = $this->tipo_; 
       $sStyleHidden_tipo_ = '';
       if (isset($sCheckRead_tipo_))
       {
           unset($sCheckRead_tipo_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_']))
       {
           $sCheckRead_tipo_ = $this->nmgp_cmp_readonly['tipo_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_']);
           $sStyleHidden_tipo_ = 'display: none;';
       }
       $bTestReadOnly_tipo_ = true;
       $sStyleReadLab_tipo_ = 'display: none;';
       $sStyleReadInp_tipo_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_']) && $this->nmgp_cmp_readonly['tipo_'] == 'on')
       {
           $bTestReadOnly_tipo_ = false;
           unset($this->nmgp_cmp_readonly['tipo_']);
           $sStyleReadLab_tipo_ = '';
           $sStyleReadInp_tipo_ = 'display: none;';
       }
       $this->cep_ = $this->form_vert_form_cli_end[$sc_seq_vert]['cep_']; 
       $cep_ = $this->cep_; 
       $sStyleHidden_cep_ = '';
       if (isset($sCheckRead_cep_))
       {
           unset($sCheckRead_cep_);
       }
       if (isset($this->nmgp_cmp_readonly['cep_']))
       {
           $sCheckRead_cep_ = $this->nmgp_cmp_readonly['cep_'];
       }
       if (isset($this->nmgp_cmp_hidden['cep_']) && $this->nmgp_cmp_hidden['cep_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cep_']);
           $sStyleHidden_cep_ = 'display: none;';
       }
       $bTestReadOnly_cep_ = true;
       $sStyleReadLab_cep_ = 'display: none;';
       $sStyleReadInp_cep_ = '';
       if (isset($this->nmgp_cmp_readonly['cep_']) && $this->nmgp_cmp_readonly['cep_'] == 'on')
       {
           $bTestReadOnly_cep_ = false;
           unset($this->nmgp_cmp_readonly['cep_']);
           $sStyleReadLab_cep_ = '';
           $sStyleReadInp_cep_ = 'display: none;';
       }
       $this->endereco_ = $this->form_vert_form_cli_end[$sc_seq_vert]['endereco_']; 
       $endereco_ = $this->endereco_; 
       $sStyleHidden_endereco_ = '';
       if (isset($sCheckRead_endereco_))
       {
           unset($sCheckRead_endereco_);
       }
       if (isset($this->nmgp_cmp_readonly['endereco_']))
       {
           $sCheckRead_endereco_ = $this->nmgp_cmp_readonly['endereco_'];
       }
       if (isset($this->nmgp_cmp_hidden['endereco_']) && $this->nmgp_cmp_hidden['endereco_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['endereco_']);
           $sStyleHidden_endereco_ = 'display: none;';
       }
       $bTestReadOnly_endereco_ = true;
       $sStyleReadLab_endereco_ = 'display: none;';
       $sStyleReadInp_endereco_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["endereco_"]) &&  $this->nmgp_cmp_readonly["endereco_"] == "on"))
       {
           $bTestReadOnly_endereco_ = false;
           unset($this->nmgp_cmp_readonly['endereco_']);
           $sStyleReadLab_endereco_ = '';
           $sStyleReadInp_endereco_ = 'display: none;';
       }
       $this->numero_ = $this->form_vert_form_cli_end[$sc_seq_vert]['numero_']; 
       $numero_ = $this->numero_; 
       $sStyleHidden_numero_ = '';
       if (isset($sCheckRead_numero_))
       {
           unset($sCheckRead_numero_);
       }
       if (isset($this->nmgp_cmp_readonly['numero_']))
       {
           $sCheckRead_numero_ = $this->nmgp_cmp_readonly['numero_'];
       }
       if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['numero_']);
           $sStyleHidden_numero_ = 'display: none;';
       }
       $bTestReadOnly_numero_ = true;
       $sStyleReadLab_numero_ = 'display: none;';
       $sStyleReadInp_numero_ = '';
       if (isset($this->nmgp_cmp_readonly['numero_']) && $this->nmgp_cmp_readonly['numero_'] == 'on')
       {
           $bTestReadOnly_numero_ = false;
           unset($this->nmgp_cmp_readonly['numero_']);
           $sStyleReadLab_numero_ = '';
           $sStyleReadInp_numero_ = 'display: none;';
       }
       $this->complemento_ = $this->form_vert_form_cli_end[$sc_seq_vert]['complemento_']; 
       $complemento_ = $this->complemento_; 
       $sStyleHidden_complemento_ = '';
       if (isset($sCheckRead_complemento_))
       {
           unset($sCheckRead_complemento_);
       }
       if (isset($this->nmgp_cmp_readonly['complemento_']))
       {
           $sCheckRead_complemento_ = $this->nmgp_cmp_readonly['complemento_'];
       }
       if (isset($this->nmgp_cmp_hidden['complemento_']) && $this->nmgp_cmp_hidden['complemento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['complemento_']);
           $sStyleHidden_complemento_ = 'display: none;';
       }
       $bTestReadOnly_complemento_ = true;
       $sStyleReadLab_complemento_ = 'display: none;';
       $sStyleReadInp_complemento_ = '';
       if (isset($this->nmgp_cmp_readonly['complemento_']) && $this->nmgp_cmp_readonly['complemento_'] == 'on')
       {
           $bTestReadOnly_complemento_ = false;
           unset($this->nmgp_cmp_readonly['complemento_']);
           $sStyleReadLab_complemento_ = '';
           $sStyleReadInp_complemento_ = 'display: none;';
       }
       $this->bairro_ = $this->form_vert_form_cli_end[$sc_seq_vert]['bairro_']; 
       $bairro_ = $this->bairro_; 
       $sStyleHidden_bairro_ = '';
       if (isset($sCheckRead_bairro_))
       {
           unset($sCheckRead_bairro_);
       }
       if (isset($this->nmgp_cmp_readonly['bairro_']))
       {
           $sCheckRead_bairro_ = $this->nmgp_cmp_readonly['bairro_'];
       }
       if (isset($this->nmgp_cmp_hidden['bairro_']) && $this->nmgp_cmp_hidden['bairro_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['bairro_']);
           $sStyleHidden_bairro_ = 'display: none;';
       }
       $bTestReadOnly_bairro_ = true;
       $sStyleReadLab_bairro_ = 'display: none;';
       $sStyleReadInp_bairro_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["bairro_"]) &&  $this->nmgp_cmp_readonly["bairro_"] == "on"))
       {
           $bTestReadOnly_bairro_ = false;
           unset($this->nmgp_cmp_readonly['bairro_']);
           $sStyleReadLab_bairro_ = '';
           $sStyleReadInp_bairro_ = 'display: none;';
       }
       $this->municipio_ = $this->form_vert_form_cli_end[$sc_seq_vert]['municipio_']; 
       $municipio_ = $this->municipio_; 
       $sStyleHidden_municipio_ = '';
       if (isset($sCheckRead_municipio_))
       {
           unset($sCheckRead_municipio_);
       }
       if (isset($this->nmgp_cmp_readonly['municipio_']))
       {
           $sCheckRead_municipio_ = $this->nmgp_cmp_readonly['municipio_'];
       }
       if (isset($this->nmgp_cmp_hidden['municipio_']) && $this->nmgp_cmp_hidden['municipio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['municipio_']);
           $sStyleHidden_municipio_ = 'display: none;';
       }
       $bTestReadOnly_municipio_ = true;
       $sStyleReadLab_municipio_ = 'display: none;';
       $sStyleReadInp_municipio_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["municipio_"]) &&  $this->nmgp_cmp_readonly["municipio_"] == "on"))
       {
           $bTestReadOnly_municipio_ = false;
           unset($this->nmgp_cmp_readonly['municipio_']);
           $sStyleReadLab_municipio_ = '';
           $sStyleReadInp_municipio_ = 'display: none;';
       }
       $this->idestado_ = $this->form_vert_form_cli_end[$sc_seq_vert]['idestado_']; 
       $idestado_ = $this->idestado_; 
       $sStyleHidden_idestado_ = '';
       if (isset($sCheckRead_idestado_))
       {
           unset($sCheckRead_idestado_);
       }
       if (isset($this->nmgp_cmp_readonly['idestado_']))
       {
           $sCheckRead_idestado_ = $this->nmgp_cmp_readonly['idestado_'];
       }
       if (isset($this->nmgp_cmp_hidden['idestado_']) && $this->nmgp_cmp_hidden['idestado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idestado_']);
           $sStyleHidden_idestado_ = 'display: none;';
       }
       $bTestReadOnly_idestado_ = true;
       $sStyleReadLab_idestado_ = 'display: none;';
       $sStyleReadInp_idestado_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idestado_"]) &&  $this->nmgp_cmp_readonly["idestado_"] == "on"))
       {
           $bTestReadOnly_idestado_ = false;
           unset($this->nmgp_cmp_readonly['idestado_']);
           $sStyleReadLab_idestado_ = '';
           $sStyleReadInp_idestado_ = 'display: none;';
       }
       $this->id_ = $this->form_vert_form_cli_end[$sc_seq_vert]['id_']; 
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_cli_end_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_cli_end_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cli_end_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_cli_end_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cli_end_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_cli_end_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['idcliente_']) && $this->nmgp_cmp_hidden['idcliente_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcliente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idcliente_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idcliente__line" id="hidden_field_data_idcliente_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idcliente_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idcliente__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idcliente_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["idcliente_"]) &&  $this->nmgp_cmp_readonly["idcliente_"] == "on")) { 

 ?>
<input type="hidden" name="idcliente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idcliente_) . "\"><span id=\"id_ajax_label_idcliente_" . $sc_seq_vert . "\">" . $idcliente_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_idcliente_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-idcliente_<?php echo $sc_seq_vert ?> css_idcliente__line" style="<?php echo $sStyleReadLab_idcliente_; ?>"><?php echo $this->form_encode_input($this->idcliente_); ?></span><span id="id_read_off_idcliente_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idcliente_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_idcliente__obj" style="" id="id_sc_field_idcliente_<?php echo $sc_seq_vert ?>" type=text name="idcliente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idcliente_) ?>"
 size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idcliente_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idcliente_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcliente_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcliente_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->tipo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipo__line" id="hidden_field_data_tipo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_"]) &&  $this->nmgp_cmp_readonly["tipo_"] == "on") { 

$tipo__look = "";
 if ($this->tipo_ == "R") { $tipo__look .= "Residencial" ;} 
 if ($this->tipo_ == "C") { $tipo__look .= "Comercial" ;} 
 if (empty($tipo__look)) { $tipo__look = $this->tipo_; }
?>
<input type="hidden" name="tipo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_) . "\">" . $tipo__look . ""; ?>
<?php } else { ?>
<?php

$tipo__look = "";
 if ($this->tipo_ == "R") { $tipo__look .= "Residencial" ;} 
 if ($this->tipo_ == "C") { $tipo__look .= "Comercial" ;} 
 if (empty($tipo__look)) { $tipo__look = $this->tipo_; }
?>
<span id="id_read_on_tipo_<?php echo $sc_seq_vert ; ?>" class="css_tipo__line"  style="<?php echo $sStyleReadLab_tipo_; ?>"><?php echo $this->form_encode_input($tipo__look); ?></span><span id="id_read_off_tipo_<?php echo $sc_seq_vert ; ?>" style="<?php echo $sStyleReadInp_tipo_; ?>">
 <span id="idAjaxSelect_tipo_<?php echo $sc_seq_vert ?>"><select class="sc-js-input scFormObjectOddMult css_tipo__obj" style="" id="id_sc_field_tipo_<?php echo $sc_seq_vert ?>" name="tipo_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option value="R" <?php  if ($this->tipo_ == "R") { echo " selected" ;} ?><?php  if (empty($this->tipo_)) { echo " selected" ;} ?>>Residencial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_tipo_'][] = 'R'; ?>
 <option value="C" <?php  if ($this->tipo_ == "C") { echo " selected" ;} ?>>Comercial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_tipo_'][] = 'C'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cep_']) && $this->nmgp_cmp_hidden['cep_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cep_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cep_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cep__line" id="hidden_field_data_cep_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cep_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cep__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cep_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cep_"]) &&  $this->nmgp_cmp_readonly["cep_"] == "on") { 

 ?>
<input type="hidden" name="cep_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cep_) . "\">" . $cep_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cep_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cep_<?php echo $sc_seq_vert ?> css_cep__line" style="<?php echo $sStyleReadLab_cep_; ?>"><?php echo $this->form_encode_input($this->cep_); ?></span><span id="id_read_off_cep_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cep_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cep__obj" style="" id="id_sc_field_cep_<?php echo $sc_seq_vert ?>" type=text name="cep_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cep_) ?>"
 size=5 alt="{datatype: 'cep', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}">&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bzipcode", "tb_show('', '" . $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . SC_dir_app_name('form_cli_end'). "/form_cli_end_cep.php?cep=' + document.F1.cep_" . $sc_seq_vert . ".value + '&form_origem=F1;CEP,cep_" . $sc_seq_vert . ";UF,idestado_" . $sc_seq_vert . ";CIDADE,municipio_" . $sc_seq_vert . ";BAIRRO,bairro_" . $sc_seq_vert . ";RUA,endereco_" . $sc_seq_vert . "&TB_iframe=true&height=220&width=350&modal=true', '')", "tb_show('', '" . $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . SC_dir_app_name('form_cli_end'). "/form_cli_end_cep.php?cep=' + document.F1.cep_" . $sc_seq_vert . ".value + '&form_origem=F1;CEP,cep_" . $sc_seq_vert . ";UF,idestado_" . $sc_seq_vert . ";CIDADE,municipio_" . $sc_seq_vert . ";BAIRRO,bairro_" . $sc_seq_vert . ";RUA,endereco_" . $sc_seq_vert . "&TB_iframe=true&height=220&width=350&modal=true', '')", "cep_" . $sc_seq_vert . "_cep", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cep_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cep_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['endereco_']) && $this->nmgp_cmp_hidden['endereco_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="endereco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($endereco_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_endereco__line" id="hidden_field_data_endereco_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_endereco_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_endereco__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_endereco_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["endereco_"]) &&  $this->nmgp_cmp_readonly["endereco_"] == "on")) { 

 ?>
<input type="hidden" name="endereco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($endereco_) . "\"><span id=\"id_ajax_label_endereco_" . $sc_seq_vert . "\">" . $endereco_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_endereco_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-endereco_<?php echo $sc_seq_vert ?> css_endereco__line" style="<?php echo $sStyleReadLab_endereco_; ?>"><?php echo $this->form_encode_input($this->endereco_); ?></span><span id="id_read_off_endereco_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_endereco_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_endereco__obj" style="" id="id_sc_field_endereco_<?php echo $sc_seq_vert ?>" type=text name="endereco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($endereco_) ?>"
 size=25 maxlength=256 alt="{datatype: 'text', maxLength: 256, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_endereco_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_endereco_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_numero__line" id="hidden_field_data_numero_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_numero_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_numero__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_numero_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_"]) &&  $this->nmgp_cmp_readonly["numero_"] == "on") { 

 ?>
<input type="hidden" name="numero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_) . "\">" . $numero_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-numero_<?php echo $sc_seq_vert ?> css_numero__line" style="<?php echo $sStyleReadLab_numero_; ?>"><?php echo $this->form_encode_input($this->numero_); ?></span><span id="id_read_off_numero_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_numero__obj" style="" id="id_sc_field_numero_<?php echo $sc_seq_vert ?>" type=text name="numero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 8, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['numero_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['numero_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['complemento_']) && $this->nmgp_cmp_hidden['complemento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="complemento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($complemento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_complemento__line" id="hidden_field_data_complemento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_complemento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_complemento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_complemento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["complemento_"]) &&  $this->nmgp_cmp_readonly["complemento_"] == "on") { 

 ?>
<input type="hidden" name="complemento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($complemento_) . "\">" . $complemento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_complemento_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-complemento_<?php echo $sc_seq_vert ?> css_complemento__line" style="<?php echo $sStyleReadLab_complemento_; ?>"><?php echo $this->form_encode_input($this->complemento_); ?></span><span id="id_read_off_complemento_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_complemento_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_complemento__obj" style="" id="id_sc_field_complemento_<?php echo $sc_seq_vert ?>" type=text name="complemento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($complemento_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_complemento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_complemento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['bairro_']) && $this->nmgp_cmp_hidden['bairro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bairro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_bairro__line" id="hidden_field_data_bairro_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_bairro_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_bairro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_bairro_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["bairro_"]) &&  $this->nmgp_cmp_readonly["bairro_"] == "on")) { 

 ?>
<input type="hidden" name="bairro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairro_) . "\"><span id=\"id_ajax_label_bairro_" . $sc_seq_vert . "\">" . $bairro_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_bairro_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-bairro_<?php echo $sc_seq_vert ?> css_bairro__line" style="<?php echo $sStyleReadLab_bairro_; ?>"><?php echo $this->form_encode_input($this->bairro_); ?></span><span id="id_read_off_bairro_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bairro_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_bairro__obj" style="" id="id_sc_field_bairro_<?php echo $sc_seq_vert ?>" type=text name="bairro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairro_) ?>"
 size=15 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['municipio_']) && $this->nmgp_cmp_hidden['municipio_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="municipio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($municipio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_municipio__line" id="hidden_field_data_municipio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_municipio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_municipio__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_municipio_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["municipio_"]) &&  $this->nmgp_cmp_readonly["municipio_"] == "on")) { 

 ?>
<input type="hidden" name="municipio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($municipio_) . "\"><span id=\"id_ajax_label_municipio_" . $sc_seq_vert . "\">" . $municipio_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_municipio_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-municipio_<?php echo $sc_seq_vert ?> css_municipio__line" style="<?php echo $sStyleReadLab_municipio_; ?>"><?php echo $this->form_encode_input($this->municipio_); ?></span><span id="id_read_off_municipio_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_municipio_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_municipio__obj" style="" id="id_sc_field_municipio_<?php echo $sc_seq_vert ?>" type=text name="municipio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($municipio_) ?>"
 size=15 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_municipio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_municipio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idestado_']) && $this->nmgp_cmp_hidden['idestado_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idestado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idestado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idestado__line" id="hidden_field_data_idestado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idestado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idestado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idestado_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["idestado_"]) &&  $this->nmgp_cmp_readonly["idestado_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'] = array(); 
    }

   $old_value_idcliente_ = $this->idcliente_;
   $old_value_cep_ = $this->cep_;
   $old_value_numero_ = $this->numero_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_idcliente_ = $this->idcliente_;
   $unformatted_value_cep_ = $this->cep_;
   $unformatted_value_numero_ = $this->numero_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT id, id FROM estado ORDER BY id";

   $this->idcliente_ = $old_value_idcliente_;
   $this->cep_ = $old_value_cep_;
   $this->numero_ = $old_value_numero_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'][] = $rs->fields[0];
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
   $idestado__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idestado__1))
          {
              foreach ($this->idestado__1 as $tmp_idestado_)
              {
                  if (trim($tmp_idestado_) === trim($cadaselect[1])) { $idestado__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idestado_) === trim($cadaselect[1])) { $idestado__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idestado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idestado_) . "\"><span id=\"id_ajax_label_idestado_" . $sc_seq_vert . "\">" . $idestado__look . "</span>"; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'] = array(); 
    }

   $old_value_idcliente_ = $this->idcliente_;
   $old_value_cep_ = $this->cep_;
   $old_value_numero_ = $this->numero_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_idcliente_ = $this->idcliente_;
   $unformatted_value_cep_ = $this->cep_;
   $unformatted_value_numero_ = $this->numero_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT id, id FROM estado ORDER BY id";

   $this->idcliente_ = $old_value_idcliente_;
   $this->cep_ = $old_value_cep_;
   $this->numero_ = $old_value_numero_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['Lookup_idestado_'][] = $rs->fields[0];
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
   $idestado__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idestado__1))
          {
              foreach ($this->idestado__1 as $tmp_idestado_)
              {
                  if (trim($tmp_idestado_) === trim($cadaselect[1])) { $idestado__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idestado_) === trim($cadaselect[1])) { $idestado__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idestado__look))
          {
              $idestado__look = $this->idestado_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idestado_" . $sc_seq_vert . "\" class=\"css_idestado__line\" style=\"" .  $sStyleReadLab_idestado_ . "\">" . $this->form_encode_input($idestado__look) . "</span><span id=\"id_read_off_idestado_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_idestado_ . "\">";
   echo " <span id=\"idAjaxSelect_idestado_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_idestado__obj\" style=\"\" id=\"id_sc_field_idestado_" . $sc_seq_vert . "\" name=\"idestado_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idestado_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idestado_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idestado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idestado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id__line" id="hidden_field_data_id_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_<?php echo $sc_seq_vert ?>" class="css_id__line" style="<?php echo $sStyleReadLab_id_; ?>"><?php echo $this->form_encode_input($this->id_); ?></span><span id="id_read_off_id_<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_id_; ?>"><input type="hidden" id="id_sc_field_id_<?php echo $sc_seq_vert ?>" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"?><span id="id_ajax_label_id_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_idcliente_))
       {
           $this->nmgp_cmp_readonly['idcliente_'] = $sCheckRead_idcliente_;
       }
       if ('display: none;' == $sStyleHidden_idcliente_)
       {
           $this->nmgp_cmp_hidden['idcliente_'] = 'off';
       }
       if (isset($sCheckRead_tipo_))
       {
           $this->nmgp_cmp_readonly['tipo_'] = $sCheckRead_tipo_;
       }
       if ('display: none;' == $sStyleHidden_tipo_)
       {
           $this->nmgp_cmp_hidden['tipo_'] = 'off';
       }
       if (isset($sCheckRead_cep_))
       {
           $this->nmgp_cmp_readonly['cep_'] = $sCheckRead_cep_;
       }
       if ('display: none;' == $sStyleHidden_cep_)
       {
           $this->nmgp_cmp_hidden['cep_'] = 'off';
       }
       if (isset($sCheckRead_endereco_))
       {
           $this->nmgp_cmp_readonly['endereco_'] = $sCheckRead_endereco_;
       }
       if ('display: none;' == $sStyleHidden_endereco_)
       {
           $this->nmgp_cmp_hidden['endereco_'] = 'off';
       }
       if (isset($sCheckRead_numero_))
       {
           $this->nmgp_cmp_readonly['numero_'] = $sCheckRead_numero_;
       }
       if ('display: none;' == $sStyleHidden_numero_)
       {
           $this->nmgp_cmp_hidden['numero_'] = 'off';
       }
       if (isset($sCheckRead_complemento_))
       {
           $this->nmgp_cmp_readonly['complemento_'] = $sCheckRead_complemento_;
       }
       if ('display: none;' == $sStyleHidden_complemento_)
       {
           $this->nmgp_cmp_hidden['complemento_'] = 'off';
       }
       if (isset($sCheckRead_bairro_))
       {
           $this->nmgp_cmp_readonly['bairro_'] = $sCheckRead_bairro_;
       }
       if ('display: none;' == $sStyleHidden_bairro_)
       {
           $this->nmgp_cmp_hidden['bairro_'] = 'off';
       }
       if (isset($sCheckRead_municipio_))
       {
           $this->nmgp_cmp_readonly['municipio_'] = $sCheckRead_municipio_;
       }
       if ('display: none;' == $sStyleHidden_municipio_)
       {
           $this->nmgp_cmp_hidden['municipio_'] = 'off';
       }
       if (isset($sCheckRead_idestado_))
       {
           $this->nmgp_cmp_readonly['idestado_'] = $sCheckRead_idestado_;
       }
       if ('display: none;' == $sStyleHidden_idestado_)
       {
           $this->nmgp_cmp_hidden['idestado_'] = 'off';
       }
       if (isset($sCheckRead_id_))
       {
           $this->nmgp_cmp_readonly['id_'] = $sCheckRead_id_;
       }
       if ('display: none;' == $sStyleHidden_id_)
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_cli_end = $guarda_form_vert_form_cli_end;
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R")
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['masterValue']);
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
 parent.scAjaxDetailStatus("form_cli_end");
 parent.scAjaxDetailHeight("form_cli_end", <?php echo $sTamanhoIframe; ?>);
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
   parent.scAjaxDetailHeight("form_cli_end", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_cli_end", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cli_end']['sc_modal'])
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
