<?php
	require_once '../class/functions.class.php';

	$db = new functions();

	$user = $db -> select('COUNT(*) AS user, ad', 'funcionario', 'user = "'.addslashes($_POST['user']).'" AND pass = "'.md5(addslashes($_POST['pass'])).'" GROUP BY ad');

	if ($user[0]['user'] > 0)
	{
		session_start();
		$_SESSION['is_logged'] = true;
		$_SESSION['adm'] = $user[0]['ad'];

		echo 1;
	}
	else
	{
		echo 0;
	}