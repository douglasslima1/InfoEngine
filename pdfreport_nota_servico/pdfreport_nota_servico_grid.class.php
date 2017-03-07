<?php
class pdfreport_nota_servico_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $img_barra = array();
   var $img_carro = array();
   var $servicos = array();
   var $servicos_descricao = array();
   var $servicos_preco = array();
   var $os_id = array();
   var $os_dataabertura = array();
   var $os_preco = array();
   var $cc_placa = array();
   var $c_nome = array();
   var $c_cpfcnpj = array();
   var $m_modelo = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("pt_br");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A4";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_nota_servico']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
   $this->Teste_validade = new NM_Valida;
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_nota_servico", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->os_id[0] = $Busca_temp['os_id']; 
       $tmp_pos = strpos($this->os_id[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->os_id[0] = substr($this->os_id[0], 0, $tmp_pos);
       }
       $os_id_2 = $Busca_temp['os_id_input_2']; 
       $this->os_id_2 = $Busca_temp['os_id_input_2']; 
       $this->os_dataabertura[0] = $Busca_temp['os_dataabertura']; 
       $tmp_pos = strpos($this->os_dataabertura[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->os_dataabertura[0] = substr($this->os_dataabertura[0], 0, $tmp_pos);
       }
       $os_dataabertura_2 = $Busca_temp['os_dataabertura_input_2']; 
       $this->os_dataabertura_2 = $Busca_temp['os_dataabertura_input_2']; 
       $this->os_preco[0] = $Busca_temp['os_preco']; 
       $tmp_pos = strpos($this->os_preco[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->os_preco[0] = substr($this->os_preco[0], 0, $tmp_pos);
       }
       $os_preco_2 = $Busca_temp['os_preco_input_2']; 
       $this->os_preco_2 = $Busca_temp['os_preco_input_2']; 
       $this->cc_placa[0] = $Busca_temp['cc_placa']; 
       $tmp_pos = strpos($this->cc_placa[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->cc_placa[0] = substr($this->cc_placa[0], 0, $tmp_pos);
       }
       $this->img_barra[0] = $Busca_temp['img_barra']; 
       $tmp_pos = strpos($this->img_barra[0], "##@@");
       if ($tmp_pos !== false)
       {
           $this->img_barra[0] = substr($this->img_barra[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->os_dataabertura_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_nota_servico']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_nota_servico']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_nota_servico']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_nota_servico']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_orig'] = " where os.id = " . $_SESSION['idOS'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT os.id as os_id, os.dataAbertura as os_dataabertura, os.preco as os_preco, cc.placa as cc_placa, c.nome as c_nome, c.cpfCnpj as c_cpfcnpj, m.modelo as m_modelo from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT os.id as os_id, os.dataAbertura as os_dataabertura, os.preco as os_preco, cc.placa as cc_placa, c.nome as c_nome, c.cpfCnpj as c_cpfcnpj, m.modelo as m_modelo from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     $this->Pdf->setCellMargins($left = 10, $top = 10, $right = 10, $bottom = 10);
     $this->Pdf->SetAutoPageBreak(true, 10);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__img__NM__carroBg.jpg", 10, 120, 190, 0, '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['os_id'] = "Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['os_dataabertura'] = "Data Abertura";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['os_preco'] = "Preco";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['cc_placa'] = "Placa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['c_nome'] = "Nome";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['c_cpfcnpj'] = "Cpf Cnpj";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['m_modelo'] = "Modelo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['img_barra'] = "img_barra";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['img_carro'] = "img_carro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['servicos'] = "servicos";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['servicos_descricao'] = "Descricao";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['labels']['servicos_preco'] = "Preco";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_nota_servico']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_nota_servico']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_nota_servico']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(10, 10, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->os_id[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->os_id[$this->nm_grid_colunas] = (string)$this->os_id[$this->nm_grid_colunas];
          $this->os_dataabertura[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->os_preco[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->os_preco[$this->nm_grid_colunas] =  str_replace(",", ".", $this->os_preco[$this->nm_grid_colunas]);
          $this->os_preco[$this->nm_grid_colunas] = (string)$this->os_preco[$this->nm_grid_colunas];
          $this->cc_placa[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->c_nome[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->c_cpfcnpj[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->m_modelo[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->servicos_descricao[$this->nm_grid_colunas] = array();
          $this->servicos_preco[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_servicos($this->servicos[$this->nm_grid_colunas] , $this->os_id[$this->nm_grid_colunas], $array_servicos); 
          $NM_ind = 0;
          $this->servicos = array();
          foreach ($array_servicos as $cada_subselect) 
          {
              $this->servicos[$this->nm_grid_colunas][$NM_ind] = "";
              $this->servicos_descricao[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->servicos_preco[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $NM_ind++;
          }
          $this->img_barra[$this->nm_grid_colunas] = "";
          $this->img_carro[$this->nm_grid_colunas] = "";
          $this->os_id[$this->nm_grid_colunas] = sc_strip_script($this->os_id[$this->nm_grid_colunas]);
          if ($this->os_id[$this->nm_grid_colunas] === "") 
          { 
              $this->os_id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->os_id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->os_id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->os_id[$this->nm_grid_colunas]);
          $this->os_dataabertura[$this->nm_grid_colunas] = sc_strip_script($this->os_dataabertura[$this->nm_grid_colunas]);
          if ($this->os_dataabertura[$this->nm_grid_colunas] === "") 
          { 
              $this->os_dataabertura[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $os_dataabertura_x =  $this->os_dataabertura[$this->nm_grid_colunas];
               nm_conv_limpa_dado($os_dataabertura_x, "YYYY-MM-DD");
               if (is_numeric($os_dataabertura_x) && $os_dataabertura_x > 0) 
               { 
                   $this->nm_data->SetaData($this->os_dataabertura[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->os_dataabertura[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->os_dataabertura[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->os_dataabertura[$this->nm_grid_colunas]);
          $this->os_preco[$this->nm_grid_colunas] = sc_strip_script($this->os_preco[$this->nm_grid_colunas]);
          if ($this->os_preco[$this->nm_grid_colunas] === "") 
          { 
              $this->os_preco[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->os_preco[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->os_preco[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->os_preco[$this->nm_grid_colunas]);
          $this->cc_placa[$this->nm_grid_colunas] = sc_strip_script($this->cc_placa[$this->nm_grid_colunas]);
          if ($this->cc_placa[$this->nm_grid_colunas] === "") 
          { 
              $this->cc_placa[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->cc_placa[$this->nm_grid_colunas] !== "") 
          { 
              $this->cc_placa[$this->nm_grid_colunas] = sc_strtoupper($this->cc_placa[$this->nm_grid_colunas]); 
          } 
          $this->nm_gera_mask($this->cc_placa[$this->nm_grid_colunas], "###-####"); 
          $this->cc_placa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cc_placa[$this->nm_grid_colunas]);
          $this->c_nome[$this->nm_grid_colunas] = sc_strip_script($this->c_nome[$this->nm_grid_colunas]);
          if ($this->c_nome[$this->nm_grid_colunas] === "") 
          { 
              $this->c_nome[$this->nm_grid_colunas] = "" ;  
          } 
          $this->c_nome[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->c_nome[$this->nm_grid_colunas]);
          $this->c_cpfcnpj[$this->nm_grid_colunas] = sc_strip_script($this->c_cpfcnpj[$this->nm_grid_colunas]);
          if ($this->c_cpfcnpj[$this->nm_grid_colunas] === "") 
          { 
              $this->c_cpfcnpj[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (strlen($this->c_cpfcnpj[$this->nm_grid_colunas]) < 14 && strlen($this->c_cpfcnpj[$this->nm_grid_colunas]) !=  11) 
               { 
                   $this->c_cpfcnpj[$this->nm_grid_colunas] = str_repeat(0, 14 - strlen($this->c_cpfcnpj[$this->nm_grid_colunas])) . $this->c_cpfcnpj[$this->nm_grid_colunas]; 
               } 
               if (strlen($this->c_cpfcnpj[$this->nm_grid_colunas]) > 11 && substr($this->c_cpfcnpj[$this->nm_grid_colunas], 0, 3) == "000" && $this->Teste_validade->CNPJ($this->c_cpfcnpj[$this->nm_grid_colunas]) == false) 
               { 
                   $this->c_cpfcnpj[$this->nm_grid_colunas] = substr($this->c_cpfcnpj[$this->nm_grid_colunas], strlen($this->c_cpfcnpj[$this->nm_grid_colunas]) - 11); 
               } 
               nmgp_Form_CicCnpj($this->c_cpfcnpj[$this->nm_grid_colunas]) ; 
          } 
          $this->c_cpfcnpj[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->c_cpfcnpj[$this->nm_grid_colunas]);
          $this->m_modelo[$this->nm_grid_colunas] = sc_strip_script($this->m_modelo[$this->nm_grid_colunas]);
          if ($this->m_modelo[$this->nm_grid_colunas] === "") 
          { 
              $this->m_modelo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->m_modelo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->m_modelo[$this->nm_grid_colunas]);
          if ($this->img_barra[$this->nm_grid_colunas] === "") 
          { 
              $this->img_barra[$this->nm_grid_colunas] = "" ;  
          } 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__bg__NM__bgButtonBlack.jpg"))
          { 
              $this->img_barra[$this->nm_grid_colunas] = "" ;  
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $this->img_barra[$this->nm_grid_colunas] = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
          } 
          else 
          { 
              $in_img_barra = $this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__bg__NM__bgButtonBlack.jpg"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__bg__NM__bgButtonBlack.jpg"); 
              $out_img_barra = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $out_img_barra = $this->Ini->path_imag_temp . "/sc_" . $out_img_barra . "_img_barra_2190_" . $img_time . "_scriptcase__NM__bg__NM__bgButtonBlack.jpg";
              if (!is_file($this->Ini->root . $out_img_barra)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_img_barra);
                  $sc_obj_img->setWidth(190);
                  $sc_obj_img->setHeight(2);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_img_barra);
              } 
              $this->img_barra[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_img_barra;
          } 
          $this->img_barra[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->img_barra[$this->nm_grid_colunas]);
          if ($this->img_carro[$this->nm_grid_colunas] === "") 
          { 
              $this->img_carro[$this->nm_grid_colunas] = "" ;  
          } 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__carro_pequeno_128x128.jpg"))
          { 
              $this->img_carro[$this->nm_grid_colunas] = "" ;  
          } 
          else 
          { 
              $this->img_carro[$this->nm_grid_colunas] = $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__carro_pequeno_128x128.jpg"; 
          } 
          $this->img_carro[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->img_carro[$this->nm_grid_colunas]);
          foreach ($this->servicos_descricao[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->servicos_descricao[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->servicos_descricao[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->servicos_descricao[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->servicos_descricao[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->servicos_preco[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->servicos_preco[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->servicos_preco[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->servicos_preco[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->servicos_preco[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->servicos_preco[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_img_carro = array('posx' => 15, 'posy' => 10, 'data' => $this->img_carro[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_servicos_automotivos = array('posx' => 85, 'posy' => 0, 'data' => $this->SC_conv_utf8('Serviços Automotivos Ltda.'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 16, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => BI);
            $cell_servicos_prestados_1 = array('posx' => 65, 'posy' => 18, 'data' => $this->SC_conv_utf8('Motor - Freio - Suspenção - Limpeza de Bico - Injeção Eletrônica '), 'width'      => 10, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_servicos_prestados_2 = array('posx' => 105, 'posy' => 23, 'data' => $this->SC_conv_utf8('Escapamento - Elétrica'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa_tel = array('posx' => 83, 'posy' => 28, 'data' => $this->SC_conv_utf8('2586-6961 - 7745-9264/65 - ID. 100*2235/36'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_empresa_endereco = array('posx' => 77, 'posy' => 33, 'data' => $this->SC_conv_utf8('Av. Erva de Santa Luzia, 582 - Vila Mara - S. Paulo'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => I);
            $cell_empresa = array('posx' => 5, 'posy' => 30, 'data' => $this->SC_conv_utf8('Mecani-Car'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 18, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_img_barra = array('posx' => 10, 'posy' => 50, 'data' => $this->img_barra[$this->nm_grid_colunas], 'width'      => 5, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nome = array('posx' => 0, 'posy' => 45, 'data' => $this->SC_conv_utf8('Nome: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_c_nome = array('posx' => 25, 'posy' => 45, 'data' => $this->c_nome[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_id = array('posx' => 155, 'posy' => 44, 'data' => $this->SC_conv_utf8('OS: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_os_id = array('posx' => 165, 'posy' => 45, 'data' => $this->os_id[$this->nm_grid_colunas], 'width'      => 25, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cpf_cnpj = array('posx' => 0, 'posy' => 50, 'data' => $this->SC_conv_utf8('CPF/CNPJ: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_c_cpfCnpj = array('posx' => 35, 'posy' => 50, 'data' => $this->c_cpfcnpj[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_data_entrada = array('posx' => 138, 'posy' => 50, 'data' => $this->SC_conv_utf8('Data Entrada: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_os_dataAbertura = array('posx' => 165, 'posy' => 50, 'data' => $this->os_dataabertura[$this->nm_grid_colunas], 'width'      => 25, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_modelo = array('posx' => 0, 'posy' => 55, 'data' => $this->SC_conv_utf8('Modelo: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_m_modelo = array('posx' => 28, 'posy' => 55, 'data' => $this->m_modelo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_placa = array('posx' => 100, 'posy' => 55, 'data' => $this->SC_conv_utf8('Placa: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_cc_placa = array('posx' => 115, 'posy' => 55, 'data' => $this->cc_placa[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_img_barra_2 = array('posx' => 10, 'posy' => 72, 'data' => $this->img_barra[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_descricao = array('posx' => 15, 'posy' => 65, 'data' => $this->SC_conv_utf8('Descrição'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_preco = array('posx' => 15, 'posy' => 65, 'data' => $this->SC_conv_utf8('Preço'), 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_servicos_descricao = array('posx' => 15, 'posy' => 72, 'data' => $this->servicos_descricao[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_servicos_preco = array('posx' => 15, 'posy' => 72, 'data' => $this->servicos_preco[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_img_barra_3 = array('posx' => 10, 'posy' => 250, 'data' => $this->img_barra[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_preco_total = array('posx' => 115, 'posy' => 250, 'data' => $this->SC_conv_utf8('Preço Total: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 16, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_os_preco = array('posx' => 155, 'posy' => 250, 'data' => $this->os_preco[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 16, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_responsabilidade = array('posx' => 26, 'posy' => 260, 'data' => $this->SC_conv_utf8('A Mecani-Car não se responsabiliza por pertences deixados dentro dos veículos.'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);

            if (isset($cell_img_carro['data']) && !empty($cell_img_carro['data']) && is_file($cell_img_carro['data']))
            {
                $this->Pdf->Image($cell_img_carro['data'], $cell_img_carro['posx'], $cell_img_carro['posy'], 0, 0);
            }

            $this->Pdf->SetFont($cell_servicos_automotivos['font_type'], $cell_servicos_automotivos['font_style'], $cell_servicos_automotivos['font_size']);
            $this->pdf_text_color($cell_servicos_automotivos['data'], $cell_servicos_automotivos['color_r'], $cell_servicos_automotivos['color_g'], $cell_servicos_automotivos['color_b']);
            if (!empty($cell_servicos_automotivos['posx']) && !empty($cell_servicos_automotivos['posy']))
            {
                $this->Pdf->SetXY($cell_servicos_automotivos['posx'], $cell_servicos_automotivos['posy']);
            }
            elseif (!empty($cell_servicos_automotivos['posx']))
            {
                $this->Pdf->SetX($cell_servicos_automotivos['posx']);
            }
            elseif (!empty($cell_servicos_automotivos['posy']))
            {
                $this->Pdf->SetY($cell_servicos_automotivos['posy']);
            }
            $this->Pdf->Cell($cell_servicos_automotivos['width'], 0, $cell_servicos_automotivos['data'], 0, 0, $cell_servicos_automotivos['align']);

            $this->Pdf->SetFont($cell_servicos_prestados_1['font_type'], $cell_servicos_prestados_1['font_style'], $cell_servicos_prestados_1['font_size']);
            $this->pdf_text_color($cell_servicos_prestados_1['data'], $cell_servicos_prestados_1['color_r'], $cell_servicos_prestados_1['color_g'], $cell_servicos_prestados_1['color_b']);
            if (!empty($cell_servicos_prestados_1['posx']) && !empty($cell_servicos_prestados_1['posy']))
            {
                $this->Pdf->SetXY($cell_servicos_prestados_1['posx'], $cell_servicos_prestados_1['posy']);
            }
            elseif (!empty($cell_servicos_prestados_1['posx']))
            {
                $this->Pdf->SetX($cell_servicos_prestados_1['posx']);
            }
            elseif (!empty($cell_servicos_prestados_1['posy']))
            {
                $this->Pdf->SetY($cell_servicos_prestados_1['posy']);
            }
            $this->Pdf->Cell($cell_servicos_prestados_1['width'], 0, $cell_servicos_prestados_1['data'], 0, 0, $cell_servicos_prestados_1['align']);

            $this->Pdf->SetFont($cell_servicos_prestados_2['font_type'], $cell_servicos_prestados_2['font_style'], $cell_servicos_prestados_2['font_size']);
            $this->pdf_text_color($cell_servicos_prestados_2['data'], $cell_servicos_prestados_2['color_r'], $cell_servicos_prestados_2['color_g'], $cell_servicos_prestados_2['color_b']);
            if (!empty($cell_servicos_prestados_2['posx']) && !empty($cell_servicos_prestados_2['posy']))
            {
                $this->Pdf->SetXY($cell_servicos_prestados_2['posx'], $cell_servicos_prestados_2['posy']);
            }
            elseif (!empty($cell_servicos_prestados_2['posx']))
            {
                $this->Pdf->SetX($cell_servicos_prestados_2['posx']);
            }
            elseif (!empty($cell_servicos_prestados_2['posy']))
            {
                $this->Pdf->SetY($cell_servicos_prestados_2['posy']);
            }
            $this->Pdf->Cell($cell_servicos_prestados_2['width'], 0, $cell_servicos_prestados_2['data'], 0, 0, $cell_servicos_prestados_2['align']);

            $this->Pdf->SetFont($cell_empresa_tel['font_type'], $cell_empresa_tel['font_style'], $cell_empresa_tel['font_size']);
            $this->pdf_text_color($cell_empresa_tel['data'], $cell_empresa_tel['color_r'], $cell_empresa_tel['color_g'], $cell_empresa_tel['color_b']);
            if (!empty($cell_empresa_tel['posx']) && !empty($cell_empresa_tel['posy']))
            {
                $this->Pdf->SetXY($cell_empresa_tel['posx'], $cell_empresa_tel['posy']);
            }
            elseif (!empty($cell_empresa_tel['posx']))
            {
                $this->Pdf->SetX($cell_empresa_tel['posx']);
            }
            elseif (!empty($cell_empresa_tel['posy']))
            {
                $this->Pdf->SetY($cell_empresa_tel['posy']);
            }
            $this->Pdf->Cell($cell_empresa_tel['width'], 0, $cell_empresa_tel['data'], 0, 0, $cell_empresa_tel['align']);

            $this->Pdf->SetFont($cell_empresa_endereco['font_type'], $cell_empresa_endereco['font_style'], $cell_empresa_endereco['font_size']);
            $this->pdf_text_color($cell_empresa_endereco['data'], $cell_empresa_endereco['color_r'], $cell_empresa_endereco['color_g'], $cell_empresa_endereco['color_b']);
            if (!empty($cell_empresa_endereco['posx']) && !empty($cell_empresa_endereco['posy']))
            {
                $this->Pdf->SetXY($cell_empresa_endereco['posx'], $cell_empresa_endereco['posy']);
            }
            elseif (!empty($cell_empresa_endereco['posx']))
            {
                $this->Pdf->SetX($cell_empresa_endereco['posx']);
            }
            elseif (!empty($cell_empresa_endereco['posy']))
            {
                $this->Pdf->SetY($cell_empresa_endereco['posy']);
            }
            $this->Pdf->Cell($cell_empresa_endereco['width'], 0, $cell_empresa_endereco['data'], 0, 0, $cell_empresa_endereco['align']);

            $this->Pdf->SetFont($cell_empresa['font_type'], $cell_empresa['font_style'], $cell_empresa['font_size']);
            $this->pdf_text_color($cell_empresa['data'], $cell_empresa['color_r'], $cell_empresa['color_g'], $cell_empresa['color_b']);
            if (!empty($cell_empresa['posx']) && !empty($cell_empresa['posy']))
            {
                $this->Pdf->SetXY($cell_empresa['posx'], $cell_empresa['posy']);
            }
            elseif (!empty($cell_empresa['posx']))
            {
                $this->Pdf->SetX($cell_empresa['posx']);
            }
            elseif (!empty($cell_empresa['posy']))
            {
                $this->Pdf->SetY($cell_empresa['posy']);
            }
            $this->Pdf->Cell($cell_empresa['width'], 0, $cell_empresa['data'], 0, 0, $cell_empresa['align']);

            if (isset($cell_img_barra['data']) && !empty($cell_img_barra['data']) && is_file($cell_img_barra['data']))
            {
                $this->Pdf->Image($cell_img_barra['data'], $cell_img_barra['posx'], $cell_img_barra['posy'], 190, 2);
            }

            $this->Pdf->SetFont($cell_nome['font_type'], $cell_nome['font_style'], $cell_nome['font_size']);
            $this->pdf_text_color($cell_nome['data'], $cell_nome['color_r'], $cell_nome['color_g'], $cell_nome['color_b']);
            if (!empty($cell_nome['posx']) && !empty($cell_nome['posy']))
            {
                $this->Pdf->SetXY($cell_nome['posx'], $cell_nome['posy']);
            }
            elseif (!empty($cell_nome['posx']))
            {
                $this->Pdf->SetX($cell_nome['posx']);
            }
            elseif (!empty($cell_nome['posy']))
            {
                $this->Pdf->SetY($cell_nome['posy']);
            }
            $this->Pdf->Cell($cell_nome['width'], 0, $cell_nome['data'], 0, 0, $cell_nome['align']);

            $this->Pdf->SetFont($cell_c_nome['font_type'], $cell_c_nome['font_style'], $cell_c_nome['font_size']);
            $this->pdf_text_color($cell_c_nome['data'], $cell_c_nome['color_r'], $cell_c_nome['color_g'], $cell_c_nome['color_b']);
            if (!empty($cell_c_nome['posx']) && !empty($cell_c_nome['posy']))
            {
                $this->Pdf->SetXY($cell_c_nome['posx'], $cell_c_nome['posy']);
            }
            elseif (!empty($cell_c_nome['posx']))
            {
                $this->Pdf->SetX($cell_c_nome['posx']);
            }
            elseif (!empty($cell_c_nome['posy']))
            {
                $this->Pdf->SetY($cell_c_nome['posy']);
            }
            $this->Pdf->Cell($cell_c_nome['width'], 0, $cell_c_nome['data'], 0, 0, $cell_c_nome['align']);

            $this->Pdf->SetFont($cell_id['font_type'], $cell_id['font_style'], $cell_id['font_size']);
            $this->pdf_text_color($cell_id['data'], $cell_id['color_r'], $cell_id['color_g'], $cell_id['color_b']);
            if (!empty($cell_id['posx']) && !empty($cell_id['posy']))
            {
                $this->Pdf->SetXY($cell_id['posx'], $cell_id['posy']);
            }
            elseif (!empty($cell_id['posx']))
            {
                $this->Pdf->SetX($cell_id['posx']);
            }
            elseif (!empty($cell_id['posy']))
            {
                $this->Pdf->SetY($cell_id['posy']);
            }
            $this->Pdf->Cell($cell_id['width'], 0, $cell_id['data'], 0, 0, $cell_id['align']);

            $this->Pdf->SetFont($cell_os_id['font_type'], $cell_os_id['font_style'], $cell_os_id['font_size']);
            $this->pdf_text_color($cell_os_id['data'], $cell_os_id['color_r'], $cell_os_id['color_g'], $cell_os_id['color_b']);
            if (!empty($cell_os_id['posx']) && !empty($cell_os_id['posy']))
            {
                $this->Pdf->SetXY($cell_os_id['posx'], $cell_os_id['posy']);
            }
            elseif (!empty($cell_os_id['posx']))
            {
                $this->Pdf->SetX($cell_os_id['posx']);
            }
            elseif (!empty($cell_os_id['posy']))
            {
                $this->Pdf->SetY($cell_os_id['posy']);
            }
            $this->Pdf->Cell($cell_os_id['width'], 0, $cell_os_id['data'], 0, 0, $cell_os_id['align']);

            $this->Pdf->SetFont($cell_cpf_cnpj['font_type'], $cell_cpf_cnpj['font_style'], $cell_cpf_cnpj['font_size']);
            $this->pdf_text_color($cell_cpf_cnpj['data'], $cell_cpf_cnpj['color_r'], $cell_cpf_cnpj['color_g'], $cell_cpf_cnpj['color_b']);
            if (!empty($cell_cpf_cnpj['posx']) && !empty($cell_cpf_cnpj['posy']))
            {
                $this->Pdf->SetXY($cell_cpf_cnpj['posx'], $cell_cpf_cnpj['posy']);
            }
            elseif (!empty($cell_cpf_cnpj['posx']))
            {
                $this->Pdf->SetX($cell_cpf_cnpj['posx']);
            }
            elseif (!empty($cell_cpf_cnpj['posy']))
            {
                $this->Pdf->SetY($cell_cpf_cnpj['posy']);
            }
            $this->Pdf->Cell($cell_cpf_cnpj['width'], 0, $cell_cpf_cnpj['data'], 0, 0, $cell_cpf_cnpj['align']);

            $this->Pdf->SetFont($cell_c_cpfCnpj['font_type'], $cell_c_cpfCnpj['font_style'], $cell_c_cpfCnpj['font_size']);
            $this->pdf_text_color($cell_c_cpfCnpj['data'], $cell_c_cpfCnpj['color_r'], $cell_c_cpfCnpj['color_g'], $cell_c_cpfCnpj['color_b']);
            if (!empty($cell_c_cpfCnpj['posx']) && !empty($cell_c_cpfCnpj['posy']))
            {
                $this->Pdf->SetXY($cell_c_cpfCnpj['posx'], $cell_c_cpfCnpj['posy']);
            }
            elseif (!empty($cell_c_cpfCnpj['posx']))
            {
                $this->Pdf->SetX($cell_c_cpfCnpj['posx']);
            }
            elseif (!empty($cell_c_cpfCnpj['posy']))
            {
                $this->Pdf->SetY($cell_c_cpfCnpj['posy']);
            }
            $this->Pdf->Cell($cell_c_cpfCnpj['width'], 0, $cell_c_cpfCnpj['data'], 0, 0, $cell_c_cpfCnpj['align']);

            $this->Pdf->SetFont($cell_data_entrada['font_type'], $cell_data_entrada['font_style'], $cell_data_entrada['font_size']);
            $this->pdf_text_color($cell_data_entrada['data'], $cell_data_entrada['color_r'], $cell_data_entrada['color_g'], $cell_data_entrada['color_b']);
            if (!empty($cell_data_entrada['posx']) && !empty($cell_data_entrada['posy']))
            {
                $this->Pdf->SetXY($cell_data_entrada['posx'], $cell_data_entrada['posy']);
            }
            elseif (!empty($cell_data_entrada['posx']))
            {
                $this->Pdf->SetX($cell_data_entrada['posx']);
            }
            elseif (!empty($cell_data_entrada['posy']))
            {
                $this->Pdf->SetY($cell_data_entrada['posy']);
            }
            $this->Pdf->Cell($cell_data_entrada['width'], 0, $cell_data_entrada['data'], 0, 0, $cell_data_entrada['align']);

            $this->Pdf->SetFont($cell_os_dataAbertura['font_type'], $cell_os_dataAbertura['font_style'], $cell_os_dataAbertura['font_size']);
            $this->pdf_text_color($cell_os_dataAbertura['data'], $cell_os_dataAbertura['color_r'], $cell_os_dataAbertura['color_g'], $cell_os_dataAbertura['color_b']);
            if (!empty($cell_os_dataAbertura['posx']) && !empty($cell_os_dataAbertura['posy']))
            {
                $this->Pdf->SetXY($cell_os_dataAbertura['posx'], $cell_os_dataAbertura['posy']);
            }
            elseif (!empty($cell_os_dataAbertura['posx']))
            {
                $this->Pdf->SetX($cell_os_dataAbertura['posx']);
            }
            elseif (!empty($cell_os_dataAbertura['posy']))
            {
                $this->Pdf->SetY($cell_os_dataAbertura['posy']);
            }
            $this->Pdf->Cell($cell_os_dataAbertura['width'], 0, $cell_os_dataAbertura['data'], 0, 0, $cell_os_dataAbertura['align']);

            $this->Pdf->SetFont($cell_modelo['font_type'], $cell_modelo['font_style'], $cell_modelo['font_size']);
            $this->pdf_text_color($cell_modelo['data'], $cell_modelo['color_r'], $cell_modelo['color_g'], $cell_modelo['color_b']);
            if (!empty($cell_modelo['posx']) && !empty($cell_modelo['posy']))
            {
                $this->Pdf->SetXY($cell_modelo['posx'], $cell_modelo['posy']);
            }
            elseif (!empty($cell_modelo['posx']))
            {
                $this->Pdf->SetX($cell_modelo['posx']);
            }
            elseif (!empty($cell_modelo['posy']))
            {
                $this->Pdf->SetY($cell_modelo['posy']);
            }
            $this->Pdf->Cell($cell_modelo['width'], 0, $cell_modelo['data'], 0, 0, $cell_modelo['align']);

            $this->Pdf->SetFont($cell_m_modelo['font_type'], $cell_m_modelo['font_style'], $cell_m_modelo['font_size']);
            $this->pdf_text_color($cell_m_modelo['data'], $cell_m_modelo['color_r'], $cell_m_modelo['color_g'], $cell_m_modelo['color_b']);
            if (!empty($cell_m_modelo['posx']) && !empty($cell_m_modelo['posy']))
            {
                $this->Pdf->SetXY($cell_m_modelo['posx'], $cell_m_modelo['posy']);
            }
            elseif (!empty($cell_m_modelo['posx']))
            {
                $this->Pdf->SetX($cell_m_modelo['posx']);
            }
            elseif (!empty($cell_m_modelo['posy']))
            {
                $this->Pdf->SetY($cell_m_modelo['posy']);
            }
            $this->Pdf->Cell($cell_m_modelo['width'], 0, $cell_m_modelo['data'], 0, 0, $cell_m_modelo['align']);

            $this->Pdf->SetFont($cell_placa['font_type'], $cell_placa['font_style'], $cell_placa['font_size']);
            $this->pdf_text_color($cell_placa['data'], $cell_placa['color_r'], $cell_placa['color_g'], $cell_placa['color_b']);
            if (!empty($cell_placa['posx']) && !empty($cell_placa['posy']))
            {
                $this->Pdf->SetXY($cell_placa['posx'], $cell_placa['posy']);
            }
            elseif (!empty($cell_placa['posx']))
            {
                $this->Pdf->SetX($cell_placa['posx']);
            }
            elseif (!empty($cell_placa['posy']))
            {
                $this->Pdf->SetY($cell_placa['posy']);
            }
            $this->Pdf->Cell($cell_placa['width'], 0, $cell_placa['data'], 0, 0, $cell_placa['align']);

            $this->Pdf->SetFont($cell_cc_placa['font_type'], $cell_cc_placa['font_style'], $cell_cc_placa['font_size']);
            $this->pdf_text_color($cell_cc_placa['data'], $cell_cc_placa['color_r'], $cell_cc_placa['color_g'], $cell_cc_placa['color_b']);
            if (!empty($cell_cc_placa['posx']) && !empty($cell_cc_placa['posy']))
            {
                $this->Pdf->SetXY($cell_cc_placa['posx'], $cell_cc_placa['posy']);
            }
            elseif (!empty($cell_cc_placa['posx']))
            {
                $this->Pdf->SetX($cell_cc_placa['posx']);
            }
            elseif (!empty($cell_cc_placa['posy']))
            {
                $this->Pdf->SetY($cell_cc_placa['posy']);
            }
            $this->Pdf->Cell($cell_cc_placa['width'], 0, $cell_cc_placa['data'], 0, 0, $cell_cc_placa['align']);

            if (isset($cell_img_barra_2['data']) && !empty($cell_img_barra_2['data']) && is_file($cell_img_barra_2['data']))
            {
                $this->Pdf->Image($cell_img_barra_2['data'], $cell_img_barra_2['posx'], $cell_img_barra_2['posy'], 190, 2);
            }

            $this->Pdf->SetFont($cell_descricao['font_type'], $cell_descricao['font_style'], $cell_descricao['font_size']);
            $this->pdf_text_color($cell_descricao['data'], $cell_descricao['color_r'], $cell_descricao['color_g'], $cell_descricao['color_b']);
            if (!empty($cell_descricao['posx']) && !empty($cell_descricao['posy']))
            {
                $this->Pdf->SetXY($cell_descricao['posx'], $cell_descricao['posy']);
            }
            elseif (!empty($cell_descricao['posx']))
            {
                $this->Pdf->SetX($cell_descricao['posx']);
            }
            elseif (!empty($cell_descricao['posy']))
            {
                $this->Pdf->SetY($cell_descricao['posy']);
            }
            $this->Pdf->Cell($cell_descricao['width'], 0, $cell_descricao['data'], 0, 0, $cell_descricao['align']);

            $this->Pdf->SetFont($cell_preco['font_type'], $cell_preco['font_style'], $cell_preco['font_size']);
            $this->pdf_text_color($cell_preco['data'], $cell_preco['color_r'], $cell_preco['color_g'], $cell_preco['color_b']);
            if (!empty($cell_preco['posx']) && !empty($cell_preco['posy']))
            {
                $this->Pdf->SetXY($cell_preco['posx'], $cell_preco['posy']);
            }
            elseif (!empty($cell_preco['posx']))
            {
                $this->Pdf->SetX($cell_preco['posx']);
            }
            elseif (!empty($cell_preco['posy']))
            {
                $this->Pdf->SetY($cell_preco['posy']);
            }
            $this->Pdf->Cell($cell_preco['width'], 0, $cell_preco['data'], 0, 0, $cell_preco['align']);

            $this->Pdf->SetY(72);
            foreach ($this->servicos[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_servicos_descricao['font_type'], $cell_servicos_descricao['font_style'], $cell_servicos_descricao['font_size']);
                if (!empty($cell_servicos_descricao['posx']))
                {
                    $this->Pdf->SetX($cell_servicos_descricao['posx']);
                }
                $NM_partes_val = explode("<br>", $this->servicos_descricao[$this->nm_grid_colunas][$NM_ind]);
                $PosX = $this->Pdf->GetX();
                $Incre = false;
                $sv_Y  = $this->Pdf->GetY();
                $tmp_Y = $sv_Y;
                if (!isset($max_Y) || empty($max_Y))
                {
                    $max_Y = $sv_Y;
                }
                foreach ($NM_partes_val as $Lines)
                {
                    if ($Incre)
                    {
                        $this->Pdf->Ln(4.2333333333333);
                        $tmp_Y += 4.2333333333333;
                        $max_Y = ($tmp_Y > $max_Y) ? $tmp_Y : $max_Y;
                    }
                    $this->Pdf->SetX($PosX);
                    $atu_X = $this->Pdf->GetX();
                    $atu_Y = $this->Pdf->GetY();
                    $this->Pdf->SetTextColor($cell_servicos_descricao['color_r'], $cell_servicos_descricao['color_g'], $cell_servicos_descricao['color_b']);
                    $this->Pdf->writeHTMLCell($cell_servicos_descricao['width'], 0, $atu_X, $atu_Y, trim($Lines), 0, 0, false, true, $cell_servicos_descricao['align']);
                    $this->Pdf->SetY($atu_Y);
                    $Incre = true;
                }
                $this->Pdf->SetY($sv_Y);
                $this->Pdf->SetFont($cell_servicos_preco['font_type'], $cell_servicos_preco['font_style'], $cell_servicos_preco['font_size']);
                if (!empty($cell_servicos_preco['posx']))
                {
                    $this->Pdf->SetX($cell_servicos_preco['posx']);
                }
                $this->pdf_text_color($this->servicos_preco[$this->nm_grid_colunas][$NM_ind], $cell_servicos_preco['color_r'], $cell_servicos_preco['color_g'], $cell_servicos_preco['color_b']);
                $this->Pdf->Cell($cell_servicos_preco['width'], 0, $this->servicos_preco[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_servicos_preco['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 7;
                $this->Pdf->SetY($max_Y);

            }
            if (isset($cell_img_barra_3['data']) && !empty($cell_img_barra_3['data']) && is_file($cell_img_barra_3['data']))
            {
                $this->Pdf->Image($cell_img_barra_3['data'], $cell_img_barra_3['posx'], $cell_img_barra_3['posy'], 190, 2);
            }

            $this->Pdf->SetFont($cell_preco_total['font_type'], $cell_preco_total['font_style'], $cell_preco_total['font_size']);
            $this->pdf_text_color($cell_preco_total['data'], $cell_preco_total['color_r'], $cell_preco_total['color_g'], $cell_preco_total['color_b']);
            if (!empty($cell_preco_total['posx']) && !empty($cell_preco_total['posy']))
            {
                $this->Pdf->SetXY($cell_preco_total['posx'], $cell_preco_total['posy']);
            }
            elseif (!empty($cell_preco_total['posx']))
            {
                $this->Pdf->SetX($cell_preco_total['posx']);
            }
            elseif (!empty($cell_preco_total['posy']))
            {
                $this->Pdf->SetY($cell_preco_total['posy']);
            }
            $this->Pdf->Cell($cell_preco_total['width'], 0, $cell_preco_total['data'], 0, 0, $cell_preco_total['align']);

            $this->Pdf->SetFont($cell_os_preco['font_type'], $cell_os_preco['font_style'], $cell_os_preco['font_size']);
            $this->pdf_text_color($cell_os_preco['data'], $cell_os_preco['color_r'], $cell_os_preco['color_g'], $cell_os_preco['color_b']);
            if (!empty($cell_os_preco['posx']) && !empty($cell_os_preco['posy']))
            {
                $this->Pdf->SetXY($cell_os_preco['posx'], $cell_os_preco['posy']);
            }
            elseif (!empty($cell_os_preco['posx']))
            {
                $this->Pdf->SetX($cell_os_preco['posx']);
            }
            elseif (!empty($cell_os_preco['posy']))
            {
                $this->Pdf->SetY($cell_os_preco['posy']);
            }
            $this->Pdf->Cell($cell_os_preco['width'], 0, $cell_os_preco['data'], 0, 0, $cell_os_preco['align']);

            $this->Pdf->SetFont($cell_responsabilidade['font_type'], $cell_responsabilidade['font_style'], $cell_responsabilidade['font_size']);
            $this->pdf_text_color($cell_responsabilidade['data'], $cell_responsabilidade['color_r'], $cell_responsabilidade['color_g'], $cell_responsabilidade['color_b']);
            if (!empty($cell_responsabilidade['posx']) && !empty($cell_responsabilidade['posy']))
            {
                $this->Pdf->SetXY($cell_responsabilidade['posx'], $cell_responsabilidade['posy']);
            }
            elseif (!empty($cell_responsabilidade['posx']))
            {
                $this->Pdf->SetX($cell_responsabilidade['posx']);
            }
            elseif (!empty($cell_responsabilidade['posy']))
            {
                $this->Pdf->SetY($cell_responsabilidade['posy']);
            }
            $this->Pdf->Cell($cell_responsabilidade['width'], 0, $cell_responsabilidade['data'], 0, 0, $cell_responsabilidade['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
