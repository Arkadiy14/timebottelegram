<?php
const TOKEN = '1123292956:AAHKqRlNzGzoh-V7bieKo7rk2gwDRIRMMZQ';
const BASE_URL = 'https://api.telegram.org/bot'.TOKEN.'/';

function sendRequest($method, $params = []) {

	if(!empty($params)) {
		$url = BASE_URL.$method.'?'.http_build_query($params);
	}else {
		$url = BASE_URL.$method;
	}

	return json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);
}

$update = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);

$chat_id = $update['message']['chat']['id'];
$text = $update['message']['text'];

if($text == '/start') {
	$date = 'Введите название столицы. 
Пример: Берлин
Важно: просим Вас писать с заглавных букв и без ошибок! Спасибо)
Наш бот понимает и русский, и украинский язык)';  
	sendRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $date]);
}else {
/*$link = pg_connect("host=localhost port=5432 dbname=Time user=postgres password=140206ark");
$query = pg_query($link, "SELECT `name` FROM `europe` WHERE `variant1` = '$text' OR `variant2` = '$text'");*/

$result = pg_fetch_array($query);

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