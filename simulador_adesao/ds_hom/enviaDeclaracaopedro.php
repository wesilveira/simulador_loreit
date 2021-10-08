<?php
	
	$tipoForm = "declaracao";
	$corpo_mensagem = "";
	switch($tipoForm){
		case "declaracao":
			
			if(!isset($_POST["deal_id"]) or empty($_POST["deal_id"]) or !isset($_POST["access_token"]) or empty($_POST["access_token"]))
			{
				echo '<script>alert("Parâmetros inválidos. Verifique e tente novamente.");window.location.href="http://way.digital/#3";</script>';
				exit;
			}
			
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$telefone = $_POST["fone"];
			$dependentes = $_POST["dependentes"];
			$perguntas = 16;
			$campos_bitrix_update = null;
			$campos_depara_bitrix = array();
			$bitrix_sim_nao_ids = array();
			
			//pega cmapos de-para monta array
			$file = fopen("depara_campos_bitrix.csv", "r");
			while(!feof($file)){
				$line = explode(";",fgets($file));
				//echo $line[0]."_".$line[1]."<br>";
				$campos_depara_bitrix[trim($line[0])] = trim($line[1]);
				if(strpos(trim($line[0]), "radio") !== false)
				{
					$bitrix_sim_nao_ids[$line[1]][0] = trim($line[2]);
					$bitrix_sim_nao_ids[$line[1]][1] = trim($line[3]);
				}
			}
			fclose($file);
			
			//carrega values campos item e tipo beneficiario obs
			$loadJsonValues = file_get_contents('campos_bitrix_form2.json');
			$arrayValueInput = json_decode($loadJsonValues,true);
			
			//var_dump($bitrix_sim_nao_ids);
			//exit;
			
			//dados titular
			$corpo_mensagem = 	"<h3>Declaração de Saúde</h3>".
								
								"<fieldset>".
								"<legend>Dados Titular</legend>".
								'<table border="1" cellpadding="5" cellspacing="5" border="1" style="font-size:13px;border-collapse: collapse;">'.
								"<tr>".
								"<td>Nome:</td><td>$nome</td>".
								"</tr>".
								"<tr>".
								"<td>Email:</td><td>$email</td>".
								"</tr>".
								"<tr>".
								"<td>Telefone:</td><td>$telefone</td>".
								"</tr>".
								"<tr>".
								"<td>Dependentes:</td><td>$dependentes</td>".
								"</tr>".
								"</table>".
								"</fieldset><br>";
			
			//colunas respostas
			$colunas_respostas = "<th>#</th><th>Titular</th>";
			if($dependentes > 0)
			{
				for ($i = 1; $i <= $dependentes; $i++) {
					$colunas_respostas .= "<th>Dependente $i</th>";
				}
			}
			
			//linhas respostas e obs
			$linhas_respostas = "";
			$qtobs = 0;
			$observacoes = "<h5>Observações:</h5><ul>";
			for ($i = 1; $i <= $perguntas; $i++) {
				
				if($qtobs >= 10)
				{
					break;
				}
				
				$linhas_respostas .= "<tr>";
				
				//campos bitrix variaveis
				$campo_radio_bitrix_titular = "radio_".$i."_TITULAR";
				//echo $campo_radio_bitrix_titular."<br>";
				//echo $campos_depara_bitrix[$campo_radio_bitrix_titular]."<br>";
				//echo $bitrix_sim_nao_ids[$campos_depara_bitrix[$campo_radio_bitrix_titular]][0];
				//var_dump($bitrix_sim_nao_ids[$campos_depara_bitrix[$campo_radio_bitrix_titular]]);
				$linhas_respostas .= '<td>R'.$i.'</td><td align="center">'.$_POST["radio_tit_$i"].'</td>';
				if($_POST["radio_tit_$i"] == "sim")
				{
					$qtobs++;
					$observacoes .= "<li>OBS R$i Titular: ".$_POST["obs_tit_$i"]."</li>";
					
					//armazena campos para bitrix
					$campos_bitrix_update .= "&fields[".$campos_depara_bitrix[$campo_radio_bitrix_titular]."]=".$bitrix_sim_nao_ids[$campos_depara_bitrix[$campo_radio_bitrix_titular]][0];
					$campos_bitrix_update .= "&fields[".$campos_depara_bitrix["OBS".$qtobs."_descricao"]."]=".$_POST["obs_tit_$i"];
					//armazena campo tipo, item e data
					$partes_data_tit = explode("-",$_POST["data_obs_tit_$i"]);
					$data_tit = "&fields[".$campos_depara_bitrix["OBS".$qtobs."_data_evento"]."]=".$partes_data_tit[2]."/".$partes_data_tit[1]."/".$partes_data_tit[0];
					$item_tit = "&fields[".$campos_depara_bitrix["OBS".$qtobs."_item"]."]=".$arrayValueInput["OBS".$qtobs."_item"]["$i"];
					$tipo_tit = "&fields[".$campos_depara_bitrix["OBS".$qtobs."_tipo_beneficiario"]."]=".$arrayValueInput["OBS".$qtobs."_tipo_beneficiario"]["Titular"];
					//append to campos_bitrix_update
					$campos_bitrix_update .= $data_tit;
					$campos_bitrix_update .= $item_tit;
					$campos_bitrix_update .= $tipo_tit;
				}else{
					//armazena campos para bitrix
					$campos_bitrix_update .= "&fields[".$campos_depara_bitrix[$campo_radio_bitrix_titular]."]=".$bitrix_sim_nao_ids[$campos_depara_bitrix[$campo_radio_bitrix_titular]][1];
				}
				
				if($dependentes > 0){
					for ($dep = 1; $dep <= $dependentes; $dep++) {
						$dep_item = "radio_dep_".$i."_".$dep;
						$obs_dep_item = "obs_dep_".$i."_".$dep;
						$data_obs_dep_item = "data_obs_dep_".$i."_".$dep;
						$linhas_respostas .= '<td align="center">'.$_POST[$dep_item].'</td>';
						
						//campos bitrix variaveis
						$campo_radio_bitrix_dependente = "radio_".$i."_DEP0".$dep;
						
						if($_POST[$dep_item] == "sim")
						{
							$qtobs++;
							$observacoes .= "<li>OBS R$i Dependente $dep: ".$_POST[$obs_dep_item]."</li>";
							
							//armazena campos para bitrix
							$campos_bitrix_update .= "&fields[".$campos_depara_bitrix[$campo_radio_bitrix_dependente]."]=".$bitrix_sim_nao_ids[$campos_depara_bitrix[$campo_radio_bitrix_dependente]][0];
							$campos_bitrix_update .= "&fields[".$campos_depara_bitrix["OBS".$qtobs."_descricao"]."]=".$_POST[$obs_dep_item];
							//armazena campo tipo, item e data
							$partes_data_dep = explode("-",$_POST[$data_obs_dep_item]);
							$data_dep = "&fields[".$campos_depara_bitrix["OBS".$qtobs."_data_evento"]."]=".$partes_data_dep[2]."/".$partes_data_dep[1]."/".$partes_data_dep[0];
							$item_dep = "&fields[".$campos_depara_bitrix["OBS".$qtobs."_item"]."]=".$arrayValueInput["OBS".$qtobs."_item"]["$i"];
							$tipo_dep = "&fields[".$campos_depara_bitrix["OBS".$qtobs."_tipo_beneficiario"]."]=".$arrayValueInput["OBS".$qtobs."_tipo_beneficiario"]["Dependente 0".$dep];
							//append to campos_bitrix_update
							$campos_bitrix_update .= $data_dep;
							$campos_bitrix_update .= $item_dep;
							$campos_bitrix_update .= $tipo_dep;
						}else{
							//armazena campos para bitrix
							$campos_bitrix_update .= "&fields[".$campos_depara_bitrix[$campo_radio_bitrix_dependente]."]=".$bitrix_sim_nao_ids[$campos_depara_bitrix[$campo_radio_bitrix_dependente]][1];
						}
					}
				}
				
				$linhas_respostas .= "</tr>";
			}
			$observacoes .= "</ul>";
			
			//linhas e colunas respostas
			$corpo_mensagem .=  "<fieldset>".
								"<legend>Respostas Questionário</legend>".
								'<table border="1" cellpadding="5" cellspacing="5" border="1" style="font-size:13px;border-collapse: collapse;">'.
								"<tr>".
									$colunas_respostas.
								"</tr>".
								$linhas_respostas.
								"</table>";
								
							if($qtobs>0)
								$corpo_mensagem .= $observacoes;
								
			$corpo_mensagem .=	"</fieldset><br>";
								
			//colunas peso altura
			$colunas_altura_peso = "<th>#</th><th>Altura</th><th>Peso</th>";
			
			//linhas peso altura
			$linhas_altura_peso = "<tr>";
			$linhas_altura_peso .= '<td>Titular</td><td align="center">'.$_POST["altura_tit"].'</td><td align="center">'.$_POST["peso_tit"].'</td>';
			$linhas_altura_peso .= "</tr>";
			
			//peso altura bitrix titular
			$campos_bitrix_update .= "&fields[".$campos_depara_bitrix["DEC_SAUDE_PESO_TITULAR"]."]=".$_POST["peso_tit"];
			$campos_bitrix_update .= "&fields[".$campos_depara_bitrix["DEC_SAUDE_ALTURA_TITULAR"]."]=".$_POST["altura_tit"];
			
			if($dependentes > 0){
				for ($dep = 1; $dep <= $dependentes; $dep++) {
					$dep_altura_item = "altura_dep_".$dep;
					$dep_peso_item = "peso_dep_".$dep;
					$linhas_altura_peso .= '<tr><td>Dependente '.$dep.'</td><td align="center">'.$_POST[$dep_altura_item].'</td><td align="center">'.$_POST[$dep_peso_item].'</td></tr>';
					
					//peso altura bitrix dependente
					$campos_bitrix_update .= "&fields[".$campos_depara_bitrix["DEC_SAUDE_PESO_DEP0".$dep]."]=".$_POST[$dep_peso_item];
					$campos_bitrix_update .= "&fields[".$campos_depara_bitrix["DEC_SAUDE_ALTURA_DEP0".$dep]."]=".$_POST[$dep_altura_item];
				}
			}
								
			//dados complementares
			
			//opção orientação médica e aceite
			$opcao_aceite = "<h5>Opção Orientação Médica / Ciência dados preenchidos:</h5><p>";
			$opcao_orientacao = $_POST["opcao1"];
			if($opcao_orientacao == 3690){
				$opcao_aceite .= "<b>Opção Orientação Médica</b>: <span>Optei por ser orientado por um médico indicado pela Operadora.</span><br>";
			}else if($opcao_orientacao == 3692){
				$opcao_aceite .= "<b>Opção Orientação Médica</b>: <span>Optei por ser orientado por um médico de minha livre escolha e confiança.</span><br>";
			}else if($opcao_orientacao == 3694){
				$opcao_aceite .= "<b>Opção Orientação Médica</b>: <span>Dispensei a presença de um médico orientador.</span><br>";
			}
			
			//bitrix opção orientação medica
			$campos_bitrix_update .= "&fields[".$campos_depara_bitrix["orientacao2"]."]=".$opcao_orientacao;
			
			$opcao_aceite .= "<b>Ciência dados preenchidos</b>: Sim.";
			
			
			$corpo_mensagem .=  "<fieldset>".
								"<legend>Dados Complementares</legend>".
								'<table border="1" cellpadding="5" cellspacing="5" border="1" style="font-size:13px;border-collapse: collapse;">'.
								"<tr>".
									$colunas_altura_peso.
								"</tr>".
								$linhas_altura_peso.
								"</table>".
								$opcao_aceite.
								"</fieldset>";
			
			//echo $corpo_mensagem;
			
			//echo "<br><br><Br>";
			
			//echo $teste;
			
			//echo "<br><br><Br>";
			
			
			
			//print_r($_POST);
			
			break;
	}
	
	//echo $corpo_mensagem;
	//echo "<br>";
	//echo $campos_bitrix_update;
	//exit;
	
	//send to bitrix
	$base_url_deal_update = "https://waydigital.bitrix24.com.br/rest/crm.deal.update?";
	$access_token = "access_token=".$_POST["access_token"]."&";
	$deal_id = "id=".$_POST["deal_id"];
	//$campos_bitrix_update .= "&fields[STAGE_ID]=C4:PREPAYMENT_INVOICE";
	$timeline_comment = "O Formulário: ".$_POST["name_form"]." foi preenchido pelo cliente.";
	$url_timeline_comment = "https://waydigital.bitrix24.com.br/rest/1142/uuzj4yburfsuhrjg/crm.timeline.comment.add?fields[ENTITY_ID]=".$_POST["deal_id"]."&fields[ENTITY_TYPE]=deal&fields[COMMENT]=".$timeline_comment;
	$result_send = json_decode(curl_rest($base_url_deal_update.$access_token.$deal_id.$campos_bitrix_update));
	
	if(isset($result_send->result) and $result_send->result === true){		
		echo '<script>alert("Seu formulário de Declaração de Saúde foi preenchido e enviado para inclusão das informações na sua Proposta de Adesão. Por favor, retorne ao Chat para finalizar a sua Proposta.");window.location.href="http://way.digital/#3";</script>';
	}else{
		$errorMsg = ($result_send->error == "expired_token") ? "'Acesse o link enviado por e-mail novamente. [Token Expirado]'" : "Erro, verifique e tente novamente.";
		echo '<script>alert('.$errorMsg.');window.location.href="http://way.digital/#3";</script>';
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
	
	 $to = "atendimento@way.digital";
	 $subject = "Declaração de Saúde";
	 
	 $header = "From:direcao@gpsoft.com.br \r\n";
	 $header .= "Cc:$email \r\n";
	 $header .= "MIME-Version: 1.0\r\n";
	 $header .= "Content-type: text/html\r\n";
	 
	 $retval = mail ($to,$subject,$corpo_mensagem,$header);
	 
	 if( $retval == true ) {
		echo '<script>alert("E-mail enviado com sucesso! Em breve retornaremos seu contato.");window.location.href="ds.html";</script>';
	 }else {
		echo '<script>alert("Falha no envio, tente novamente por favor. ['.$retval.']");window.location.href="ds.html";</script>';
	 }

?>