<?php

$json = file_get_contents('php://input');
$request = $_SERVER['REQUEST_METHOD'];
include "../../simulador_adesao/config/db_connect.php";
//dados para criação do log
$name = 'api.log';
$file = fopen($name, 'a');
$text='';

//CONSTRUÇÃO DA API PARA METHOD POST
if($request == 'POST'){
    
    //Formato de integração para RD Station
    //Recebimento de Leads
    $resultado = json_decode($json,true);
    //inclusão de resultado em debug
    $text .= ''.PHP_EOL;
    $text .= ''.PHP_EOL;
    $text .= 'POST RECEIVED - '.date("Y-m-d H:i:s").PHP_EOL;
    

    //RECEBENDO INTEGRAÇÃO CLICKSIGN
    if($resultado["event"]["name"]){
        $text .= 'RECEIVED FROM CLICKSIGN'.PHP_EOL;
        //$text .= $json.PHP_EOL;
        $text .= '#########################'.PHP_EOL;
        $text .= 'Integration App - CLICKSIGN'.PHP_EOL;
        $text .= 'Evento recebido: '.$resultado["event"]["name"].PHP_EOL;
        $text .= 'Documento recebido: '.$resultado["document"]["key"].PHP_EOL;
        $event = $resultado["event"]["name"];
        $document = $resultado["document"]["key"];
        $status = $resultado["document"]["status"];
        $document_url = "";
        

        if($event === "auto_close" and $status === "closed" ){
          $text .= 'Tratativa para o evento iniciada'.PHP_EOL;
            $proposta_final = json_decode(curl_rest("https://app.clicksign.com/api/v1/documents/".$document."?access_token=4f288e06-a179-4f4e-b4fe-7b64834fbf6f"),true);
            $document_url = $proposta_final["document"]["downloads"]["signed_file_url"];
            $text .= 'document URL Gerada '.$document_url.PHP_EOL;
            $deal_id = getDealId($document);
            $text .= 'Localizado DEAL ID '.$deal_id.PHP_EOL;

              $return_envio = envia_proposta($document_url,$deal_id);
              $fatura = geraFatura($deal_id);
              $text .= 'Fatura Gerada '.$fatura.PHP_EOL;
              $fatura_id = getFaturaRecente($deal_id);
              $link_external = getExternalLink($fatura_id);



              if(isset($link_external) and $link_external !== null)
              { 
                $text .= 'Link Externo Gerado com sucesso!'.PHP_EOL;
                if(!existeFaturaRecorrente($deal_id)){
                  $text .= 'Iniciando agendamento de faturas...'.PHP_EOL;
                  $controle_recorrencia=setFaturaRecorrente($fatura_id);
                  $text .= 'Fatura ID...'.$fatura_id.PHP_EOL;                
                  $text .= 'controle recorrencia...'.$controle_recorrencia.PHP_EOL;               
                  if(isset($controle_recorrencia) and $controle_recorrencia !== null and $controle_recorrencia > 0)
                  {
                    $text .= 'Gerado faturas recorrentes para o Deal ID especificado.'.PHP_EOL;
                    header('Content-Type: application/json');
                    $retorno = array("Deal" => $deal_id, "Document Key" => $document, "Event" => $event);
                    $json_send = json_encode(array("error" => "false", "result" => $retorno, "message" => "Evento processado com sucesso"),true); 
                    echo $json_send;

                  }else{
                    $text .= 'Não foi gerado faturas recorrentes para o Deal ID especificado.'.PHP_EOL;
                    header('Content-Type: application/json');
                    $retorno = array("Deal" => $deal_id, "Document Key" => $document, "Event" => $event);
                    $json_send = json_encode(array("error" => "false", "result" => $retorno, "message" => "Evento processado com sucesso, Não foi gerado faturas recorrentes para o Deal ID especificado."),true); 
                    echo $json_send;
                  }
                }else{
                  $text .= 'Já existe fatura recorrente agendada para este Deal ID.'.PHP_EOL;
                  header('Content-Type: application/json');
                    $retorno = array("Deal" => $deal_id, "Document Key" => $document, "Event" => $event);
                    $json_send = json_encode(array("error" => "false", "result" => $retorno, "message" => "Evento processado com sucesso, Já existe fatura recorrente."),true); 
                    echo $json_send;
                } 

              }else{
                $text .= 'Não foi gerado fatura inicial para este Deal ID.'.PHP_EOL;
                header('Content-Type: application/json');
                $retorno = array("Deal" => $deal_id, "Document Key" => $document, "Event" => $event);
                $json_send = json_encode(array("error" => "false", "result" => $retorno, "message" => "Evento processado, sem gerar fatura"),true); 
                echo $json_send;

              }
        }
    }
    
    //RECEBENDO INTEGRAÇÃO RD STATION
    if(isset($resultado["leads"][0]["first_conversion"])){
    //first_conversion localizado no json envia para o bitrix com dados do lead
        if($resultado["leads"][0]["first_conversion"]){
            $stage_lead = "first_conversion";
            $name = $resultado["leads"][0]["first_conversion"]["content"]["nome"];
            $email = $resultado["leads"][0]["first_conversion"]["content"]["email_lead"];
            $phone = $resultado["leads"][0]["first_conversion"]["content"]["telefone"];
            $identificador = $resultado["leads"][0]["first_conversion"]["content"]["identificador"];
            $utmsource = $resultado["leads"][0]["first_conversion"]["conversion_origin"]["source"];
            $utmmedium = $resultado["leads"][0]["first_conversion"]["conversion_origin"]["medium"];
            $comments = "CRIADO VIA INTEGRAÇÃO RD STATION";
            $timeline = null;


            if(stripos($identificador,'heroes_way_unimed_natal') !== false){
                $operadora = '12311';
            }elseif (stripos($identificador,'heroes_way_unimed_recife') !== false){
                $operadora = '12313';
            }elseif (stripos($identificador,'heroes_way_unimed_salvador') !== false){
                $operadora = '12315';
            }elseif (stripos($identificador,'heroes_way_hapvida_goiania') !== false){
                $operadora = '12343';
            }else{
                $operadora = '12317';
            }
            
            //TRATAMENTO DE TELEFONES
            if(stripos($phone,'+55') !== false){
                $phone = substr($phone,3);
            }
            
            //criação do lead no bitrix é esperado um array contendo o numeto do lead criado
            $lead_id=json_decode(create_lead($name,$email,$phone,$comments,$timeline,$utmsource,$utmmedium,$operadora,$identificador),true);
            //$lead_id["lead_id"]=1;
            //debug
            $text .= "PAYLOAD BITRIX".PHP_EOL;
            $text .= $lead_id["lead_id"].PHP_EOL;
            $text .= $lead_id["payload"].PHP_EOL;

            if($lead_id["lead_id"] > 0){
                header('Content-Type: application/json');
                $retorno = array("id" => $lead_id["lead_id"], "name" => $name, "email" => $email, "phone" => $phone, "stage_lead" => $stage_lead,"utm_source" => $utmsource, "utm_medium" => $utmmedium, "operadora" => $operadora);
                $json_send = json_encode(array("error" => "false", "result" => $retorno, "message" => "Lead criado com sucesso"),true); 
                echo $json_send;
                
                //debug
                $text .= ''.PHP_EOL;
                $text .= $json_send.PHP_EOL;

            }else{
                header('Content-Type: application/json');
                echo json_encode(array("error" => "true", "erro_msg" => "Falha ao criar lead."), true);
                
                //debug
                $text .= ''.PHP_EOL;
                $text .= "Falha ao criar lead.".PHP_EOL;
            }
        

        }else{
            $stage_lead = "first_conversion not localized";
            //first_conversion não localizado, não envia para o bitrix. Imprime msg de Warning no log 
            header('Content-Type: application/json');
            echo json_encode(array("error" => "true", "erro_msg" => "Dados incompletos para criar lead."), true);
            $text .= ''.PHP_EOL;
            $text .= "Dados incompletos para criar lead.".PHP_EOL;
            
        }
    }

}else{
    header('Content-Type: application/json');
    echo json_encode(array("error" => "true", "erro_msg" => "Method not avaliable"), true);
}

//salvando informações da API em um arquivo de log auditoria
fwrite($file, $text);
fclose($file);



function create_lead($name,$email,$phone,$comments,$timeline,$utm_source,$utm_medium,$operadora,$identificador){
    
    //payload mount
    $payload_lead = '{
        "fields": {
            "TITLE": "'.$name.'",
            "NAME": "'.$name.'",
            "PHONE": [
                {
                    "VALUE": "'.$phone.'",
                    "VALUE_TYPE": "WORK"
                }
            ],
            "EMAIL": [
                {
                    "VALUE": "'.$email.'",
                    "VALUE_TYPE": "WORK"
                }
            ],
            "OPENED": "Y",
            "COMMENTS": "'.$comments.'",
            "TYPE_ID": "CLIENT",
            "SOURCE_ID": "ADVERTISING",
            "UTM_SOURCE": "'.$utm_source.'",
            "UTM_MEDIUM": "'.$utm_medium.'",
            "UTM_CAMPAIGN": "'.$identificador.'",
            "UF_CRM_1608301951": "'.$operadora.'"
        }
    }';

   
    $sendToBitrix = curl_bitrix_method("crm.lead.add",$payload_lead);
    $sendToBitrix = json_decode($sendToBitrix,true);
    
    if(isset($sendToBitrix["result"]) and ($sendToBitrix["result"] != "" or !empty($sendToBitrix["result"])))
    {
      $lead_id = $sendToBitrix["result"];

      header('Content-Type: application/json');
      $retorno = json_encode(array("error" => "false", "lead_id" => $lead_id, "payload" => $payload_lead),true);
      
    }else{
      header('Content-Type: application/json');
      $retorno = json_encode(array("error" => "true", "erro_msg" => "Falha ao salvar dados."), true);
      
    }
    return $retorno;
}

function contains($frase,$palavra){
    return strpos($frase, $palavra) !== false;
}

function getDealId($key){
  include "../../simulador_adesao/config/db_connect.php";
    $buscaProposta = mysqli_query($conexao,"select * from propostas where keyid_proposta = '$key' ORDER BY createdon");
        if(mysqli_num_rows($buscaProposta) > 0)
        {
          $dadosProposta = array();
          while($rs=mysqli_fetch_array($buscaProposta))
          {
            $dadosProposta[] = $rs;
          }
        }
        $proposta = $dadosProposta[0];
    return $proposta["deal_id"];    
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
function envia_proposta($linkProp,$deal_id){
$html_enviada=false;
if(isset($deal_id))
    {
      //Captura e converte em base64 a url da proposta
      $prop_base64 = base64_encode(file_get_contents($linkProp));
      
      $payloadUpdDeal = '{
        "id": "'.$deal_id.'",
        "fields": {
            "UF_CRM_1606400905": {
              "fileData": [
                  "Proposta_assinada.pdf",
                  "'.$prop_base64.'"
              ]
            }
        }
      }';
      //fim montagem payload

      $updDeal = json_decode(curl_bitrix_method("crm.deal.update",$payloadUpdDeal),true);
      //$avancaFicha = curl_rest($endpoint."crm.automation.trigger/?code=ssyq1&target=DEAL_".$deal_id);

      if(isset($updDeal["result"]) and $updDeal["result"] === true)
      {
        $html_enviada =true;
      }else{
        $html_enviada =false;
      }

    } else{
      $html_enviada =false;
    }
    return $html_enviada;
}

function getFaturaRecente($deal_id){
$fatura='';
if(isset($deal_id))
    {
      $payloaGetInvoice ='{
        "order": {
          "DATE_INSERT": "DESC"
        },
        "filter": {
          ">PRICE": 0,
          "UF_DEAL_ID":'.$deal_id.'
        },
        "select": [
          "ID",
          "*"
        ]
      }';
      
      $updDeal = json_decode(curl_bitrix_method("crm.invoice.list",$payloaGetInvoice),true);
      
      if(isset($updDeal["result"][0]["ID"]) and $updDeal["result"][0]["ID"] > 0)
      {
        $fatura = $updDeal["result"][0]["ID"];
        
      }else{
        $fatura = null;
      }

    } else{
    $fatura = null;
    }
    return $fatura;

}
function existeFaturaRecorrente($deal_id){
$fatura='';
if(isset($deal_id))
    {
      $payloaGetInvoice ='{
        "order": {
          "DATE_INSERT": "DESC"
        },
        "filter": {
          ">PRICE": 0,
          "UF_DEAL_ID":'.$deal_id.',
          "IS_RECURRING": "Y"
        },
        "select": [
          "ID",
          "*"
        ]
      }';
      
      $updDeal = json_decode(curl_bitrix_method("crm.invoice.list",$payloaGetInvoice),true);
      
      if(isset($updDeal["total"]) and $updDeal["total"] > 0)
      {
        $fatura = true;
        
      }else{
        $fatura = false;
      }

    } else{
    $fatura = null;
    }
    return $fatura;

}

function setFaturaRecorrente($fatura_id){
$fatura='';

$fatura_inicial = getFatura($fatura_id);
$data_vigencia = date('d/m/Y', strtotime($fatura_inicial["result"]["UF_CRM_6012E609CD71C"]));
$dia_vigencia = date('d', strtotime($fatura_inicial["result"]["UF_CRM_6012E609CD71C"]));

$interval = "15";
if($dia_vigencia === "01"){
  $interval = "1";
}else{
  $interval ="15";
}

if(isset($fatura_id))
    {

      $payloaSetInvoice ='{
        "fields":
        {
            "INVOICE_ID": "'.$fatura_id.'",
            "IS_LIMIT": "N",
            "START_DATE": "'.$fatura_inicial["result"]["UF_CRM_6012E609CD71C"].'",
            "PARAMS": {
                "PERIOD": "month",
                "IS_WORKING_ONLY": "N",
                "TYPE": 1,
                "NUM_DAY_IN_MONTH": '.$interval.',
                "INTERVAL": 1,
                "DATE_PAY_BEFORE_OFFSET_TYPE": "DAY",
                "DATE_PAY_BEFORE_OFFSET_VALUE": 5

            }
        }
       }';
      
      $updDeal = json_decode(curl_bitrix_method("crm.invoice.recurring.add",$payloaSetInvoice),true);

      if(isset($updDeal["result"]) and $updDeal["result"] > 0)
      {
        $fatura = $updDeal["result"];
        
      }else{
        $fatura = $updDeal["error_description"];
      }

    } else{
    $fatura = null;
    }
    return $fatura." ".$interval.$dia_vigencia." ".$payloaSetInvoice;

}

function getExternalLink($fatura){
$link = "";
if(isset($fatura)){
      $externalLink = json_decode(curl_rest_bitrix("crm.invoice.getexternallink?id=".$fatura),true);
      

        $link = $externalLink["result"]; 
      
    }else{
      $link = "null";
    }
    return $link;
}


function geraFatura($deal_id){
$fatura_gerada=false;

if(isset($deal_id))
    {
      $updDeal = json_decode(curl_rest_bitrix("crm.automation.trigger/?code=y6rul&target=DEAL_".$deal_id),true);
      if(isset($updDeal["result"]) and $updDeal["result"] === true)
      {
        $fatura_gerada =true;
      }else{
        $fatura_gerada =false;
      }
    } else{
      $fatura_gerada =false;
    }
    return $fatura_gerada;

}


function curl_rest_bitrix($payload){
include "../../simulador_adesao/config/integration_connect.php";
// API URL
$url = $endpoint.$payload;

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

function curl_bitrix_method($method,$payload){
include "../../simulador_adesao/config/integration_connect.php";
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

function getDeal($deal_id){
  $deal='';
  $dataNow = date("Y-m-d H:i:s");
  if(isset($deal_id))
      {
  
        $payloaGetDeal ='{"ID": "'.$deal_id.'"}';
        
        $updDeal = json_decode(curl_bitrix_method("crm.deal.get",$payloaGetDeal),true);
        
        if(isset($updDeal["result"]))
        {
          $deal = $updDeal;
          
        }else{
          $deal = $updDeal["error_description"];
        }
  
      } else{
        $deal = null;
      }
      return $deal;
  
  }
  function getFatura($fatura_id){
    $fatura='';
    $dataNow = date("Y-m-d H:i:s");
    if(isset($fatura_id))
        {
    
          $payloaGetFatura ='{"ID": "'.$fatura_id.'"}';
          
          $updDeal = json_decode(curl_bitrix_method("crm.invoice.get",$payloaGetFatura),true);
          
          if(isset($updDeal["result"]))
          {
            $fatura = $updDeal;
            
          }else{
            $fatura = $updDeal["error_description"];
          }
    
        } else{
        $fatura = null;
        }
        return $fatura ;
    
    }

//Direitos reservados
//Reprodução não autorizada
//54e250d7f77a1a5e7f7056dea4676ec2
?>
