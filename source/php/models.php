<?php
	require_once '../class/functions.class.php';

	$db = new functions();

	session_start();

	$models = $db -> select('modelo');

	$data = '<div class="col-12 text-center"><h3>Modelos</h3></div>';

	$data .= $_SESSION['adm'] ? '<div class="col-12 text-right"><button class="btn btn-sm btn-success" onclick="j();">Novo modelo</button></div>' : '';

	$data .= '<div class="col-12 scroll h-5"><table class="table table-bordered table-striped table-hover text-center"><thead><tr><th>Nome</th><th>Visualizar</th></tr></thead><tbody>';

	foreach ($models as $model)
	{
		$data .= '<tr><td>'.$model['nome'].'</td><td><button class="btn btn-sm btn-primary" onclick="k('.$model['id'].');">Visualizar</button></td></tr>';
	}

	$data .= '</tbody></table></div>';

	echo $data;