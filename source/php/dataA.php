<?php
	require_once '../class/functions.class.php';

	$db = new functions();

	$modelos = $db -> select('modelo');

	$data = '<div class="row"><div class="col-12 scroll h-3"><table class="table table-bordered table-striped table-hover text-center"><thead><tr><th>Nome</th><th>Vizualizar</th><th>Assinatura do Funcionario</th></tr></thead><tbody>';

	foreach ($modelos as $modelo)
	{
		$data .= '<tr><td>'.$modelo['nome'].'</td><td><button class="btn btn-sm btn-primary" onclick="n('."'".$modelo['url']."'".', '."'".$_POST['id']."'".')">Vizualizar</button></td><td>';
		$img = $db -> select('assinatura', '*', 'modeloid = '.$modelo['id'].' AND funcionarioid = '.$_POST['id']);
		$data .= $img ? '<button class="btn btn-sm btn-primary" onclick="o('."'".$img[0]['url']."'".', '."'".$_POST['id']."'".');">Vizualizar</button>' : '<button class="btn btn-sm btn-primary" onclick="p({mid:'.$modelo['id'].', fid:'.$_POST['id'].'});">Gerar</button>' ;
		$data .= '</td></tr>';
	}

	$data .= '</tbody></table></div></div>';

	echo $data;