<?php
$access_token = 'jmhzgp1C7TuPBK/AqLlBHHUxSC2WWi99FADOdJ+7bMiXITt574EKDmzC+hyNNPRgTUZ4+bFR2J/VvZ/Zb2IY6YzzgZccnsWtxnNKkuW4ylPk++pJPFH3lxDvNk4AqPTBKXbk7yuaATZDor3pJA28rAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;