<?php

	header("Content-Type: text/html; charset=UTF-8",true);

	$f = fopen('POST_DATA.txt', 'a');
	fwrite($f, 'Mensagem: '.UTF8_decode($_POST['local'])."\r\n\r\n");
	fwrite($f, 'Data/Hora: '.$_POST['data']."\r\n\r\n");
	fwrite($f, 'Header: '.$_POST['header']."\r\n\r\n");
	fclose($f);
	
	echo "Mensagem que veio do served recebida com sucesso\r\n";
	echo "mensagem: ".UTF8_decode($_POST['local']);
?>