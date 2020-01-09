<?php
	require_once '../class/functions.class.php';

	$db = new functions();

	$user = $db -> select('funcionario', 'COUNT(*) AS user, ad, id', 'user = "'.addslashes($_POST['user']).'" AND pass = "'.md5(addslashes($_POST['pass'])).'" GROUP BY ad, id');

	if ($user[0]['user'] > 0)
	{
		session_start();
		$_SESSION['id'] = $user[0]['id'];
		$_SESSION['is_logged'] = true;
		$_SESSION['adm'] = $user[0]['ad'];

		echo 1;
	}
	else
	{
		echo 0;
	}