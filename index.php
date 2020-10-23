<?php
const TOKEN = '1123292956:AAHKqRlNzGzoh-V7bieKo7rk2gwDRIRMMZQ';
const BASE_URL = 'https://api.telegram.org/bot'.TOKEN.'/';

$update = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);

function sendRequest($method, $params = []) {

	if(!empty($params)) {
		$url = BASE_URL.$method.'?'.http_build_query($params);
	}else {
		$url = BASE_URL.$method;
	}

	return json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);
}

$chat_id = $update['message']['chat']['id'];
$text = $update['message']['text'];

if($text == '/start') {
	$date = 'Введите название части света и столицы. 
Пример: Европа, Берлин
Важно: просим Вас писать через запятую и с заглавных букв! Спасибо)
Наш бот понимает и русский, и украинский язык)';  
	sendRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $date]);
}else {
	$pieces = explode(", ", $text);
    $city = $pieces[1];


$link = mysqli_connect("localhost", "sammy", "Password_pw9", "Time");
mysqli_query($link, "SET NAMES utf8");

if($pieces[0] == 'Африка') {
$query = mysqli_query($link, "SELECT `name` FROM `Africa` WHERE `variant1` = '$city' OR `variant2` = '$city'");
}elseif($pieces[0] == 'Америка') {
$query = mysqli_query($link, "SELECT `name` FROM `America` WHERE `variant1` = '$city' OR `variant2` = '$city'");
}elseif($pieces[0] == 'Азия' || $pieces[0] == 'Азія') {
$query = mysqli_query($link, "SELECT `name` FROM `Asia` WHERE `variant1` = '$city' OR `variant2` = '$city'");
}elseif($pieces[0] == 'Австралия' || $pieces[0] == 'Австралія') {
$query = mysqli_query($link, "SELECT `name` FROM `Australia` WHERE `variant1` = '$city' OR `variant2` = '$city'");
}elseif($pieces[0] == 'Европа' || $pieces[0] == 'Європа') {
$query = mysqli_query($link, "SELECT `name` FROM `Europe` WHERE `variant1` = '$city' OR `variant2` = '$city'");
}

$result = mysqli_fetch_row($query);

if(!empty($result)) {
    date_default_timezone_set($result[0]);
    $date = date("H:i:s, d.m.Y");
    sendRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $date]);
}elseif(empty($result)) {
    $date = 'Попробуйте ещё раз!';
    sendRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $date]);
}
}

?>