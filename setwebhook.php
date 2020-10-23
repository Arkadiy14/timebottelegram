<?php
const TOKEN = '1123292956:AAHKqRlNzGzoh-V7bieKo7rk2gwDRIRMMZQ';
$method = 'setWebhook';
$url = 'https://api.telegram.org/bot'.TOKEN.'/'.$method;
$options = [
	'url' => 'https://timebottelegram.herokuapp.com/'
];

$response = file_get_contents($url.'?'.http_build_query($options));

var_dump($response);
?>