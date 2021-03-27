<?php
const TOKEN = 'YOUR TOKEN';
$method = 'setWebhook';
$url = 'https://api.telegram.org/bot'.TOKEN.'/'.$method;
$options = [
	'url' => 'https://timebottelegram.herokuapp.com/'
];

$response = file_get_contents($url.'?'.http_build_query($options));

var_dump($response);
?>