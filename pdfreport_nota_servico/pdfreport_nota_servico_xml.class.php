<?php

class pdfreport_nota_servico_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function pdfreport_nota_servico_xml()
   {
      $this->nm_data   = new nm_data("pt_br");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nm_data    = new nm_data("pt_br");
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $this->Teste_validade = new NM_Valida;
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo     .= "_pdfreport_nota_servico";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "pdfreport_nota_servico.xml";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->img_barra = $Busca_temp['img_barra']; 
          $tmp_pos = strpos($this->img_barra, "##@@");
          if ($tmp_pos !== false)
          {
              $this->img_barra = substr($this->img_barra, 0, $tmp_pos);
          }
          $this->os_id = $Busca_temp['os_id']; 
          $tmp_pos = strpos($this->os_id, "##@@");
          if ($tmp_pos !== false)
          {
              $this->os_id = substr($this->os_id, 0, $tmp_pos);
          }
          $this->os_id_2 = $Busca_temp['os_id_input_2']; 
          $this->os_dataabertura = $Busca_temp['os_dataabertura']; 
          $tmp_pos = strpos($this->os_dataabertura, "##@@");
          if ($tmp_pos !== false)
          {
              $this->os_dataabertura = substr($this->os_dataabertura, 0, $tmp_pos);
          }
          $this->os_dataabertura_2 = $Busca_temp['os_dataabertura_input_2']; 
          $this->os_preco = $Busca_temp['os_preco']; 
          $tmp_pos = strpos($this->os_preco, "##@@");
          if ($tmp_pos !== false)
          {
              $this->os_preco = substr($this->os_preco, 0, $tmp_pos);
          }
          $this->os_preco_2 = $Busca_temp['os_preco_input_2']; 
          $this->cc_placa = $Busca_temp['cc_placa']; 
          $tmp_pos = strpos($this->cc_placa, "##@@");
          if ($tmp_pos !== false)
          {
              $this->cc_placa = substr($this->cc_placa, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT os.id as os_id, os.dataAbertura as os_dataabertura, os.preco as os_preco, cc.placa as cc_placa, c.nome as c_nome, c.cpfCnpj as c_cpfcnpj, m.modelo as m_modelo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT os.id as os_id, os.dataAbertura as os_dataabertura, os.preco as os_preco, cc.placa as cc_placa, c.nome as c_nome, c.cpfCnpj as c_cpfcnpj, m.modelo as m_modelo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $xml_charset = $_SESSION['scriptcase']['charset'];
      $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
      }
      while (!$rs->EOF)
      {
         $this->xml_registro = "<pdfreport_nota_servico";
         $this->os_id = $rs->fields[0] ;  
         $this->os_id = (string)$this->os_id;
         $this->os_dataabertura = $rs->fields[1] ;  
         $this->os_preco = $rs->fields[2] ;  
         $this->os_preco =  str_replace(",", ".", $this->os_preco);
         $this->os_preco = (string)$this->os_preco;
         $this->cc_placa = $rs->fields[3] ;  
         $this->c_nome = $rs->fields[4] ;  
         $this->c_cpfcnpj = $rs->fields[5] ;  
         $this->m_modelo = $rs->fields[6] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->xml_registro .= " />\r\n";
         fwrite($xml_f, $this->xml_registro);
         if ($this->Grava_view)
         {
            fwrite($xml_v, $this->xml_registro);
         }
         $rs->MoveNext();
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
         fwrite($xml_v, "</root>");
         fclose($xml_v);
      }

      $rs->Close();
   }
   //----- os_id
   function NM_export_os_id()
   {
         nmgp_Form_Num_Val($this->os_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->os_id))
         {
             $this->os_id = sc_convert_encoding($this->os_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " os_id =\"" . $this->trata_dados($this->os_id) . "\"";
   }
   //----- os_dataabertura
   function NM_export_os_dataabertura()
   {
         $conteudo_x = $this->os_dataabertura;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->os_dataabertura, "YYYY-MM-DD");
             $this->os_dataabertura = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->os_dataabertura))
         {
             $this->os_dataabertura = sc_convert_encoding($this->os_dataabertura, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " os_dataabertura =\"" . $this->trata_dados($this->os_dataabertura) . "\"";
   }
   //----- os_preco
   function NM_export_os_preco()
   {
         nmgp_Form_Num_Val($this->os_preco, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->os_preco))
         {
             $this->os_preco = sc_convert_encoding($this->os_preco, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " os_preco =\"" . $this->trata_dados($this->os_preco) . "\"";
   }
   //----- cc_placa
   function NM_export_cc_placa()
   {
         if ($this->cc_placa !== "&nbsp;") 
         { 
             $this->cc_placa = sc_strtoupper($this->cc_placa); 
         } 
         $this->nm_gera_mask($this->cc_placa, "###-####"); 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cc_placa))
         {
             $this->cc_placa = sc_convert_encoding($this->cc_placa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " cc_placa =\"" . $this->trata_dados($this->cc_placa) . "\"";
   }
   //----- c_nome
   function NM_export_c_nome()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->c_nome))
         {
             $this->c_nome = sc_convert_encoding($this->c_nome, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " c_nome =\"" . $this->trata_dados($this->c_nome) . "\"";
   }
   //----- c_cpfcnpj
   function NM_export_c_cpfcnpj()
   {
         if (strlen($this->c_cpfcnpj) < 14) 
         { 
             $this->c_cpfcnpj = str_repeat(0, 14 - strlen($this->c_cpfcnpj)) . $this->c_cpfcnpj; 
         } 
         if (strlen($this->c_cpfcnpj) > 11 && substr($this->c_cpfcnpj, 0, 3) == "000" && $this->Teste_validade->CNPJ($this->c_cpfcnpj) == false) 
         { 
             $this->c_cpfcnpj = substr($this->c_cpfcnpj, strlen($this->c_cpfcnpj) - 11); 
         } 
         nmgp_Form_CicCnpj($this->c_cpfcnpj) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->c_cpfcnpj))
         {
             $this->c_cpfcnpj = sc_convert_encoding($this->c_cpfcnpj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " c_cpfcnpj =\"" . $this->trata_dados($this->c_cpfcnpj) . "\"";
   }
   //----- m_modelo
   function NM_export_m_modelo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->m_modelo))
         {
             $this->m_modelo = sc_convert_encoding($this->m_modelo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " m_modelo =\"" . $this->trata_dados($this->m_modelo) . "\"";
   }
   //----- img_barra
   function NM_export_img_barra()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->img_barra))
         {
             $this->img_barra = sc_convert_encoding($this->img_barra, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " img_barra =\"" . $this->trata_dados($this->img_barra) . "\"";
   }
   //----- img_carro
   function NM_export_img_carro()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->img_carro))
         {
             $this->img_carro = sc_convert_encoding($this->img_carro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " img_carro =\"" . $this->trata_dados($this->img_carro) . "\"";
   }
   //----- servicos
   function NM_export_servicos()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->servicos))
         {
             $this->servicos = sc_convert_encoding($this->servicos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " servicos =\"" . $this->trata_dados($this->servicos) . "\"";
   }
   //----- servicos_descricao
   function NM_export_servicos_descricao()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->servicos_descricao))
         {
             $this->servicos_descricao = sc_convert_encoding($this->servicos_descricao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " servicos_descricao =\"" . $this->trata_dados($this->servicos_descricao) . "\"";
   }
   //----- servicos_preco
   function NM_export_servicos_preco()
   {
         nmgp_Form_Num_Val($this->servicos_preco, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->servicos_preco))
         {
             $this->servicos_preco = sc_convert_encoding($this->servicos_preco, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xml_registro .= " servicos_preco =\"" . $this->trata_dados($this->servicos_preco) . "\"";
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> -  :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XML</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="pdfreport_nota_servico_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_nota_servico"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
