<?php
	$db_link=@mysqli_connect("127.0.0.1","BHN-Seminar","nttucsie");
	if(!$db_link){
		die("資料庫連線失敗<br>");
	}else{
	}
	mysqli_query($db_link, 'SET NAMES utf8');
	$seldb=@mysqli_select_db($db_link,"RFID");
	mysqli_query($seldb, 'SET NAMES utf8');
	if(!$seldb){
		die("資料庫選擇失敗<br>");
	}else{
	}
?>