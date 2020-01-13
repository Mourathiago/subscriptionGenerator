<?php
	require_once '../class/canvas.class.php';
	require_once '../class/functions.class.php';

	$img = new canvas();
	$db = new functions();

	try 
	{
		$_POST['pass'] = md5($_POST['pass']);
		$db -> insert('funcionario', $_POST);
		$id = $db -> select('funcionario', 'id', '1 ORDER BY id DESC LIMIT 1');
		$models = $db -> select('modelo');
		$nome = explode(' ', $_POST['nome']);
		$nomeI = count($nome) > 1 ? $nome[0].' '.$nome[count($nome)-1] : $nome[0];
		$nomeF = count($nome) > 1 ? $nome[0].'_'.$nome[count($nome)-1] : $nome[0];

		foreach ($models as $model)
		{
			$modelo = '../img/modelos/'.$model['url'];
			$fileName = $model['nome'].'-'.$nomeF.'.jpg';
			$file = '../img/assinaturas/'.$fileName;
			$img->carrega($modelo)
				->hexa('#2b2b2b')
				->legenda($nomeI, 14, 15, 50, '', true, '../fonts/RobotoCondensed-Regular.ttf')
				->grava($file);
			$img->carrega($file)
				->hexa('#2b2b2b')
				->legenda($_POST['setor'], 12, 15, 73, '', true, '../fonts/RobotoCondensed-Regular.ttf')
				->grava($file);
			unset($data);
			$data['modeloid'] = $model['id'];
			$data['funcionarioid'] = $id[0]['id'];
			$data['url'] = $fileName;
			$db -> insert('assinatura', $data);
		}
		echo json_encode(array(
			'error' => false,
			'message' => "Success"
		));
	}
	catch (Exception $e)
	{
		echo json_encode(array(
			'error' => true,
			'message' => $e -> getMessage()
		));
	}