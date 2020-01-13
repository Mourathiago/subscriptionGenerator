<?php
	try
	{
		require_once '../class/functions.class.php';
		$db = new functions();
		$assinaturas = $db -> select('assinatura', '*', ('modeloid = '.$_POST['a']));
		foreach ($assinaturas as $assinatura)
		{
			unlink('../img/assinaturas/'.$assinatura['url']);
			$db -> delete('assinatura', ('id = '.$assinatura['id']));
		}
		$db -> delete('modelo', ('id = '.$_POST['a']));
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