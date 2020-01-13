<?php
	require_once '../class/canvas.class.php';
	require_once '../class/functions.class.php';

	$img = new canvas();
	$db = new functions();

	$url = $db -> select('modelo', '*', 'id = '.$_POST['a']);
	$dados = $db -> select('funcionario', '*', 'id = '.$_POST['b']);
	$nome = explode(' ', $dados[0]['nome']);
	$modelo = '../img/modelos/'.$url[0]['url'];
	$nomeI = count($nome) > 1 ? $nome[0].' '.$nome[count($nome)-1] : $nome[0];
	$nomeF = count($nome) > 1 ? $nome[0].'_'.$nome[count($nome)-1] : $nome[0];
	$file =  $url[0]['nome'].'-'.$nomeF.'.jpg';
	$fileName = '../img/assinaturas/'.$file;
	$data['modeloid'] = $_POST['a'];
	$data['funcionarioid'] = $_POST['b'];
	$data['url'] = $file;

	try
	{
		$img->carrega($modelo)
			->hexa('#2b2b2b')
			->legenda($nomeF, 14, 15, 50, '', true, '../fonts/RobotoCondensed-Regular.ttf')
			->grava($fileName);
		$img->carrega($fileName)
			->hexa('#2b2b2b')
			->legenda($dados[0]['setor'], 12, 15, 73, '', true, '../fonts/RobotoCondensed-Regular.ttf')
			->grava($fileName);
		$db -> insert('assinatura', $data);

		echo json_encode(array(
			'error' => false,
			'message' => 'Success'
		));
	}
	catch(Exception $e)
	{
		echo json_encode(array(
			'error' => true,
			'message' => $e
		));
	}