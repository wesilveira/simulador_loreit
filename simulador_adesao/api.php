<?php
  ini_set('display_errors', 0);
	session_start();
  date_default_timezone_set('America/Fortaleza');

  set_time_limit(100000000000);

  //chama conexão banco
  include "config/db_connect.php";
  include "config/integration_connect.php";
  require_once("class.phpmailer.php");

  $params = array();

	if(isset($_POST["formData"]))
    parse_str($_POST["formData"], $params);

  if(isset($_POST["frmType"]))
    $params["frmType"] = $_POST["frmType"];

  if(isset($params["frmType"]))
  {
    $tipo = $params["frmType"];
    switch($tipo){
      case "buscaCep":
        $cep = $_POST["frmCep"];
        $cep = str_replace("-", "", $cep);
        $cep = str_replace(".", "", $cep);
        $sql = mysqli_query($conexao,"select * from ceps where cep = '$cep'");
        if(mysqli_num_rows($sql) > 0)
        {
          while($dados=mysqli_fetch_array($sql))
          {
            $retorno = array();
            $retorno["error"] = "false";
            $retorno["uf"] = $dados["uf"];
            $retorno["localidade"] = $dados["localidade"];
            $retorno["logradouro"] = $dados["logradouro"];
            $retorno["bairro"] = $dados["bairro"];
            $retorno["cep"] = $dados["cep"];

            header('Content-Type: application/json');
            echo json_encode($retorno);
            exit;
          }
        }else{
          $doBusca = json_decode(curl_rest("https://viacep.com.br/ws/$cep/json/"));
          //var_dump($doBusca);

          // if($cep == "59064900")
          // {
          //   $doBusca = json_decode('{
          //     "cep": "59064-900",
          //     "logradouro": "Avenida Senador Salgado Filho",
          //     "complemento": "",
          //     "bairro": "Candelária",
          //     "localidade": "Natal",
          //     "uf": "RN",
          //     "unidade": "",
          //     "ibge": "2408102",
          //     "gia": ""
          //   }');
          // }else{
          //   $doBusca = json_decode(curl_rest("https://viacep.com.br/ws/$cep/json/"));
          // }

          if(isset($doBusca->erro) || $doBusca === null)
          {
            header('Access-Control-Allow-Origin: *');
            header("Content-type: application/json; charset=utf-8");
            echo json_encode(array("error" => "true", "erro_msg" => "Erro busca ws."), true);
            exit;
          }else{
            $retorno = array();
            //$retorno["debug"] = $doBusca;
            $retorno["error"] = "false";
            $retorno["cep"] = str_replace("-", "", $doBusca->cep);
            $retorno["logradouro"] = $doBusca->logradouro;
            $retorno["complemento"] = $doBusca->complemento;
            $retorno["bairro"] = $doBusca->bairro;
            $retorno["localidade"] = $doBusca->localidade;
            $retorno["uf"] = $doBusca->uf;
            $retorno["unidade"] = $doBusca->unidade;
            $retorno["ibge"] = $doBusca->ibge;
            $retorno["gia"] = $doBusca->gia;

            //salva banco
            $salvaBanco = mysqli_query($conexao, "insert into ceps values (null, '".$retorno["cep"]."','".$retorno["logradouro"]."','".$retorno["complemento"]."','".$retorno["bairro"]."','".$retorno["localidade"]."','".$retorno["uf"]."','".$retorno["unidade"]."','".$retorno["ibge"]."','".$retorno["gia"]."')");
            // $localidade = strtolower($doBusca->localidade);
            // //busca profissões
            // if($localidade == "natal" or $localidade == "recife")
            // {
            //   $ufBusca = $doBusca->uf;
            //   $profissoes = array();
            //   $terminou_busca = false;
            //   $next = "";
            //   while($terminou_busca === false)
            //   {
            //     $doBuscaProfissoes = getProfissoes($ufBusca,$next);
            //     $doBuscaProfissoes = json_decode($doBuscaProfissoes,true);
            //     if(isset($doBuscaProfissoes["result"]) and $doBuscaProfissoes["result"] != "")
            //     {
            //       array_push($profissoes,$doBuscaProfissoes["result"]);
            //       if(isset($doBuscaProfissoes["next"]))
            //       {
            //         $next = ',"next":"'.$doBuscaProfissoes["next"].'"';
            //       }else{
            //         $terminou_busca = true;
            //         $next = "";
            //       }
            //     }else{
            //       $terminou_busca = true;
            //       $profissoes = false;
            //     }
            //   }
            //   $retorno["profissoes"] = $profissoes;
            }
            //fim busca

            header('Content-Type: application/json');
            echo json_encode($retorno);
            exit;
          }
        break;
      case "buscaProfissoesEntidadeAberta":
        $buscaProfissoesEntidadeAberta = mysqli_query($conexao,"select profissao from profissoes where ativo = 'SIM' order by profissao asc");
        $retorno = array();
        $retorno["error"] = false;
        $profissoes = array();
        while($rsProf=mysqli_fetch_array($buscaProfissoesEntidadeAberta))
        {
          $profissoes[] = $rsProf["profissao"];
        }
        $retorno["profissoes"] = $profissoes;
        echo json_encode($retorno);
        exit;
        break;
      case "testepwd":
        $pass = md5($_POST["pass"]);
        $busca = mysqli_query($conexao,"select * from clientes where password = '$pass'");
        if(mysqli_num_rows($busca) > 0)
        {
          echo "true";
        }else{
          echo "false";
        }
        exit;
        break;
      case "buscaProfissoes":
        $profissao = "";
        $next = "";
        if(isset($_POST["uf"]))
        {
          $uf = $_POST["uf"];

          $terminou_busca = false;
          $busca = "";
          while($terminou_busca === false)
          {
            $_busca = json_decode(getProfissoes($uf,$next,$profissao),true);
            // $_busca = $_busca["result"];
            if($_busca["result"] === "" or empty($_busca["result"]))
            {
              $terminou_busca = true;
            }else{
              if($busca === "")
              {
                $busca = $_busca["result"];
                if(isset($_busca["next"])){
                  $next = ',"start":"'.$_busca["next"].'"';
                }else{
                  $terminou_busca = true;
                }
              }else{
                foreach($_busca["result"] as $_profissao)
                {
                  array_push($busca,$_profissao);
                }
                if(isset($_busca["next"])){
                  $next = ',"start":"'.$_busca["next"].'"';
                }else{
                  $terminou_busca = true;
                }
              }
            }
          }

          echo json_encode(array("error" => "false", "profissoes" => $busca));
          exit;
          break;

        }else{
          echo json_encode(array("error" => "true", "error_msg" => "Parâmetros incorretos."), true);
          exit;
          break;
        }
        break;
      case "avancaParaDocumentacao":
        //trigger to info dep
        $avancaFormDeps = curl_rest($endpoint."crm.automation.trigger/?code=d7nsw&target=DEAL_".$_POST["deal_id"]);
        $updProposta = mysqli_query($conexao,"update propostas set status = 'ENVIO DOCUMENTAÇÃO' where deal_id = ".$_POST["deal_id"]);
        header('Content-Type: application/json');
        echo json_encode(array("error" => "false"), true);
        exit;
        break;
      case "avancaNegocioGanho":
        //trigger to info dep
        $avancaFormDeps = curl_rest($endpoint."crm.automation.trigger/?code=ximy2&target=DEAL_".$_POST["deal_id"]);
        $payload = json_decode($_POST["payload"],true);
        $updProposta = mysqli_query($conexao,"update propostas set status = 'PROPOSTA ENVIADA', infoCustomer = '".serialize($payload)."' where deal_id = ".$_POST["deal_id"]);
        header('Content-Type: application/json');
        echo json_encode(array("error" => "false"), true);
        exit;
        break;
      case "avancaParaRascunho":
        //trigger to info dep
        $avancaFormDeps = curl_rest($endpoint."crm.automation.trigger?code=14b7x&target=DEAL_".$_POST["deal_id"]);
        $updProposta = mysqli_query($conexao,"update propostas set status = 'RASCUNHO DA PROPOSTA' where deal_id = ".$_POST["deal_id"]);
        header('Content-Type: application/json');
        echo json_encode(array("error" => "false"), true);
        exit;
        break;
      case "cadastrarUsuario":
          //trigger to cadastrar usuario
          $insertUser = "insert into consultores (cpf, nome, email, login, password) VALUES ('".$_POST["cpf"]."','".$_POST["nome"]."','".$_POST["email"]."','".$_POST["login"]."','".md5(base64_encode($_POST["senha"]))."')";
          $updProposta = mysqli_query($conexao,$insertUser);
          header('Content-Type: application/json');
          echo json_encode(array("error" => "false","result" => $updCadastro, "sql" => $insertUser), true);
          exit;
          break;
      case "avancaParaRegras":
        //trigger to info dep
        $avancaFormDeps = curl_rest($endpoint."crm.automation.trigger?code=zapf8&target=DEAL_".$_POST["deal_id"]);
        //$updProposta = mysqli_query($conexao,"update propostas set status = 'ENVIO DA PROPOSTA' where deal_id = ".$_POST["deal_id"]);
        header('Content-Type: application/json');
        echo json_encode(array("error" => "false"), true);
        exit;
        break;
      case "avancaParaProposta":
        //trigger to info dep
        $avancaFormDeps = curl_rest($endpoint."crm.automation.trigger?code=upkki&target=DEAL_".$_POST["deal_id"]);
        $infoCustomer = json_decode($_POST["infoCustomer"],true);
        $updProposta = mysqli_query($conexao,"update propostas set status = 'ENVIO DA PROPOSTA', infoCustomer = '".serialize($infoCustomer)."' where deal_id = ".$_POST["deal_id"]);
        header('Content-Type: application/json');
        echo json_encode(array("error" => "false"), true);
        exit;
        break;
      case "EnviaDS":
          //trigger to info dep
          $avancaFormDeps = curl_rest($endpoint."crm.automation.trigger?code=zapf8&target=DEAL_".$_POST["deal_id"]);
          header('Content-Type: application/json');
          echo json_encode(array("error" => "false"), true);
          exit;
          break;
      case "avancaParaDS":
        //trigger to info dep

        $avancaFormDeps = curl_rest($endpoint."crm.automation.trigger?code=3htg8&target=DEAL_".$_POST["deal_id"]);
        $infoCustomer = json_decode($_POST["infoCustomer"],true);
        log_api("");
        log_api("ETAPA DECLARAÇÃO DE SAÚDE: DEAL ".$_POST["deal_id"]);
        log_api("InfoCustomer atual:");
        log_api(serialize($infoCustomer));
        $updProposta = mysqli_query($conexao,"update propostas set status = 'DECLARAÇÃO DE SAÚDE', infoCustomer = '".serialize($infoCustomer)."' where deal_id = ".$_POST["deal_id"]);

        $deal_id = $_POST["deal_id"];
        $buscaDeal = mysqli_query($conexao,"select * from propostas where deal_id = '$deal_id' and infoCustomer='N;'");
        $countrows = mysqli_num_rows($buscaDeal);

        if($countrows > 0){
            $infoCustomer = json_decode($_POST["infoCustomer"],true);
            log_api("ALERTA: Erro identificado no update da proposta. Tentando atualizar");
            $updProposta = mysqli_query($conexao,"update propostas set status = 'DECLARAÇÃO DE SAÚDE', infoCustomer = '".serialize($infoCustomer)."' where deal_id = ".$_POST["deal_id"]);
            log_api(serialize($infoCustomer));

              $buscaDeal = mysqli_query($conexao,"select * from propostas where deal_id = '$deal_id' and infoCustomer='N;'");
              $countrows = mysqli_num_rows($buscaDeal);
              if($countrows > 0){
                log_api("Alerta: Erro no update da proposta não recuperado.");
              }else{
                log_api("Alerta: Sucesso, erro no update da proposta recuperado");
              }
        }else{
          log_api("MENSAGEM: Proposta atualizada na fase de DECLARAÇÃO DE SAÚDE.");
        }
        header('Content-Type: application/json');
        echo json_encode(array("error" => "false"), true);
        exit;
        break;
      case "enviaEmail":
          //trigger to info dep

          $from = "atendimento@heaolu.com.br";
          $to = $_POST["to"];
          $url = $_POST["urlds"];
          $headers = "From:" . $from.", Content-Type: text/html; charset=UTF-8";
          //mail($to,$subject,$message, $headers);
          //echo "The email message was sent.";
          $message = "<html><body>";
          $message .= "Olá,";
          $message .= "<br>";
          $message .= "Para darmos continuidade a sua contratação, clique no link a baixo para abrir e preencher a sua declaração de saúde.";
          $message .= "<br>";
          $message .= "<br>";
          $message .= '<a href="'.$url.'">Declaração de Saúde</a>';
          $message .= "</body></html>";

          //require_once("class.phpmailer.php");
            $mail = new PHPMailer();
            $mail->IsSMTP();		// Ativar SMTP
            $mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
            $mail->SMTPAuth = true;		// Autenticação ativada
            $mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
            $mail->Host = 'mail.heaolu.com.br';	// SMTP utilizado
            $mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
            $mail->Username = "atendimento@heaolu.com.br";
            $mail->Password = "atendimentoH2020";
            $mail->SetFrom($from, "Atendimento");
            $mail->isHTML(true);
            $mail->CharSet="UTF-8";
            $assunto = '=?UTF-8?B?'.base64_encode('DECLARAÇÃO DE SAÚDE').'?=';
            $mail->Subject = $assunto;
            $mail->Body = $message;
            $mail->AddAddress($to);
            if(!$mail->Send()) {
              $error = 'Mail error: '.$mail->ErrorInfo;
              return false;
            } else {
              $error = 'Mensagem enviada!';
              return true;
            }

          exit;
          break;
      case "enviaOrcamento":
            //trigger to info dep

            $from = "atendimento@heaolu.com.br";
            $to = $_POST["to"];
            $url = $_POST["urlds"];
            $corpo = $_POST["corpo"];
            $headers = "From:" . $from.", Content-Type: text/html; charset=UTF-8";
            //mail($to,$subject,$message, $headers);
            //echo "The email message was sent.";
            $message = "<html><body>";
            $message .= "Olá,";
            $message .= "<br>";
            $message .= "Para darmos continuidade a sua contratação, clique no link a baixo para abrir e preencher a sua declaração de saúde.";
            $message .= "<br>";
            $message .= "<br>";
            $message .= '<a href="'.$url.'">Declaração de Saúde</a>';
            $message .= "</body></html>";

            //require_once("class.phpmailer.php");
              $mail = new PHPMailer();
              $mail->IsSMTP();		// Ativar SMTP
              $mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
              $mail->SMTPAuth = true;		// Autenticação ativada
              $mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
              $mail->Host = 'mail.heaolu.com.br';	// SMTP utilizado
              $mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
              $mail->Username = "atendimento@heaolu.com.br";
              $mail->Password = "atendimentoH2020";
              $mail->SetFrom($from, "Atendimento");
              $mail->isHTML(true);
              $mail->CharSet="UTF-8";
              $assunto = '=?UTF-8?B?'.base64_encode('ORÇAMENTO H2U').'?=';
              $mail->Subject = $assunto;
              $mail->Body = $corpo;
              $mail->AddAddress($to);
              if(!$mail->Send()) {
                $error = 'Mail error: '.$mail->ErrorInfo;
                return false;
              } else {
                $error = 'Mensagem enviada!';
                return true;
              }

            exit;
            break;
      case "gravaLead":
        $payload = null;
        if(isset($_POST["payload"]) and isset($_POST["cobertura"]))
        {
          $payload = json_decode($_POST["payload"],true);
          $cobertura = $_POST["cobertura"];
        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }

        $comment = ($cobertura == "s") ? "[SIMULADOR] - Cliente residente em localidade com cobertura. Preenchido dados iniciais." : "[STORE] - Cliente residente em localidade sem cobertura. Manifestou interesse em deixar contato salvo.";
        //payload mount
        $prepareToSend = '{
            "fields": {
                "TITLE": "'.$payload["NAME"].'",
                "NAME": "'.$payload["NAME"].'",
                "PHONE": [
                    {
                        "VALUE": "'.$payload["PHONE"].'",
                        "VALUE_TYPE": "WORK"
                    }
                ],
                "EMAIL": [
                    {
                        "VALUE": "'.$payload["EMAIL"].'",
                        "VALUE_TYPE": "WORK"
                    }
                ],
                "OPENED": "Y",
                "COMMENTS": "'.$comment.'",
                "TYPE_ID": "CLIENT",
                "ASSIGNED_BY_ID": "'.$payload["CODIGO"].'",
                "CREATED_BY_ID": "'.$payload["CODIGO"].'",
                "SOURCE_ID": "STORE",
                "UTM_SOURCE": "'.$payload["UTM_SOURCE"].'",
                "UTM_MEDIUM": "'.$payload["UTM_MEDIUM"].'",
                "UTM_CAMPAIGN": "'.$payload["UTM_CAMPAIGN"].'",
                "UTM_CONTENT": "'.$payload["UTM_CONTENT"].'",
                "UTM_TERM": "'.$payload["UTM_TERM"].'",
                "UF_CRM_1606913170965": "'.$payload["OPERACAO"].'"
            }
        }';

        $sendToBitrix = curl_bitrix_lead_add($prepareToSend);
        $sendToBitrix = json_decode($sendToBitrix,true);

        if(isset($sendToBitrix["result"]) and ($sendToBitrix["result"] != "" or !empty($sendToBitrix["result"])))
        {
          $lead_id = $sendToBitrix["result"];
          header('Content-Type: application/json');
          echo json_encode(array("error" => "false", "lead_id" => $lead_id), true);
          exit;
        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Falha ao salvar dados."), true);
          exit;
        }
        exit;
        break;
      case "consultaDSpreenchida":
        $payload = null;
        if(isset($_POST["deal_id"]))
        {
          $deal_id = $_POST["deal_id"];

        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }

        $comment = ($cobertura == "s") ? "[SIMULADOR] - Cliente residente em localidade com cobertura. Preenchido dados iniciais." : "[STORE] - Cliente residente em localidade sem cobertura. Manifestou interesse em deixar contato salvo.";
        //payload mount
        $prepareToSend = '{
                            "filter": {"ID": "'.$deal_id.'"},
                            "select": [ "ID","UF_CRM_1607005403" ]
                          }';
        $sendToBitrix = curl_bitrix_method("crm.deal.list",$prepareToSend);
        $sendToBitrix = json_decode($sendToBitrix,true);

        if(isset($sendToBitrix["result"]) and ($sendToBitrix["result"] != "" or !empty($sendToBitrix["result"])))
        {
          $consult_ds = $sendToBitrix["result"][0]["UF_CRM_1607005403"];
          header('Content-Type: application/json');
          echo json_encode(array("error" => "false", "consult_ds" => $consult_ds), true);
          exit;
        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Falha ao salvar dados."), true);
          exit;
        }
        exit;
        break;
      case "buscaPlanoDep":
        if(isset($_POST["plano_escolhido"]) and isset($_POST["idade"]) and $_POST["idade"] != ""){
          $catalog_id = null;
          $idade = $_POST["idade"];
          $plano = json_decode($_POST["plano_escolhido"],true);
          if($_POST["uf"] == "RN")
          {
            $catalog_id = "61";
            $cidade = "natal";

          }else if($_POST["uf"] == "PE"){
            $catalog_id = "57";
            $cidade = "recife";
          }

          $payload_alternativo = '{
            "order": {
                "NAME": "ASC"
            },
            "filter": {
                "PROPERTY_102": {
                    "value": "'.getCodIdade($idade).'"
                },
                "PROPERTY_100": {
                    "value": "'.$plano["PROPERTY_100"]["value"].'"
                },
                "PROPERTY_112": {
                    "value": "'.$plano["PROPERTY_112"]["value"].'"
                },
                "PROPERTY_104": {
                    "value": "'.$plano["PROPERTY_104"]["value"].'"
                },
                "PROPERTY_110": {
                    "value": "'.$plano["PROPERTY_110"]["value"].'"
                },
                "PROPERTY_114": {
                  "value": "202"
                }
            },
            "select": [
                "ID",
                "NAME",
                "PLANO",
                "PRICE",
                "SECTION_ID"
            ]
          }';

          // $payload = '{
          //   "order": {
          //     "NAME": "ASC"
          //   },
          //   "filter": {
          //     "NAME": {
          //       "value": "'.$_POST["nome_plano"].'"
          //     },
          //     "PROPERTY_370": {
          //       "value": "'.$_POST["uf"].'"
          //     },
          //     "PROPERTY_317": {
          //       "value": "'.getCodIdade($idade).'"
          //     },
          //     "CATALOG_ID": {
          //       "value": "'.$catalog_id.'"
          //     }
          //   },
          //   "select": [
          //     "NAME",
          //     "PRICE"
          //   ]
          // }';

          $getFromBitrix = curl_bitrix_method("crm.product.list",$payload_alternativo);
          $resultPlanos = json_decode($getFromBitrix,true);
          $resultPlanos = $resultPlanos["result"][0];

          // //teste//
          // header('Content-Type: application/json');
          // echo json_encode(array("error" => "true", "debug" => $resultPlanos), true);
          // exit;
          // //fim teste//
          header('Content-Type: application/json');
          echo json_encode(array("error" => "false", "plano" => $resultPlanos), true);
          exit;
        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        exit;
        break;
      case "buscaPlanoAdicional":
          if(isset($_POST["produto_adicional"])){
            log_api("Iniciando busca de planos adicionais");
            $payload_alternativo = '{
              "order": {
                  "NAME": "ASC"
              },
              "filter": {
                  "ID": {
                      "value": "599"
                  }
              },
              "select": [
                  "ID",
                  "NAME",
                  "PLANO",
                  "PRICE",
                  "SECTION_ID"
              ]
            }';
            log_api($payload_alternativo);

            $getFromBitrix = curl_bitrix_method("crm.product.list",$payload_alternativo);
            $resultPlanos = json_decode($getFromBitrix,true);
            $resultPlanos = $resultPlanos["result"][0];
            log_api(json_encode($resultPlanos));

            header('Content-Type: application/json');
            echo json_encode(array("error" => "false", "plano" => $resultPlanos), true);
            exit;
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
            exit;
          }
          exit;
          break;
        case "buscaEntidade":
          if(isset($_POST["payload"]))
          {
            $payload = json_decode($_POST["payload"],true);
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
            exit;
          }

          $prepareToSend = '{
            "order": {
              "NAME": "ASC"
            },
            "filter": {
              "NAME": {
                "value": "'.$profissao.'"
              },
              "SECTION_ID": {
                "value": "156"
              },
              "PROPERTY_370": {
                "value": "'.$uf.'"
              }
            },
            "select": [
              "ID",
              "NAME",
              "SECTION_ID",
              "PROPERTY_324",
              "PROPERTY_326",
              "PROPERTY_368"
            ]
          }';

          $getFromBitrix = curl_bitrix_method("crm.product.list",$prepareToSend);
          $resultPlanos = json_decode($getFromBitrix,true);
          $resultPlanos = $resultPlanos["result"];

          if(empty($resultPlanos))
          {
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
            exit;
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "false", "data" => $resultPlanos[0]), true);
            exit;
          }

          exit;
          break;
      case "buscaPlano":
        if(isset($_POST["id_plano"]) and $_POST["id_plano"] != ""){
          $id_plano = $_POST["id_plano"];
          $url = $endpoint."crm.product.get?id=".$id_plano;
          $buscaPlano = json_decode(curl_rest($url),true);
          $buscaPlano = $buscaPlano["result"];
          $nome_plano = $buscaPlano["NAME"];
          $preco_plano = $buscaPlano["PRICE"];
          $operadora = $buscaPlano["PROPERTY_322"]["value"];
          $imagem = ($operadora == 294) ? "assets/img/logo-unimed-natal.png" : "assets/img/logo-unimed-recife.png";

          header('Content-Type: application/json');
          echo json_encode(array("error" => "false", "nome_plano" => $nome_plano, "preco_plano" => "R$ ".number_format($preco_plano,2,",","."), "imagem" => $imagem, "operadora" => $operadora), true);
          exit;

        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        exit;
        break;
      case "buscaPlanos":
        $payload = null;
        $cidade = null;
        $props = json_decode(file_get_contents('property_fields.json'), true);
	      $props = $props["result"];
        $consultor_id = $_POST["resp_id"];
        if(isset($_POST["payload"]))
        {
          $infoCustomer = json_decode($_POST["payload"],true);

          $_operadoras_imgs = array();
          $templatesDocs = array();
          $operadoras_venda = array();
          $operadoras_venda_nome = array();

          //$buscaOperadoras = mysqli_query($conexao,"select * from operadoras where tipo_tabela = 'A'");
          $buscaOperadoras = mysqli_query($conexao,"select * from operadoras where id in (select id_operadora from consultor_permissao where id_consultor = $consultor_id and tipo_tabela = 'A')");
          //select * from operadoras where id in (select id_operadora from consultor_permissao where id_consultor = 3 and tipo_tabela = 'A')

          while($rsOpe=mysqli_fetch_array($buscaOperadoras))
          {
            $xmlid = $rsOpe["xml_id"];
            $valueid = $rsOpe["value_id"];
            $imgplan = $rsOpe["img"];
            $nomeOpe = $rsOpe["nome"];
            $docsId = json_decode($rsOpe["id_docs"],true);

            $_operadoras_imgs["$xmlid"] = $imgplan;
            $operadoras_venda_nome["$xmlid"] = $nomeOpe;
            $operadoras_venda[] = $xmlid;
            $templatesDocs["$xmlid"] = $docsId;
          }

          $payloadEntidadeAberta = '{
              "order": {
                  "PRICE": "DESC"
              },
              "filter": {
                  "PROPERTY_114": {
                      "value": "202"
                  },
                  "PROPERTY_118": {
                      "value": "'.$infoCustomer["UF_CRM_1582805357"].'"
                  },
                  "PROPERTY_124": {
                      "value": "222"
                  },
                  "PROPERTY_128": {
                      "value": "%'.$infoCustomer["UF_CRM_1578521646"].'%"
                  },
                  "PROPERTY_122": {
                      "value": "216"
                  }
              },
              "select": [
                  "ID",
                  "NAME",
                  "DESCRIPTION",
                  "PROPERTY_122",
                  "PROPERTY_110",
                  "PROPERTY_118",
                  "PROPERTY_128",
              ]
          }';

          $entidade_aberta = false;
          $resultEntidades = null;
          $entidades = array();
          if($infoCustomer["PROFISSAO"] === false)
          {
            $entidade_aberta = true;
            $getEntidadesFromBitrix = curl_bitrix_method("crm.product.list",$payloadEntidadeAberta);
            $resultEntidades = json_decode($getEntidadesFromBitrix,true);
            $resultEntidades = $resultEntidades["result"];

            if($resultEntidades === "")
            {
              $resultEntidades = false;
            }else{
              $old_operadoras_venda = $operadoras_venda;
              $operadoras_venda = [];
              foreach($resultEntidades as $entidade)
              {
                $tmp = array();
                $tmp["name"] = $entidade["NAME"];
                $tmp["desc"] = $entidade["DESCRIPTION"];
                $tmp["doc_id"] = $entidade["PROPERTY_417"]["value"];
                $tmp["entidade_id"] = $entidade["PROPERTY_419"]["value"];
                $operadorasVenda = getOperadoraId(intval($entidade["PROPERTY_322"]["value"]));
                $tmp["operadora"] = $operadorasVenda;
                array_push($entidades,$tmp);
                $operadoras_venda[] = $operadorasVenda;

              }

              $diffOperadorasVenda = array_diff($old_operadoras_venda,$operadoras_venda);

              foreach($diffOperadorasVenda as $k)
              {
                unset($operadoras_venda_nome["$k"]);
              }

            }

          }

          $filtro_entidade_aberta = "";

          if($entidade_aberta){
            $filtro_entidade_aberta = ',"PROPERTY_122": {
              "value": "216"
              }';
          }

          $payload = '{
            "order": {
              "NAME": "ASC"
            },
            "filter": {
              "PROPERTY_118": {
                "value": "'.$infoCustomer["UF_CRM_1582805357"].'"
              },
              "PROPERTY_114": {
                "value": "202"
              },
              "PROPERTY_102": {
                "value": "'.getCodIdade($infoCustomer["IDADE"]).'"
              },
              "PROPERTY_122": {
                "value": "216"
              }
            },
            "select": [
              "NAME",
              "PRICE",
              "PROPERTY_122",
              "PROPERTY_116",
              "PROPERTY_100",
              "PROPERTY_98",
              "PROPERTY_102",
              "PROPERTY_114",
              "PROPERTY_112",
              "PROPERTY_110",
              "PROPERTY_104",
              "PROPERTY_118",
              "PROPERTY_126",
              "PROPERTY_108",
              "PROPERTY_106",
              "PROPERTY_128"
            ]
          }';

          $getFromBitrix = curl_bitrix_method("crm.product.list",$payload);
          $_resultPlanos = json_decode($getFromBitrix,true);
          $resultPlanos = $_resultPlanos["result"];
          $acabou = false;
          while(!$acabou)
          {
            if(isset($_resultPlanos["next"]))
            {
              $next = ',"start":"'.$_resultPlanos["next"].'"';

              $payload = '{
                "order": {
                  "NAME": "ASC"
                },
                "filter": {
                  "PROPERTY_118": {
                    "value": "'.$infoCustomer["UF_CRM_1582805357"].'"
                  },
                  "PROPERTY_114": {
                    "value": "202"
                  },
                  "PROPERTY_102": {
                    "value": "'.getCodIdade($infoCustomer["IDADE"]).'"
                  },
                  "PROPERTY_122": {
                    "value": "216"
                  }
                },
                "select": [
                  "NAME",
                  "PRICE",
                  "PROPERTY_122",
                  "PROPERTY_116",
                  "PROPERTY_100",
                  "PROPERTY_98",
                  "PROPERTY_102",
                  "PROPERTY_114",
                  "PROPERTY_112",
                  "PROPERTY_110",
                  "PROPERTY_104",
                  "PROPERTY_118",
                  "PROPERTY_126",
                  "PROPERTY_108",
                  "PROPERTY_106",
                  "PROPERTY_128"
                ]
                '.$next.'
              }';

              $getFromBitrix = curl_bitrix_method("crm.product.list",$payload);
              $_resultPlanos = json_decode($getFromBitrix,true);
              foreach($_resultPlanos["result"] as $result){
                $resultPlanos[] = $result;
              }

              if(!isset($_resultPlanos["next"])){
                $acabou = true;
              }
            }else{
              $acabou = true;
            }
          }

          $payloadPropPlano = '{
            "order": {
                "SORT": "ASC"
            },
            "filter": {
                "NAME": "Plano",
                "ID": "112"
            }
          }';

          $getPropPlano = curl_bitrix_method("crm.product.property.list",$payloadPropPlano);
          $resultPropPlano = json_decode($getPropPlano,true);
          $resultPropPlano = $resultPropPlano["result"][0]["VALUES"];

          $payloadPropOperadora = '{
              "order": {
                  "SORT": "ASC"
              },
              "filter": {
                  "NAME": "Operadora",
                  "ID": "110"
              }
          }
          ';

          $getPropOperadora = curl_bitrix_method("crm.product.property.list",$payloadPropOperadora);
          $resultPropOperadora = json_decode($getPropOperadora,true);
          $resultPropOperadora = $resultPropOperadora["result"][0]["VALUES"];

          //montagem html planos
            //$html_planos = '<div class="container"><section class="customer-logos slider">';
            $html_planos = "";
            $line = 1;
            foreach ($resultPlanos as $plano) {

              $prop321 = intval($plano["PROPERTY_112"]["value"]);
              $prop322 = intval($plano["PROPERTY_110"]["value"]);
              $planoNome = $resultPropPlano[$prop321]["VALUE"];
              $nomedoplano = $plano["NAME"];
              $planoID = $resultPropPlano[$prop321]["XML_ID"];
              $operadoraID = $resultPropOperadora[$prop322]["XML_ID"];
              //$resultPropPlano[$plano["PROPERTY_321"]["value"]]["XML_ID"]

              $operadoras_entidade_aberta = ["2952","2954"];

              if(in_array($operadoraID, $operadoras_entidade_aberta))
              {
                if($plano["PROPERTY_108"][0]["value"] !== null and $plano["PROPERTY_108"][0]["value"] !== "")
                {
                  if(strpos(convertem($plano["PROPERTY_108"][0]["value"]), $infoCustomer["UF_CRM_1578511012"]) === false)
                  {
                    continue;
                  }
                }
              }

              $plano["planoID"] = $planoID;
              $plano["operadoraID"] = $operadoraID;
              $plano["NAME"] = $nomedoplano;
              $plano["imgSrc"] = $_operadoras_imgs["$operadoraID"];
              $plano["templates_docs"] = $templatesDocs["$operadoraID"];

              if (in_array($plano["operadoraID"], $operadoras_venda))
              {
                $html_planos .= '
                <div class="gallery_product col-lg-4 col-md-4 col-sm-6 col-xs-6 filter acomoda'.$plano["PROPERTY_100"]["value"].' copart'.$plano["PROPERTY_104"]["value"].' " data-order="'.$line.'" data-price="'.$plano["PRICE"].'" data-operadoraid="'.$operadoraID.'">
                <div class="container_plan">
                  <table class="borda_plano">

                    <tr style="background-color: #fff">
                        <td >
                          <div style="width: 60%;margin-left: 20%;">
                            <img style="padding:0 5px;" src="'.$plano["imgSrc"].'">
                          </div>
                        </td>
                    </tr>
                    <tr style="background-color: #fff">
                        <td>
                            <div style="width: 80%;margin-left: 10%">
                              <table style="width: 100%">
                                  <tr>
                                      <td class="texto3"><strong>'.$plano["NAME"].'</strong></td>
                                  </tr>
                                  <tr>
                                      <td class="texto3"><strong>ANS:</strong> '.$plano["PROPERTY_98"]["value"].'</td>
                                  </tr>
                              </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="borda_plano_inter">
                            <table class="borda_plano_inter2">
                                <tr>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td class="texto4">&nbsp;'.$props["PROPERTY_100"]["values"][$plano["PROPERTY_100"]["value"]]["VALUE"].'</td>
                                </tr>
                                <tr>
                                    <td class="texto4">&nbsp;'.$props["PROPERTY_104"]["values"][$plano["PROPERTY_104"]["value"]]["VALUE"].'</td>
                                </tr>
                                <tr>
                                    <td class="texto4">&nbsp;'.$props["PROPERTY_116"]["values"][$plano["PROPERTY_116"]["value"]]["VALUE"].'</td>
                                </tr>
                                <tr>
                                    <td class="texto4">&nbsp;Ambulatorial, Hospitalar</td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="texto2" colspan="2" ><strong>R$ '.number_format($plano["PRICE"],2,",",".").'</strong>
                    </tr>
                    <tr>
                        <td>
                        <input type="button" name="next" class="btn filter-button2 choosePlan" id="orcamento" value="ESCOLHER PLANO" data-plano=\''.json_encode($plano).'\' style="width: 80%;"><br><br>
                        </td>
                    </tr>

                  </table>
                  </div>
                </div>
                ';
                $line++;
              }
            }

            $html_planos .= '</section></div>';


          //fim montagem
          $retornaEntidades = ($entidade_aberta) ? $entidades : "false";
          header('Content-Type: application/json');
          echo json_encode(array("error" => "false", "operadoras_venda" => $operadoras_venda_nome, "entidades" => $retornaEntidades, "data" => $html_planos, "payloadUsed" => $payload), true);
          exit;

        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        break;
      case "now":
        $sql = mysqli_query($conexao,"select now() as 'data'");
        while($dados=mysqli_fetch_array($sql))
        {
          header('Content-Type: application/json');
          echo json_encode(array("error" => "false","data" => $dados["data"]), true);
          exit;
        }
        if(!$conexao){
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true","error_msg" => mysqli_connect_error()), true);
          exit;
        }
        break;
      case "getFichaAssociacao":
        if(isset($_POST["ficha_id"]) and isset($_POST["payload"]))
        {

          $id_ficha = $_POST["ficha_id"];
          $deal_id = $_POST["deal_id"];
          $payload = json_decode($_POST["payload"],true);

          $payloadPegaFicha = '{
            "id": "'.$id_ficha.'"
          }';

          $pegou_ficha = false;
          $url_pdf = false;
          $key_doc = false;
          $number_tries = 0;
          $erro_pega_ficha = false;
          while($pegou_ficha == false)
          {
            if($number_tries > 1){
              $erro_pega_ficha = true;
              break;
            }
            sleep(5);
            $pega_ficha = curl_bitrix_method("crm.documentgenerator.document.get", $payloadPegaFicha);
            $pega_ficha = json_decode($pega_ficha,true);

            if(isset($pega_ficha["result"]["document"]["downloadUrlMachine"])){
              $url_pdf = $pega_ficha["result"]["document"]["downloadUrlMachine"];
              $pegou_ficha = true;
            }
            $number_tries++;
          }

          if($pegou_ficha)
          {
            $payloadConvertePDF = '{
              "Parameters": [
                  {
                      "Name": "File",
                      "FileValue": {
                          "Url": "'.$url_pdf.'"
                      }
                  }
              ]
            }';

            $documentPDF = json_decode(curlConvertPdf($payloadConvertePDF),true);
            if(isset($documentPDF["Files"])){


              $b64Doc = $documentPDF["Files"][0]["FileData"];

              //salva contato
              $arrNome = explode(" ", $payload["NAME"]);
              $nome = strtoupper($arrNome[0]);
              unset($arrNome[0]);
              $ultimoNome = implode(" ", $arrNome);

              //chama clicksign
              $payloadClickSign = '{
                "document": {
                    "path": "/Ficha_Associativa_'.$id_ficha.'.pdf",
                    "content_base64": "data:application/pdf;base64,'.$b64Doc.'",
                    "deadline_at": "'.date("Y-m-d",strtotime(date("Y-m-d").' +2 days')).'T'.date("H:i:s").'-03:00",
                    "auto_close": true,
                    "locale": "pt-BR",
                    "signers": [
                        {
                            "email": "'.$payload["EMAIL"].'",
                            "sign_as": "sign",
                            "auths": [
                                "email"
                            ],
                            "name": "'.$nome.' '.$ultimoNome.'",
                            "has_documentation": true,
                            "send_email": true,
                            "message": "Olá, segue para assinatura eletrônica a sua Ficha Associativa. Ela tem o mesmo valor legal que a ficha convencional. Confirme os seus dados e por favor assine o documento para continuarmos com o processo de preenchimento da sua Proposta de Adesão."
                        }
                    ]
                }
              }';


              $sendToSign = json_decode(curlClickSign($payloadClickSign),true);

              if(isset($sendToSign["document"]["key"]))
              {
                $key_doc = $sendToSign["document"]["key"];
                unlink('ficha_'.$id_ficha.'.pdf');

                //update proposta
                $updProposta = mysqli_query($conexao,"update propostas set status = 'FICHA ASSOCIATIVA', keyid_ficha_associativa = '$key_doc' where deal_id = $deal_id");
                //fim update

                header('Content-Type: application/json');
                echo json_encode(array("error" => "false", "id_ficha" => $id_ficha, "key_doc" => $key_doc), true);
                exit;
              }else{
                header('Content-Type: application/json');
                echo json_encode(array("error" => "true", "debugPdf" => $documentPDF, "debugSign" => $sendToSign, "erro_msg" => "Falha no processo."), true);
                exit;
              }
            }else{
              header('Content-Type: application/json');
              echo json_encode(array("error" => "true", "erros" => $documentPDF , "erro_msg" => "Falha no processo."), true);
              exit;
            }
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "erro_msg" => "Falha no processo."), true);
            exit;
          }
        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        break;
      case "fichaAssociacao":
        $payload = null;
        if(isset($_POST["payload"]) and $_POST["payload"] != "" and $_POST["lead_id"] != "")
        {
          $payload = json_decode($_POST["payload"],true);
          $lead_id = $_POST["lead_id"];
          $deal_id = $_POST["deal_id"];
          $contact_id = $_POST["contact_id"];
          $anexo_profissao = $_POST["proofProfessionAttachment"];

          $mime = explode(";",$anexo_profissao);
          $base64f = explode(",",$mime[1]);
          $mime = explode("/", $mime[0]);
          $ext = $mime[1];

          $props = json_decode(file_get_contents('property_fields.json'), true);
	        $props = $props["result"];

          $payloadUpdContato = '{
              "id": "'.$contact_id.'",
              "fields": {
                  "UF_CRM_1583447214343": "'.$payload["UF_CRM_1583447214343"].'",
                  "UF_CRM_1583453003241": "'.$payload["UF_CRM_1583453003241"].'",
                  "UF_CRM_1583453318705": "'.$payload["UF_CRM_1583453318705"].'",
                  "UF_CRM_1583453300308": "'.$props["ESTADOS_ENT"][$payload["UF_CRM_1583453300308"]].'",
                  "UF_CRM_1583451688644": "'.$payload["UF_CRM_1583451688644"].'",
                  "UF_CRM_1583457490982": "'.$payload["UF_CRM_1578521646"].'",
                  "UF_CRM_1583451717890": "'.$payload["UF_CRM_1583451717890"].'"
              }
          }
          ';

          $payloadUpdDeal = '{
            "id": "'.$deal_id.'",
            "fields": {
                "UF_CRM_1595520154": {
                  "fileData": [
                      "Comprovante_Profissao.'.$ext.'",
                      "'.$base64f[1].'"
                  ]
                },
                "UF_CRM_1583411966": "'.$payload["UF_CRM_1583411966"].'",
                "UF_CRM_1591131187": "'.$payload["UF_CRM_1591131187"].'",
                "UF_CRM_1582823504": "'.$payload["UF_CRM_1582823504"].'",
                "UF_CRM_1582822611": "'.$payload["UF_CRM_1582822611"].'"
            }
          }
          ';

          $updDeal = curl_bitrix_method("crm.deal.update",$payloadUpdDeal);

          $updContato = curl_bitrix_method("crm.contact.update",$payloadUpdContato);
          $updContato = json_decode($updContato,true);

          //etapa ficha
          $avancaFicha = curl_rest($endpoint."crm.automation.trigger/?code=ssyq1&target=DEAL_".$deal_id);

          //cria documento
          $payloadDocFicha = '{
              "templateId": "'.$payload["COD_DOC_ENTIDADE"].'",
              "entityTypeId": "2",
              "entityId": "'.$deal_id.'"
          }';
          $create_ficha = curl_bitrix_method("crm.documentgenerator.document.add", $payloadDocFicha);
          $create_ficha = json_decode($create_ficha,true);

          $id_ficha = $create_ficha["result"]["document"]["id"];
          //$id_ficha = 4517;
          header('Content-Type: application/json');
          echo json_encode(array("error" => "false", "id_ficha" => $id_ficha), true);
          exit;

        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        exit;
        break;
      case "gravaDadosDep":
        if(isset($_POST["deal_id"]) and $_POST["deal_id"] != "" and $_POST["payload"] != "")
        {
          $dependentes = json_decode($_POST["payload"],true);
          $deal_id = $_POST["deal_id"];
          $fields = false;
          if(isset($dependentes[1])){
            $fields = '
              "UF_CRM_1605294467": "'.$dependentes[1]["NAME"].'",
              "UF_CRM_1605294521": "'.$dependentes[1]["CPF"].'",
              "UF_CRM_1605294481": "'.$dependentes[1]["data_nasc"].'",
              "UF_CRM_1605294505": "'.$dependentes[1]["SEXO"].'",
              "UF_CRM_1605294570": "'.$dependentes[1]["ESTCIVIL"].'",
              "UF_CRM_1605294593": "'.$dependentes[1]["GRAU"].'",
              "UF_CRM_1605294607": "'.$dependentes[1]["NOMMAE"].'",
              "UF_CRM_1605656844": "'.$dependentes[1]["MUNNASC"].'",
              "UF_CRM_1605294542": "'.$dependentes[1]["CARDSUS"].'",
              "UF_CRM_1605294532": "'.$dependentes[1]["NASCVIVO"].'"
            ';
          }

          if(isset($dependentes[2])){
            if($fields === false)
            {
              /*

              NOME COMPLETO	UF_CRM_1580132727
              CPF	UF_CRM_1580132713
              DATA NASCIMENTO	UF_CRM_1580133197
              SEXO	UF_CRM_1580133501
              ESTADO CIVIL	UF_CRM_1580133161
              GRAU PARENTESCO	UF_CRM_1580133581
              NOME DA MAE	UF_CRM_1580133594
              MUNICIPIO NASCIMENTO	UF_CRM_1580133695
              CARTAO DO SUS	UF_CRM_1580133074
              DECLARACAO DE NASCIDO VIVO	UF_CRM_1580133086


              */

              $fields = '
                "UF_CRM_1605294621": "'.$dependentes[2]["NAME"].'",
                "UF_CRM_1605294716": "'.$dependentes[2]["CPF"].'",
                "UF_CRM_1605294634": "'.$dependentes[2]["data_nasc"].'",
                "UF_CRM_1605294700": "'.$dependentes[2]["SEXO"].'",
                "UF_CRM_1605294795": "'.$dependentes[2]["ESTCIVIL"].'",
                "UF_CRM_1605294822": "'.$dependentes[2]["GRAU"].'",
                "UF_CRM_1605294834": "'.$dependentes[2]["NOMMAE"].'",
                "UF_CRM_1605656857": "'.$dependentes[2]["MUNNASC"].'",
                "UF_CRM_1605294756": "'.$dependentes[2]["CARDSUS"].'",
                "UF_CRM_1605294728": "'.$dependentes[2]["NASCVIVO"].'"
              ';
            }else{
              $fields .= '
              ,"UF_CRM_1605294621": "'.$dependentes[2]["NAME"].'",
              "UF_CRM_1605294716": "'.$dependentes[2]["CPF"].'",
              "UF_CRM_1605294634": "'.$dependentes[2]["data_nasc"].'",
              "UF_CRM_1605294700": "'.$dependentes[2]["SEXO"].'",
              "UF_CRM_1605294795": "'.$dependentes[2]["ESTCIVIL"].'",
              "UF_CRM_1605294822": "'.$dependentes[2]["GRAU"].'",
              "UF_CRM_1605294834": "'.$dependentes[2]["NOMMAE"].'",
              "UF_CRM_1605656857": "'.$dependentes[2]["MUNNASC"].'",
              "UF_CRM_1605294756": "'.$dependentes[2]["CARDSUS"].'",
              "UF_CRM_1605294728": "'.$dependentes[2]["NASCVIVO"].'"
              ';
            }
          }

          if(isset($dependentes[3])){
            if($fields === false)
            {
              /*

              NOME COMPLETO	UF_CRM_1580133726
              CPF	UF_CRM_1580133710
              DATA NASCIMENTO	UF_CRM_1580134210
              SEXO	UF_CRM_1580134252
              ESTADO CIVIL	UF_CRM_1580133813
              GRAU PARENTESCO	UF_CRM_1580134323
              NOME DA MAE	UF_CRM_1580134533
              MUNICIPIO NASCIMENTO	UF_CRM_1580134576
              CARTAO DO SUS	UF_CRM_1580133751
              DECLARACAO DE NASCIDO VIVO	UF_CRM_1580133764

              */

              $fields = '
                "UF_CRM_1605294845": "'.$dependentes[3]["NAME"].'",
                "UF_CRM_1605294984": "'.$dependentes[3]["CPF"].'",
                "UF_CRM_1605294934": "'.$dependentes[3]["data_nasc"].'",
                "UF_CRM_1605294973": "'.$dependentes[3]["SEXO"].'",
                "UF_CRM_1605295055": "'.$dependentes[3]["ESTCIVIL"].'",
                "UF_CRM_1605295093": "'.$dependentes[3]["GRAU"].'",
                "UF_CRM_1605295106": "'.$dependentes[3]["NOMMAE"].'",
                "UF_CRM_1605656878": "'.$dependentes[3]["MUNNASC"].'",
                "UF_CRM_1605295004": "'.$dependentes[3]["CARDSUS"].'",
                "UF_CRM_1605294994": "'.$dependentes[3]["NASCVIVO"].'"
              ';
            }else{
              $fields .= '
              ,"UF_CRM_1605294845": "'.$dependentes[3]["NAME"].'",
              "UF_CRM_1605294984": "'.$dependentes[3]["CPF"].'",
              "UF_CRM_1605294934": "'.$dependentes[3]["data_nasc"].'",
              "UF_CRM_1605294973": "'.$dependentes[3]["SEXO"].'",
              "UF_CRM_1605295055": "'.$dependentes[3]["ESTCIVIL"].'",
              "UF_CRM_1605295093": "'.$dependentes[3]["GRAU"].'",
              "UF_CRM_1605295106": "'.$dependentes[3]["NOMMAE"].'",
              "UF_CRM_1605656878": "'.$dependentes[3]["MUNNASC"].'",
              "UF_CRM_1605295004": "'.$dependentes[3]["CARDSUS"].'",
              "UF_CRM_1605294994": "'.$dependentes[3]["NASCVIVO"].'"
              ';
            }
          }

          if(isset($dependentes[4])){
            if($fields === false)
            {
              /*

              NOME COMPLETO	UF_CRM_1580134616
              CPF	UF_CRM_1580134595
              DATA NASCIMENTO	UF_CRM_1580135094
              SEXO	UF_CRM_1580135122
              ESTADO CIVIL	UF_CRM_1580135074
              GRAU PARENTESCO	UF_CRM_1580135174
              NOME DA MAE	UF_CRM_1580135191
              MUNICIPIO NASCIMENTO	UF_CRM_1580135288
              CARTAO DO SUS	UF_CRM_1580134651
              DECLARACAO DE NASCIDO VIVO	UF_CRM_1580135026

              */

              $fields = '
                "UF_CRM_1605295119": "'.$dependentes[4]["NAME"].'",
                "UF_CRM_1605295167": "'.$dependentes[4]["CPF"].'",
                "UF_CRM_1605295133": "'.$dependentes[4]["data_nasc"].'",
                "UF_CRM_1605295154": "'.$dependentes[4]["SEXO"].'",
                "UF_CRM_1605295212": "'.$dependentes[4]["ESTCIVIL"].'",
                "UF_CRM_1605295241": "'.$dependentes[4]["GRAU"].'",
                "UF_CRM_1605295258": "'.$dependentes[4]["NOMMAE"].'",
                "UF_CRM_1605656891": "'.$dependentes[4]["MUNNASC"].'",
                "UF_CRM_1605295189": "'.$dependentes[4]["CARDSUS"].'",
                "UF_CRM_1605295178": "'.$dependentes[4]["NASCVIVO"].'"
              ';
            }else{
              $fields .= '
              ,"UF_CRM_1605295119": "'.$dependentes[4]["NAME"].'",
              "UF_CRM_1605295167": "'.$dependentes[4]["CPF"].'",
              "UF_CRM_1605295133": "'.$dependentes[4]["data_nasc"].'",
              "UF_CRM_1605295154": "'.$dependentes[4]["SEXO"].'",
              "UF_CRM_1605295212": "'.$dependentes[4]["ESTCIVIL"].'",
              "UF_CRM_1605295241": "'.$dependentes[4]["GRAU"].'",
              "UF_CRM_1605295258": "'.$dependentes[4]["NOMMAE"].'",
              "UF_CRM_1605656891": "'.$dependentes[4]["MUNNASC"].'",
              "UF_CRM_1605295189": "'.$dependentes[4]["CARDSUS"].'",
              "UF_CRM_1605295178": "'.$dependentes[4]["NASCVIVO"].'"
              ';
            }
          }

          if(isset($dependentes[5])){
            if($fields === false)
            {
              /*

              NOME COMPLETO	UF_CRM_1580135345
              CPF	UF_CRM_1580135330
              DATA NASCIMENTO	UF_CRM_1580135444
              SEXO	UF_CRM_1580135608
              ESTADO CIVIL	UF_CRM_1580135427
              GRAU PARENTESCO	UF_CRM_1580135667
              NOME DA MAE	UF_CRM_1580135812
              MUNICIPIO NASCIMENTO	UF_CRM_1580135834
              CARTAO DO SUS	UF_CRM_1580135370
              DECLARACAO DE NASCIDO VIVO	UF_CRM_1580135381

              */

              $fields = '
                "UF_CRM_1605295269": "'.$dependentes[5]["NAME"].'",
                "UF_CRM_1605295320": "'.$dependentes[5]["CPF"].'",
                "UF_CRM_1605295282": "'.$dependentes[5]["data_nasc"].'",
                "UF_CRM_1605295303": "'.$dependentes[5]["SEXO"].'",
                "UF_CRM_1605295366": "'.$dependentes[5]["ESTCIVIL"].'",
                "UF_CRM_1605295400": "'.$dependentes[5]["GRAU"].'",
                "UF_CRM_1605295412": "'.$dependentes[5]["NOMMAE"].'",
                "UF_CRM_1605656904": "'.$dependentes[5]["MUNNASC"].'",
                "UF_CRM_1605295340": "'.$dependentes[5]["CARDSUS"].'",
                "UF_CRM_1605295331": "'.$dependentes[5]["NASCVIVO"].'"
              ';
            }else{
              $fields .= '
              ,"UF_CRM_1605295269": "'.$dependentes[5]["NAME"].'",
              "UF_CRM_1605295320": "'.$dependentes[5]["CPF"].'",
              "UF_CRM_1605295282": "'.$dependentes[5]["data_nasc"].'",
              "UF_CRM_1605295303": "'.$dependentes[5]["SEXO"].'",
              "UF_CRM_1605295366": "'.$dependentes[5]["ESTCIVIL"].'",
              "UF_CRM_1605295400": "'.$dependentes[5]["GRAU"].'",
              "UF_CRM_1605295412": "'.$dependentes[5]["NOMMAE"].'",
              "UF_CRM_1605656904": "'.$dependentes[5]["MUNNASC"].'",
              "UF_CRM_1605295340": "'.$dependentes[5]["CARDSUS"].'",
              "UF_CRM_1605295331": "'.$dependentes[5]["NASCVIVO"].'"
              ';
            }
          }

          $payloadUpdDeal = '{
            "id": "'.$deal_id.'",
            "fields": {
                '.$fields.'
            }
          }';

          $updDeal = json_decode(curl_bitrix_method("crm.deal.update",$payloadUpdDeal),true);

          if(isset($updDeal["result"]) and $updDeal["result"] === true)
          {
            //trigger to info dep
            $avancaFormDeps = curl_rest($endpoint."crm.automation.trigger/?code=3htg8&target=DEAL_".$deal_id);

            header('Content-Type: application/json');
            echo json_encode(array("error" => "false"), true);
            exit;
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "erro_msg" => $updDeal), true);
            exit;
          }
        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        exit;
        break;
      case "baixaRascunho":
        if(isset($_POST["rascunho_id"]) and $_POST["rascunho_id"] != "")
        {
          $id_rascunho = $_POST["rascunho_id"];

          $payloadPegaRascunho = '{
            "id": "'.$id_rascunho.'"
          }';

          $pegou_rascunho = false;
          $url_pdf = false;
          $number_tries = 0;
          $erro_pega_rascunho = false;
          $arrerro = array();

          $pega_rascunho = curl_bitrix_method("crm.documentgenerator.document.get", $payloadPegaRascunho);
          $pega_rascunho = json_decode($pega_rascunho,true);

          if(isset($pega_rascunho["result"]["document"]["downloadUrlMachine"])){
            $url_pdf = $pega_rascunho["result"]["document"]["downloadUrlMachine"];
            $pegou_rascunho = true;
          }


          if($pegou_rascunho){

            $payloadConvertePDF = '{
              "Parameters": [
                  {
                      "Name": "File",
                      "FileValue": {
                          "Url": "'.$url_pdf.'"
                      }
                  }
              ]
            }';

            $documentPDF = json_decode(curlConvertPdf($payloadConvertePDF),true);
            if(isset($documentPDF["Files"])){

              $ifp = fopen( "proposta_rascunho_".$id_rascunho.'.pdf', 'wb' );
              // we could add validation here with ensuring count( $data ) > 1
              fwrite( $ifp, base64_decode( $documentPDF["Files"][0]["FileData"] ) );

              // clean up the file resource
              fclose( $ifp );

              header('Content-Type: application/json');
              echo json_encode(array("error" => "false", "rascunho_id" => $id_rascunho), true);
              exit;
            }else{
              header('Content-Type: application/json');
              echo json_encode(array("error" => "true", "erro_msg" => "Falha no processo.", "errorTrace" => $documentPDF), true);
              exit;
            }
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "erro_msg" => "Falha no processo."), true);
            exit;
          }
        }
        break;
        case "baixaProposta":
          if(isset($_POST["proposta_id"]) and $_POST["proposta_id"] != "")
          {
            $id_proposta = $_POST["proposta_id"];
            $payload = json_decode($_POST["payload"],true);

            $payloadPegaProposta = '{
              "id": "'.$id_proposta.'"
            }';

            $pegou_proposta = false;
            $url_pdf = false;
            $number_tries = 0;
            $erro_pega_proposta = false;
            $arrerro = array();

            $pega_proposta = curl_bitrix_method("crm.documentgenerator.document.get", $payloadPegaProposta);
            $pega_proposta = json_decode($pega_proposta,true);

            if(isset($pega_proposta["result"]["document"]["downloadUrlMachine"])){
              $url_pdf = $pega_proposta["result"]["document"]["downloadUrlMachine"];
              $pegou_proposta = true;
            }


            if($pegou_proposta){

              $payloadConvertePDF = '{
                "Parameters": [
                    {
                        "Name": "File",
                        "FileValue": {
                            "Url": "'.$url_pdf.'"
                        }
                    }
                ]
              }';

              $documentPDF = json_decode(curlConvertPdf($payloadConvertePDF),true);
              if(isset($documentPDF["Files"])){

                $ifp = fopen( "proposta_final_".$id_proposta.'.pdf', 'wb' );
                // we could add validation here with ensuring count( $data ) > 1
                fwrite( $ifp, base64_decode( $documentPDF["Files"][0]["FileData"] ) );

                // clean up the file resource
                fclose( $ifp );

                $file = file('proposta_final_'.$id_proposta.'.pdf');
                $endfile= trim($file[count($file) - 1]);
                $n="%%EOF";
                if ($endfile === $n) {
                  $b64Doc = base64_encode(file_get_contents('proposta_final_'.$id_proposta.'.pdf'));

                  $arrNome = explode(" ", $payload["NAME"]);
                  $nome = strtoupper($arrNome[0]);
                  unset($arrNome[0]);
                  $ultimoNome = implode(" ", $arrNome);

                  //chama clicksign
                  $payloadClickSign = '{
                    "document": {
                        "path": "/Proposta_final_'.$id_proposta.'.pdf",
                        "content_base64": "data:application/pdf;base64,'.$b64Doc.'",
                        "deadline_at": "'.date("Y-m-d",strtotime(date("Y-m-d").' +2 days')).'T'.date("H:i:s").'-03:00",
                        "auto_close": true,
                        "locale": "pt-BR",
                        "signers": [
                            {
                                "email": "'.$payload["EMAIL"].'",
                                "sign_as": "sign",
                                "auths": [
                                    "email"
                                ],
                                "name": "'.$nome.' '.$ultimoNome.'",
                                "has_documentation": true,
                                "send_email": true,
                                "message": "Olá, segue para assinatura eletrônica o seu contrato. Ela tem o mesmo valor legal que a proposta convencional. Confirme os seus dados e por favor assine o documento para continuarmos com o processo de implantação da sua Proposta de Adesão."
                            }
                        ]
                    }
                  }';


                  $sendToSign = json_decode(curlClickSign($payloadClickSign),true);
                  $key_doc = false;
                  if(isset($sendToSign["document"]["key"]))
                  {
                    $key_doc = $sendToSign["document"]["key"];
                    $updProposta = mysqli_query($conexao,"update propostas set keyid_proposta = '$key_doc', status = 'PROPOSTA GERADA' where deal_id = ".$_POST["deal_id"]);
                  }

                  header('Content-Type: application/json');
                  echo json_encode(array("error" => "false", "key_id_proposta" => $key_doc, "proposta_id" => $id_proposta), true);
                  exit;
                } else {
                  unlink('proposta_rascunho_'.$id_rascunho.'.pdf');
                  header('Content-Type: application/json');
                  echo json_encode(array("error" => "true","erro_msg" => "Falha no processo."), true);
                  exit;
                }
              }else{
                header('Content-Type: application/json');
                echo json_encode(array("error" => "true", "erro_msg" => "Falha no processo.", "errorTrace" => $documentPDF), true);
                exit;
              }
            }else{
              header('Content-Type: application/json');
              echo json_encode(array("error" => "true", "erro_msg" => "Falha no processo."), true);
              exit;
            }
          }
          break;
      case "geraRascunho":
        if(isset($_POST["deal_id"]) and $_POST["deal_id"] != "")
        {
          $deal_id = $_POST["deal_id"];
          $template = $_POST["template"];

          $payloadDocRascunho = '{
              "templateId": "'.$template.'",
              "entityTypeId": "2",
              "entityId": "'.$deal_id.'"
          }';
          $create_rascunho = curl_bitrix_method("crm.documentgenerator.document.add", $payloadDocRascunho);
          $create_rascunho = json_decode($create_rascunho,true);

          $id_rascunho = $create_rascunho["result"]["document"]["id"];

          if($id_rascunho === null)
          {
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "error_msg" => $create_rascunho), true);
            exit;
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "false", "rascunho_id" => $id_rascunho), true);
            exit;
          }

        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        exit;
        break;
      case "geraProposta":
        if(isset($_POST["deal_id"]) and $_POST["deal_id"] != "")
        {
          $deal_id = $_POST["deal_id"];
          $template = $_POST["template"];

          $avancaPropostaFinal = curl_rest($endpoint."crm.automation.trigger/?code=vwqsz&target=DEAL_".$deal_id);

          $payloadDocProposta = '{
              "templateId": "'.$template.'",
              "entityTypeId": "2",
              "entityId": "'.$deal_id.'"
          }';
          $create_proposta = curl_bitrix_method("crm.documentgenerator.document.add", $payloadDocProposta);
          $create_proposta = json_decode($create_proposta,true);

          $id_proposta = $create_proposta["result"]["document"]["id"];

          header('Content-Type: application/json');
          echo json_encode(array("error" => "false", "proposta_id" => $id_proposta), true);
          exit;

        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        exit;
        break;
      case "geraPropostaAdicional":
        if(isset($_POST["deal_id"]) and $_POST["deal_id"] != "")
        {
          $deal_id = $_POST["deal_id"];
          $template = $_POST["template"];

          $payloadDocProposta = '{
              "templateId": "'.$template.'",
              "entityTypeId": "2",
              "entityId": "'.$deal_id.'"
          }';
          $create_proposta = curl_bitrix_method("crm.documentgenerator.document.add", $payloadDocProposta);
          $create_proposta = json_decode($create_proposta,true);

          $id_proposta = $create_proposta["result"]["document"]["id"];

          header('Content-Type: application/json');
          echo json_encode(array("error" => "false", "proposta_id" => $id_proposta), true);
          exit;

        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        exit;
        break;

      case "uploadAnexos":
        if(isset($_POST["deal_id"]) and $_POST["deal_id"] != "")
        {
          $deal_id = $_POST["deal_id"];
          $qtDep = $_POST["qtDep"];

          //foreach files
          $fields = false;
          foreach ($_FILES as $key => $error) {
            if(!$fields)
            {
              $fields .= '"'.$key.'": {
                "fileData": [
                    "'.$_FILES[$key]["name"].'",
                    "'.base64_encode(file_get_contents($_FILES[$key]["tmp_name"])).'"
                ]
              }';
            }else{
              $fields .= ',"'.$key.'": {
                "fileData": [
                    "'.$_FILES[$key]["name"].'",
                    "'.base64_encode(file_get_contents($_FILES[$key]["tmp_name"])).'"
                ]
              }';
            }
          }
          //fim foreach

          $payloadUpdDeal = '{
            "id": "'.$deal_id.'",
            "fields": {
                '.$fields.'
            }
          }';

          $updDeal = json_decode(curl_bitrix_method("crm.deal.update",$payloadUpdDeal),true);

          if(isset($updDeal["result"]) and $updDeal["result"] === true)
          {
            header('Content-Type: application/json');
            echo json_encode(array("error" => "false", "debug" => "deu certo"), true);
            exit;
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "erro_msg" => "Falha no envio."), true);
            exit;
          }
        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        exit;
        break;
      case "uploadFicha":
        if(isset($_POST["deal_id"]) and $_POST["deal_id"] != "" and $_POST["proofEntityAttachment"] != "")
        {
          $deal_id = $_POST["deal_id"];
          $anexo_entidade = $_POST["proofEntityAttachment"];
          $payload = json_decode($_POST["payload"],true);

          $mime = explode(";",$anexo_entidade);
          $base64f = explode(",",$mime[1]);
          $mime = explode("/", $mime[0]);
          $ext = $mime[1];

          $payloadUpdDeal = '{
            "id": "'.$deal_id.'",
            "fields": {
                "UF_CRM_1580498362": {
                  "fileData": [
                      "Vinculo_Entidade.'.$ext.'",
                      "'.$base64f[1].'"
                  ]
                },
                "UF_CRM_1583411966": "'.$payload["UF_CRM_1583411966"].'",
                "UF_CRM_1591131187": "'.$payload["UF_CRM_1591131187"].'",
                "UF_CRM_1582823504": "'.$payload["UF_CRM_1582823504"].'"
            }
          }';

          $updDeal = json_decode(curl_bitrix_method("crm.deal.update",$payloadUpdDeal),true);
          $avancaFicha = curl_rest($endpoint."crm.automation.trigger/?code=ssyq1&target=DEAL_".$deal_id);

          if(isset($updDeal["result"]) and $updDeal["result"] === true)
          {
            //trigger to info dep
            $avancaFormDeps = curl_rest($endpoint."crm.automation.trigger/?code=nlmd1&target=DEAL_".$deal_id);

            header('Content-Type: application/json');
            echo json_encode(array("error" => "false"), true);
            exit;
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "erro_msg" => $updDeal), true);
            exit;
          }

        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        break;
      case "checkUserExists":
        if(isset($_POST["cpf"]))
        {
          $cpf = $_POST["cpf"];
          $buscaConta = mysqli_query($conexao,"select * from clientes where cpf = '$cpf'");

          header('Content-Type: application/json');
          echo json_encode(array("error" => "false", "hasAccount" => mysqli_num_rows($buscaConta)), true);
          exit;
        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }
        break;
      case "converteLead":
        $payload = null;
        if(isset($_POST["payload"]) and $_POST["payload"] != "" and $_POST["lead_id"] != "")
        {
          $payload = json_decode($_POST["payload"],true);
          $plano_escolhido = $payload["PLANO_ESCOLHIDO"];
          $plano_adicional = $payload["PLANO_ADICIONAL"];
          $lead_id = $_POST["lead_id"];

        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
          exit;
        }

        //converte lead
        $converte_lead = curl_rest($endpoint."crm.automation.trigger/?code=ydxr2&target=LEAD_".$lead_id);

        //pega deal gerada
        $payloadPegaDeal = '{
            "order": {
                "ID": "DSC"
            },
            "filter": {
                "LEAD_ID": "'.$lead_id.'"
            },
            "select": [
                "ID"
            ]
        }';

        $pegaDeal = curl_bitrix_method("crm.deal.list",$payloadPegaDeal);
        $pegaDeal = json_decode($pegaDeal,true);
        $deal_id = $pegaDeal["result"][0]["ID"];
        //fim pega deal

        //salva contato
        $arrNome = explode(" ", $payload["NAME"]);
        $nome = strtoupper($arrNome[0]);
        unset($arrNome[0]);
        $ultimoNome = implode(" ", $arrNome);

        $props = json_decode(file_get_contents('property_fields.json'), true);
        $props = $props["result"];

        //quebra tel
        $t = str_replace("(","",$payload["PHONE"]);
        $t = str_replace(")","",$t);
        $t = str_replace(" ","",$t);
        $t = str_replace("-","",$t);

        $t1 = substr($t,0,2);
        $t2 = substr($t,2);

        $payloadContato = '{
            "fields": {
                "NAME": "'.$nome.'",
                "LAST_NAME": "'.strtoupper($ultimoNome).'",
                "UF_CRM_1604086939": "'.$payload["NOMECOMPLETO"].'",
                "UF_CRM_1606223823": "'.$payload["IDADE"].'",
                "UF_CRM_1604086966": "'.$payload["UF_CRM_1578521646"].'",
                "UF_CRM_1605642985": "'.$payload["UF_CRM_1578521856"].'",
                "UF_CRM_1605643041": "'.$payload["UF_CRM_1578510751"].'",
                "UF_CRM_1605643055": "'.$payload["UF_CRM_1578510781"].'",
                "UF_CRM_1605643095": "'.$payload["UF_CRM_1578510989"].'",
                "UF_CRM_1605643112": "'.$payload["UF_CRM_1578511012"].'",
                "UF_CRM_1605643397": "'.$props["ESTADOS"][$payload["UF_CRM_1582805357"]].'",
                "UF_CRM_1604086919": "'.$payload["UF_CRM_1578521601"].'",
                "UF_CRM_1606224351": "'.$payload["UF_CRM_1583444098092"].'",
                "UF_CRM_1604086966": "'.strtoupper($payload["UF_CRM_1578521646"]).'",
                "UF_CRM_1605277554": "'.$payload["UF_CRM_1578521815"].'",
                "UF_CRM_1605643009": "'.$payload["UF_CRM_1578521887"].'",
                "UF_CRM_1604087238": "'.strtoupper($payload["UF_CRM_1578521726"]).'",
                "UF_CRM_1605643068": "'.$payload["UF_CRM_1578510927"].'",
                "UF_CRM_1605643081": "'.$payload["UF_CRM_1578510945"].'",
                "UF_CRM_1606224606": "'.$payload["UF_CRM_1578521943"].'",
                "UF_CRM_1605643453": "'.$t1.'",
                "UF_CRM_1605643469": "'.$t2.'",
                "UF_CRM_1604086988": "'.$payload["UF_CRM_1583766955763"].'",
                "PHONE": [
                    {
                        "VALUE": "'.$payload["PHONE"].'",
                        "VALUE_TYPE": "WORK"
                    }
                ],
                "EMAIL": [
                    {
                        "VALUE": "'.$payload["EMAIL"].'",
                        "VALUE_TYPE": "WORK"
                    }
                ],
                "OPENED": "Y",
                "TYPE_ID": "CLIENT",
                "ASSIGNED_BY_ID": "'.$payload["CODIGO"].'"
            }
        }';

        $criaContato = curl_bitrix_method("crm.contact.add",$payloadContato);
        $criaContato = json_decode($criaContato,true);

        if(isset($criaContato["result"]) and ($criaContato["result"] != "" or !empty($criaContato["result"])))
        {
          $contact_id = $criaContato["result"];

          //cria deal
          $payloadDeal = '{
              "id": "'.$deal_id.'",
              "fields": {
                  "TITLE": "'.$payload["NAME"].'",
                  "COMMENTS": "Criado via Simulador",
                  "CONTACT_ID": "'.$contact_id.'",
                  "ASSIGNED_BY_ID": "'.$payload["CODIGO"].'",
                  "LEAD_ID": "'.$lead_id.'",
                  "TYPE_ID": "SALE",
                  "CATEGORY_ID": "'.$payload["OPERACAO"].'",
                  "SOURCE_ID": "STORE",
                  "UF_CRM_1605895352": "'.$plano_escolhido["planoID"].'",
                  "UF_CRM_1606228393": "'.$payload["UF_CRM_1580318169"].'",
                  "UF_CRM_1605648876": "'.$payload["IDADE"].'",
                  "UF_CRM_1606065359": "'.$payload["UF_CRM_1606065359"].'",
                  "UF_CRM_1605900952": "'.$plano_escolhido["operadoraID"].'",
                  "UF_CRM_1605659783": "'.$payload["UF_CRM_1581529436"].'",
                  "UF_CRM_1605659810": "'.$payload["UF_CRM_1581529045"].'",
                  "UF_CRM_1605659891": "'.$payload["UF_CRM_1581529498"].'",
                  "UF_CRM_1605660284": "'.$payload["UF_CRM_1581529934"].'",
                  "UF_CRM_1605660532": "'.$payload["UF_CRM_1581530003"].'",
                  "UF_CRM_1605660548": "'.$payload["UF_CRM_1581530045"].'",
                  "UF_CRM_1605660560": "'.$payload["UF_CRM_1581530083"].'",
                  "UF_CRM_1605660597": "'.$payload["UF_CRM_1581530136"].'",
                  "UF_CRM_1605659844": "'.$payload["UF_CRM_1581529316"].'",
                  "UF_CRM_1605659864": "'.$payload["UF_CRM_1581529333"].'",
                  "UF_CRM_1606339072": "'.$payload["qntdDep"].'",
                  "UF_CRM_1605297018": "'.$payload["nomeVendedor"].'",
                  "UF_CRM_1605297034": "'.$payload["cpfVendedor"].'",
                  "UF_CRM_1626615067": "'.$payload["produtoAdicionado"].'",
                  "UF_CRM_1626615111": "'.$payload["PLANO_ADICIONAL"]["NAME"].'"
              }
          }';

          log_api("PAYLOAD DE INCLUSÃO DO NEGÓCIO");
          log_api($payloadDeal);

          $updDeal = curl_bitrix_method("crm.deal.update",$payloadDeal);
          $updDeal = json_decode($updDeal,true);

          if(isset($updDeal["result"]))
          {
            //add produtos dependente se tiver
            $payloadProdDep = "";
            if($payload["UF_CRM_1580318169"] == "1")
            {
              foreach ($payload["dependentes"] as $dep) {
                //add produto
                $payloadProdDep .= '
                  ,{
                      "PRODUCT_ID": "'.$dep["id_plano"].'",
                      "PRICE": "'.$dep["price_plano"].'",
                      "QUANTITY": 1
                  }
                ';
              }
            }

            if(isset($plano_adicional) || $plano_adicional !== "")
            {

                //add produto
                $payloadProdAdicional .= '
                  ,{
                      "PRODUCT_ID": "'.$plano_adicional["ID"].'",
                      "PRICE": "'.$plano_adicional["PRICE"].'",
                      "QUANTITY": 1
                  }
                ';

            }

            //add produto
            $payloadAddProd = '{
                "ID": "'.$deal_id.'",
                "rows": [
                    {
                        "PRODUCT_ID": "'.$plano_escolhido["ID"].'",
                        "PRICE": "'.$plano_escolhido["PRICE"].'",
                        "QUANTITY": 1
                    }'.$payloadProdDep.'
                ]
            }
            ';
            log_api($payloadAddProd);

            $addProd = curl_bitrix_method("crm.deal.productrows.set",$payloadAddProd);

            /*** Cria conta no banco ou pega conta existente ***/
            $dataNow = date("Y-m-d H:i:s");

            $buscaConta = mysqli_query($conexao,"select id from clientes where cpf = '".$payload["UF_CRM_1578521601"]."'");
            if(mysqli_num_rows($buscaConta) > 0)
            {
              $rsUser = mysqli_fetch_array($buscaConta);
              $user_id = $rsUser["id"];
            }else{
              $insertUser = "insert into clientes VALUES (null,'".$payload["NAME"]."','".$payload["EMAIL"]."','".$payload["UF_CRM_1578521856"]."','".$payload["UF_CRM_1578521601"]."','".md5($payload["password"])."',null,'".$dataNow."',null,null)";
              $runSqlUser = mysqli_query($conexao,$insertUser);
              $user_id = mysqli_insert_id($conexao);
            }
            log_api("Inserindo dados da proposta na base");
            log_api("Carregar payload");
            log_api($deal_id);
            log_api(serialize($payload));

            $insertProposta = "insert into propostas VALUES (".$deal_id.",".$user_id.",'".serialize($payload)."',null,null,null,'".$dataNow."',null,".$payload["CODIGO"].")";
            $runSqlProposta = mysqli_query($conexao,$insertProposta);
            log_api($insertProposta);
            log_api("Resultado insert");
            log_api($runSqlProposta);
            /***   fim cria conta   ***/

            header('Content-Type: application/json');
            echo json_encode(array("error" => "false", "deal_id" => $deal_id, "contact_id" => $contact_id, "client_id" => $user_id, "resultado" => $runSqlUser), true);
            exit;
          }else{
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "debug" => $updDeal, "deal_id" => $deal_id, "erro_msg" => "Falha ao salvar dados [UPD_DEAL]."), true);
            exit;
          }
        }else{
          header('Content-Type: application/json');
          echo json_encode(array("error" => "true", "erro_msg" => "Falha ao salvar dados [CRIA_CONTACT]."), true);
          exit;
        }

        exit;
        break;
    }
  }else{
    header('Content-Type: application/json');
    echo json_encode(array("error" => "true", "erro_msg" => "Parametros incorretos."), true);
    exit;
  }

  function curl_rest($url){
		//  Initiate curl
		$ch = curl_init();
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);
		// Execute
		$result=curl_exec($ch);
		// Closing
		curl_close($ch);
		//return
		return $result;
  }

  function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
    require_once("class.phpmailer.php");
    global $error;
    $mail = new PHPMailer();
    $mail->IsSMTP();		// Ativar SMTP
    $mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true;		// Autenticação ativada
    $mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
    $mail->Host = 'mail.heaolu.com.br';	// SMTP utilizado
    $mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
    $mail->Username = "elro@heaolu.com.br";
    $mail->Password = "elroH2020";
    $mail->SetFrom($de, $de_nome);
    $mail->Subject = $assunto;
    $mail->Body = $corpo;
    $mail->AddAddress($para);
    if(!$mail->Send()) {
      $error = 'Mail error: '.$mail->ErrorInfo;
      return false;
    } else {
      $error = 'Mensagem enviada!';
      return true;
    }
  }

  function curl_bitrix_lead_add($payload){
    include "config/integration_connect.php";
		// API URL
		$url = $endpoint.'crm.lead.add';

		// Create a new cURL resource
		$ch = curl_init($url);

		// Attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		// Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		// Return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute the POST request
		$result = curl_exec($ch);

		// Close cURL resource
    curl_close($ch);

    //return result
    return $result;
  }

  function curlClickSign($payload){
    include "config/integration_connect.php";

		// API URL
		$url = $endpoint_clicksign;

		// Create a new cURL resource
		$ch = curl_init($url);

		// Attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		// Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		// Return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute the POST request
		$result = curl_exec($ch);

		// Close cURL resource
    curl_close($ch);

    //return result
    return $result;
  }

  function curlConvertPdf($payload){
    include "config/integration_connect.php";
		// API URL
		$url = $endpoint_conversor;

		// Create a new cURL resource
		$ch = curl_init($url);

		// Attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		// Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		// Return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute the POST request
		$result = curl_exec($ch);

		// Close cURL resource
    curl_close($ch);

    //return result
    return $result;
  }

  function curl_bitrix_method($method,$payload){
    include "config/integration_connect.php";
    // API URL
    $url = $endpoint.$method;

		// Create a new cURL resource
		$ch = curl_init($url);

		// Attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		// Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		// Return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute the POST request
		$result = curl_exec($ch);

		// Close cURL resource
    curl_close($ch);

    //return result
    return $result;
  }

  function getProfissoes($uf, $next = "", $name = ""){

    $condTipo = '
    "PROPERTY_319": {
      "value": "537"
    },';

    // if (strtolower($uf) === "rj" or strtolower($uf) === "sp")
    // {
    //   $condTipo = "";
    // }

    $payloadProfissao = '{
      "order": {
        "NAME": "ASC"
      },
      "filter": {
        "SECTION_ID": {
          "value": "156"
        },
        '.$condTipo.'
        "PROPERTY_370": {
          "value": "'.$uf.'"
        }
        '.$name.'
      },
      "select": [
        "ID",
        "NAME",
        "SECTION_ID",
        "PROPERTY_324",
        "PROPERTY_326",
        "PROPERTY_368",
        "PROPERTY_372",
        "PROPERTY_376"
      ]
      '.$next.'
    }';

    $doBusca = curl_bitrix_method("crm.product.list", $payloadProfissao);

    return $doBusca;

  }

  function getCodIdade($idade){
    $id_idade = null;
    if($idade >=0 and $idade <=18)
    {
      $id_idade = 158;
    }else if($idade >=19 and $idade <=23)
    {
      $id_idade = 160;
    }else if($idade >=24 and $idade <=28)
    {
      $id_idade = 162;
    }else if($idade >=29 and $idade <=33)
    {
      $id_idade = 164;
    }else if($idade >=34 and $idade <=38)
    {
      $id_idade = 166;
    }else if($idade >=39 and $idade <=43)
    {
      $id_idade = 168;
    }else if($idade >=44 and $idade <=48)
    {
      $id_idade = 170;
    }else if($idade >=49 and $idade <=53)
    {
      $id_idade = 172;
    }else if($idade >=54 and $idade <=58)
    {
      $id_idade = 174;
    }else if($idade >=59)
    {
      $id_idade = 176;
    }else{
      $id_idade = false;
    }
    return $id_idade;
  }

  function getOperadoraId($value_id)
  {
    include "../config/db_connect.php";
    $buscaOperadoraId = mysqli_query($conexao,"select xml_id from operadoras where value_id = ".$value_id);
    if(mysqli_num_rows($buscaOperadoraId) > 0)
    {
      $rsOpeId = mysqli_fetch_array($buscaOperadoraId);
      return $rsOpeId["xml_id"];
    }else{
      return false;
    }
  }

  function convertem($term) {
    $palavra = strtr(strtoupper($term),"àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ","ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
    return $palavra;
  }

  function log_api($text_log) {
    $name = 'api.log';
    $file = fopen($name, 'a');
    $text='';
    $text .= 'LOG API - '.date("Y-m-d H:i:s")." >> ".$text_log.PHP_EOL;
    fwrite($file, $text);
    fclose($file);
  }

?>
