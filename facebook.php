<?php

header('Content-Type: application/json');

function fetchUrl($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);

  $feedData = curl_exec($ch);
  curl_close($ch); 

  return $feedData;
}

$profile_id = "profile_id";

$app_id = "XXXXXXXXXXXXXXX";
$app_secret = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$limit = 100;

$authToken = fetchUrl("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$app_id}&client_secret={$app_secret}");
$json_object = fetchUrl("https://graph.facebook.com/{$profile_id}/feed?{$authToken}&limit={$limit}");

echo $json_object;

?>