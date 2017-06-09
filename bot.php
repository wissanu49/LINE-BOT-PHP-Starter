<?php
$access_token = 'jmhzgp1C7TuPBK/AqLlBHHUxSC2WWi99FADOdJ+7bMiXITt574EKDmzC+hyNNPRgTUZ4+bFR2J/VvZ/Zb2IY6YzzgZccnsWtxnNKkuW4ylPk++pJPFH3lxDvNk4AqPTBKXbk7yuaATZDor3pJA28rAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			$mes = explode(" ",$text);	
			
			
			
			
			if($mes[0] == "check"){
				
				/*
				$url2 = "http://ifusion.co.th/status/index.php";				
				//$headers = array('Authorization: Bearer ' . $access_token);
				$ch = curl_init($url2);
				//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);
				*/
				// Build message to reply back
				$rep = "ยินดีด้วย เราตรวจสอบแล้ว ".$mes[1]." Online";
				$messages = [
					'type' => 'text',
					'text' => $rep
				];
				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);
				echo $result . "\r\n";
				
				
			}
			
			
		}
	}
}
echo "OK";
