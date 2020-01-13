<?php
	require_once '../class/functions.class.php';

	$db = new functions();

	$modelos = $db -> select('modelo');

	$data = '<div class="row"><div class="col-12 scroll h-3"><table class="table table-bordered table-striped table-hover text-center"><thead><tr><th>Nome</th><th>Vizualizar</th><th>Assinatura do Funcionario</th></tr></thead><tbody>';

	foreach ($modelos as $modelo)
	{
		$data .= '<tr><td>'.$modelo['nome'].'</td><td><button class="btn btn-sm btn-primary" onclick="m({a: '."'".$_POST['a']."'".', b:'."'".$modelo['url']."'".'})">Vizualizar</button></td><td>';
		$img = $db -> select('assinatura', '*', 'modeloid = '.$modelo['id'].' AND funcionarioid = '.$_POST['a']);
		$data .= $img ? '<button class="btn btn-sm btn-primary" onclick="n({a:'."'".$_POST['a']."'".', b:'."'".$img[0]['url']."'".'});">Vizualizar</button>' : '<button class="btn btn-sm btn-primary" onclick="o({a:'.$modelo['id'].', b:'.$_POST['a'].'});">Gerar</button>' ;
		$data .= '</td></tr>';
	}

	$data .= '</tbody></table></div></div>';

	echo $data;