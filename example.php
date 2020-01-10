<?php
	require_once 'source/class/canvas.class.php';

	$img = new canvas();

	$modelo = 'source/img/modelos/modelo.png';
	$arquivo = 'source/img/assinaturas/modelo-admin.jpg';
	$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Admin' ;
	$setor = isset($_POST['setor']) ? $_POST['setor'] : 'Administração' ;

	$img->carrega($modelo)
		->hexa('#2b2b2b')
		->legenda($nome, 14, 15, 50, '', true, 'source/fonts/RobotoCondensed-Regular.ttf')
		->grava($arquivo);
	$img->carrega($arquivo)
		->hexa('#2b2b2b')
		->legenda($setor, 12, 15, 73, '', true, 'source/fonts/RobotoCondensed-Regular.ttf')
		->grava($arquivo);

	echo $arquivo;