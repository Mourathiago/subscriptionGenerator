<?php
	try
	{
		require_once '../class/functions.class.php';
		$db = new functions();
		$data = $db -> select('funcionario', '*', ('id = '.$_POST['a']));
		$count = $db -> select('funcionario', 'COUNT(*) AS n', 'ad = 1');
		$countTwo = $db -> select('funcionario', 'COUNT(*) AS n');
		if ($count[0]['n'] < 2 && $data[0]['ad'] == 1 || $countTwo[0]['n'] < 2)
			throw new Exception('Não é possivel ficar sem um adm');
		$assinaturas = $db -> select('assinatura', '*', ('funcionarioid = '.$_POST['a']));
		foreach ($assinaturas as $assinatura)
		{
			unlink('../img/assinaturas/'.$assinatura['url']);
			$db -> delete('assinatura', ('id = '.$assinatura['id']));
		}
		$db -> delete('funcionario', ('id = '.$_POST['a']));
		echo json_encode(array(
			'error' => false,
			'message' => 'Success'
		));
	}
	catch (Exception $e)
	{
		echo json_encode(array(
			'error' => true,
			'message' => $e -> getMessage()
		));
	}