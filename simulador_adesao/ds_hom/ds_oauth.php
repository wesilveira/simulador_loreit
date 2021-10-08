<?php
	
	$base_url_get_deal =  "https://heaolu.bitrix24.com.br/rest/crm.deal.get?";
	$base_url_get_refresh_token = "https://heaolu.bitrix24.com.br/oauth/token/?client_id=local.5ebc3a39f26542.38427336&grant_type=refresh_token&client_secret=2O7XAXJfFKsPw2X3Qa2t2kuPP3XXKQIitgG06x3bRAOLUVFnEQ&redirect_uri=app_URL&refresh_token=";
	$refresh_token = null;
	
	if(!isset($_GET["deal_id"]) or empty($_GET["deal_id"]) or !isset($_GET["form"]) or empty($_GET["form"]))
	{
		echo '<script>alert("Parâmetros inválidos. Verifique e tente novamente.");</script>';
	}else{
		$deal_id = $_GET["deal_id"];
		$form = $_GET["form"];
		
		//$base_url_form_ds = "http://"+window.location.host+"/waygeraldo/".$form.".php?";
		$base_url_form_ds = "";
		if(isset($_GET["embed"]) and isset($_GET["params"]))
		{
			$base_url_form_ds = $form.".php?embed&params=".$_GET["params"]."&";
		}else{
			$base_url_form_ds = $form.".php?";
		}
		
		//pega ultimo refresh token salvo
		$refresh_token = file_get_contents('bitrix_refresh_token.txt');
		
		//request refresh token
		$url_do_refresh_token = $base_url_get_refresh_token.$refresh_token;
		$do_refresh_token = json_decode(curl_rest($url_do_refresh_token));
		$final_url_form = $base_url_form_ds."deal_id=".$deal_id;
		header("Location: $final_url_form");

		// if(strlen($do_refresh_token->access_token) == 70)
		// {
		// 	//pega tokens
		// 	$access_token = $do_refresh_token->access_token;
		// 	$refresh_token = $do_refresh_token->refresh_token;
		// 	//grava novo refresh token
		// 	file_put_contents('bitrix_refresh_token.txt',$refresh_token);
		// 	//redirect to form ds
		// 	$final_url_form = $base_url_form_ds."deal_id=".$deal_id."&access_token=".$access_token;
		// 	header("Location: $final_url_form");
		// }else{
		// 	echo '<script>alert("Parâmetros inválidos. Verifique e tente novamente.");</script>';
		// }
		
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

?>