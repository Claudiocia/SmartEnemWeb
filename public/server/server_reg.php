<?php

	header("Content-Type: text/html; charset=UTF-8",true);

	$f = fopen('POST_DATA.txt', 'a');
	fwrite($f, 'Nome:'.UTF8_decode($_POST['nome'])."\r\n");
	fwrite($f, 'Email: '.$_POST['email']."\r\n");
	fwrite($f, 'Matricula: '.$_POST['matricula']."\r\n");
	fwrite($f, 'Destinatario: '.UTF8_decode($_POST['destino'])."\r\n\r\n");
	fwrite($f, 'Mensagem: '.UTF8_decode($_POST['mensagem'])."\r\n\r\n");
	fwrite($f, 'Data/Hora: '.$_POST['data_msg']."\r\n\r\n");
	fwrite($f, 'Header: '.$_POST['header']."\r\n\r\n");
	fclose($f);
	
	echo 'Mensagem que veio do site recebida com sucesso<br/>';
	echo 'mensagem: '.UTF8_decode($_POST['mensagem']);
?>