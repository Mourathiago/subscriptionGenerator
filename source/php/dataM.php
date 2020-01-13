<?php
	session_start();
	require_once '../class/functions.class.php';
	$db = new functions();
	$dados = $db -> select('modelo', '*', ('id = '.$_POST['a']));
	$data = '<div class="row"><div class="col-12 text-center"><img src="source/img/modelos/'.$dados[0]['url'].'"></div>';
	$data .= $_SESSION['adm'] == 1 ? '<div class="col-12 text-right"><button class="btn btn-sm btn-danger" onclick="q({a:'.$_POST['a'].'});">Excluir</button></div>' : '</div>';
	echo $data;