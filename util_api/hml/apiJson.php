<?php

$json = file_get_contents('php://input');
$request = $_SERVER['REQUEST_METHOD'];

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
    $text .= 'RECEIVED FROM RD STATION'.PHP_EOL;
    $text .= $json.PHP_EOL;
    $text .= '#########################'.PHP_EOL;

    $id_rd = $resultado["leads"][0]["id"];

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


function curl_bitrix_method($method,$payload){
    include "../config/integration_connect.php";
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



//Direitos reservados
//Reprodução não autorizada
//54e250d7f77a1a5e7f7056dea4676ec2
?>
