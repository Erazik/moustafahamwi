<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		require_once('GetResponseAPI.class.php');
		$api = new GetResponse('b48303725f37bd770a2a1c74963dd7ba');
		
		if(isset($_POST['name'])) $name = $_POST['name'];
		if(isset($_POST['mail'])) $email = $_POST['mail'];
		
		if(empty($name) || empty($email))
		{
			echo 'Invalid params';
			die;
		}
		// Campaigns
		$campaigns 	 = (array)$api->getCampaigns();

		$campaignIDs = array_keys($campaigns);

		foreach($campaigns as $k => $v){
			$firstCompaignTokenAsId = $k;
		}

		$campaign 	 = $api->getCampaignByID($campaignIDs[0]);



		$res  = $api->addContact($firstCompaignTokenAsId, $name, $email, 'insert');
		//var_dump($res);
		if(isset($res->code)){
			$out=$res->code;
			echo $out;
		}else{
			$out=$res->queued;
			echo $out;
		}
	}
	
	else
	{
		header( 'Location: http://moustafa.shahum.net/404' );
	}
	
?>