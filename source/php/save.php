<?php
	try
	{
		require_once '../class/functions.class.php';
		$db = new functions();
		if ($_POST['pass'] == "exemplo de senha")
			unset($_POST['pass']);
		else
			$_POST['pass'] = md5($_POST['pass']);
		$_POST['ad'] = $_POST['adm'] == "true" ? 1 : 0;
		unset($_POST['adm']);
		$id = $_POST['a'];
		unset($_POST['a']);
		$count = $db -> select('funcionario', 'COUNT(*) AS n', 'ad = 1');
		if ($count[0]['n'] < 2 && $_POST['ad'] == 0)
			throw new Exception('Não é possivel ficar sem um adm');
		$db -> update('funcionario', $_POST, ('id = '.$id));
		echo json_encode(array(
			'error' => false,
			'message' => 'Success'
		));
	}
	catch(Exception $e)
	{
		echo json_encode(array(
			'error' => true,
			'message' => $e -> getMessage()
		));
	}