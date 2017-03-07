<?php

class pdfreport_nota_servico_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function pdfreport_nota_servico_rtf()
   {
      $this->nm_data   = new nm_data("pt_br");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $this->Teste_validade = new NM_Valida;
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdfreport_nota_servico";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_nota_servico.rtf";
   }

   //----- 
   function gera_texto_tag()
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['rtf_name']);
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

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['os_id'])) ? $this->New_label['os_id'] : "Id"; 
          if ($Cada_col == "os_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['os_dataabertura'])) ? $this->New_label['os_dataabertura'] : "Data Abertura"; 
          if ($Cada_col == "os_dataabertura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['os_preco'])) ? $this->New_label['os_preco'] : "Preco"; 
          if ($Cada_col == "os_preco" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cc_placa'])) ? $this->New_label['cc_placa'] : "Placa"; 
          if ($Cada_col == "cc_placa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_nome'])) ? $this->New_label['c_nome'] : "Nome"; 
          if ($Cada_col == "c_nome" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_cpfcnpj'])) ? $this->New_label['c_cpfcnpj'] : "Cpf Cnpj"; 
          if ($Cada_col == "c_cpfcnpj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['m_modelo'])) ? $this->New_label['m_modelo'] : "Modelo"; 
          if ($Cada_col == "m_modelo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['img_barra'])) ? $this->New_label['img_barra'] : "img_barra"; 
          if ($Cada_col == "img_barra" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['img_carro'])) ? $this->New_label['img_carro'] : "img_carro"; 
          if ($Cada_col == "img_carro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['servicos'])) ? $this->New_label['servicos'] : "servicos"; 
          if ($Cada_col == "servicos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['servicos_descricao'])) ? $this->New_label['servicos_descricao'] : "Descricao"; 
          if ($Cada_col == "servicos_descricao" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['servicos_preco'])) ? $this->New_label['servicos_preco'] : "Preco"; 
          if ($Cada_col == "servicos_preco" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->Texto_tag .= "<tr>\r\n";
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
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- os_id
   function NM_export_os_id()
   {
         nmgp_Form_Num_Val($this->os_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->os_id))
         {
             $this->os_id = sc_convert_encoding($this->os_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->os_id = str_replace('<', '&lt;', $this->os_id);
         $this->os_id = str_replace('>', '&gt;', $this->os_id);
         $this->Texto_tag .= "<td>" . $this->os_id . "</td>\r\n";
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
         if (!NM_is_utf8($this->os_dataabertura))
         {
             $this->os_dataabertura = sc_convert_encoding($this->os_dataabertura, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->os_dataabertura = str_replace('<', '&lt;', $this->os_dataabertura);
         $this->os_dataabertura = str_replace('>', '&gt;', $this->os_dataabertura);
         $this->Texto_tag .= "<td>" . $this->os_dataabertura . "</td>\r\n";
   }
   //----- os_preco
   function NM_export_os_preco()
   {
         nmgp_Form_Num_Val($this->os_preco, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->os_preco))
         {
             $this->os_preco = sc_convert_encoding($this->os_preco, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->os_preco = str_replace('<', '&lt;', $this->os_preco);
         $this->os_preco = str_replace('>', '&gt;', $this->os_preco);
         $this->Texto_tag .= "<td>" . $this->os_preco . "</td>\r\n";
   }
   //----- cc_placa
   function NM_export_cc_placa()
   {
         if ($this->cc_placa !== "&nbsp;") 
         { 
             $this->cc_placa = sc_strtoupper($this->cc_placa); 
         } 
         $this->nm_gera_mask($this->cc_placa, "###-####"); 
         $this->cc_placa = html_entity_decode($this->cc_placa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         if (!NM_is_utf8($this->cc_placa))
         {
             $this->cc_placa = sc_convert_encoding($this->cc_placa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->cc_placa = str_replace('<', '&lt;', $this->cc_placa);
         $this->cc_placa = str_replace('>', '&gt;', $this->cc_placa);
         $this->Texto_tag .= "<td>" . $this->cc_placa . "</td>\r\n";
   }
   //----- c_nome
   function NM_export_c_nome()
   {
         $this->c_nome = html_entity_decode($this->c_nome, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->c_nome = strip_tags($this->c_nome);
         if (!NM_is_utf8($this->c_nome))
         {
             $this->c_nome = sc_convert_encoding($this->c_nome, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->c_nome = str_replace('<', '&lt;', $this->c_nome);
         $this->c_nome = str_replace('>', '&gt;', $this->c_nome);
         $this->Texto_tag .= "<td>" . $this->c_nome . "</td>\r\n";
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
         if (!NM_is_utf8($this->c_cpfcnpj))
         {
             $this->c_cpfcnpj = sc_convert_encoding($this->c_cpfcnpj, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->c_cpfcnpj = str_replace('<', '&lt;', $this->c_cpfcnpj);
         $this->c_cpfcnpj = str_replace('>', '&gt;', $this->c_cpfcnpj);
         $this->Texto_tag .= "<td>" . $this->c_cpfcnpj . "</td>\r\n";
   }
   //----- m_modelo
   function NM_export_m_modelo()
   {
         $this->m_modelo = html_entity_decode($this->m_modelo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->m_modelo = strip_tags($this->m_modelo);
         if (!NM_is_utf8($this->m_modelo))
         {
             $this->m_modelo = sc_convert_encoding($this->m_modelo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->m_modelo = str_replace('<', '&lt;', $this->m_modelo);
         $this->m_modelo = str_replace('>', '&gt;', $this->m_modelo);
         $this->Texto_tag .= "<td>" . $this->m_modelo . "</td>\r\n";
   }
   //----- img_barra
   function NM_export_img_barra()
   {
         if (!NM_is_utf8($this->img_barra))
         {
             $this->img_barra = sc_convert_encoding($this->img_barra, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->img_barra = str_replace('<', '&lt;', $this->img_barra);
         $this->img_barra = str_replace('>', '&gt;', $this->img_barra);
         $this->Texto_tag .= "<td>" . $this->img_barra . "</td>\r\n";
   }
   //----- img_carro
   function NM_export_img_carro()
   {
         if (!NM_is_utf8($this->img_carro))
         {
             $this->img_carro = sc_convert_encoding($this->img_carro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->img_carro = str_replace('<', '&lt;', $this->img_carro);
         $this->img_carro = str_replace('>', '&gt;', $this->img_carro);
         $this->Texto_tag .= "<td>" . $this->img_carro . "</td>\r\n";
   }
   //----- servicos
   function NM_export_servicos()
   {
         if (!NM_is_utf8($this->servicos))
         {
             $this->servicos = sc_convert_encoding($this->servicos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->servicos = str_replace('<', '&lt;', $this->servicos);
         $this->servicos = str_replace('>', '&gt;', $this->servicos);
         $this->Texto_tag .= "<td>" . $this->servicos . "</td>\r\n";
   }
   //----- servicos_descricao
   function NM_export_servicos_descricao()
   {
         $this->servicos_descricao = html_entity_decode($this->servicos_descricao, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->servicos_descricao = strip_tags($this->servicos_descricao);
         if (!NM_is_utf8($this->servicos_descricao))
         {
             $this->servicos_descricao = sc_convert_encoding($this->servicos_descricao, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->servicos_descricao = str_replace('<', '&lt;', $this->servicos_descricao);
         $this->servicos_descricao = str_replace('>', '&gt;', $this->servicos_descricao);
         $this->Texto_tag .= "<td>" . $this->servicos_descricao . "</td>\r\n";
   }
   //----- servicos_preco
   function NM_export_servicos_preco()
   {
         nmgp_Form_Num_Val($this->servicos_preco, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->servicos_preco))
         {
             $this->servicos_preco = sc_convert_encoding($this->servicos_preco, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->servicos_preco = str_replace('<', '&lt;', $this->servicos_preco);
         $this->servicos_preco = str_replace('>', '&gt;', $this->servicos_preco);
         $this->Texto_tag .= "<td>" . $this->servicos_preco . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_nota_servico'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> -  :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="pdfreport_nota_servico_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_nota_servico"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
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
