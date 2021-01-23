<?php
$host = "host=localhost";
$port = "port=5432";
$dbname = "dbname=Time";
$user = "user=postgres password=140206ark";
$link = pg_connect("$host $port $dbname $user") or die('Не удалось соединиться: ' . pg_last_error());
?>