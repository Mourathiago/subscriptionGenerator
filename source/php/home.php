<?php
	require_once '../class/functions.class.php';
	$db = new functions();

	session_start();

	$data = '';

	if ($_SESSION['adm'])
	{
		$funcionarios = $db -> select('funcionario');

		$data .= '<div class="col-12 text-center"><h3>Funcionários</h3></div><div class="col-12 text-right"><button class="btn btn-sm btn-success" onclick="n();">Novo funcionario</button></div><div class="col-12 scroll h-5"><table class="table table-bordered table-striped table-hover text-center"><thead><tr><th>Nome</th><th>Setor</th><th>Visualizar assinaturas</th><th>Dados</th></tr></thead><tbody>';

		foreach ($funcionarios as $funcionario)
		{
			$data .= '<tr><td>'.$funcionario['nome'].'</td><td>'.$funcionario['setor'].'</td><td><button class="btn btn-sm btn-primary" onclick="s('."'".$funcionario['id']."'".');">Visualizar</button></td><td><button class="btn btn-sm btn-primary" onclick="f('."'".$funcionario['id']."'".');">Dados do Funcionario</button></td></tr>';
		}

		$data .= '</tbody></table></div>';
	}
	else
	{
		$assinaturas = $db -> select('modelo m, assinatura a', '`a`.`url` AS assinatura, `m`.`nome` AS modelo', '`a`.`modeloid` = `m`.`id` AND `a`.`funcionarioid` = '.$_SESSION['id']);

		$data .= '<div class="col-12 text-center"><h3>Assinaturas</h3></div><div class="col-12"><table class="table table-bordered table-striped table-hover text-center"><thead><tr><th>Nome do Modelo</th><th>Visualizar</th><th>Baixar</th></tr></thead><tbody>';

		foreach ($assinaturas as $assinatura)
		{
			$data .= '<tr><td>'.$assinatura['modelo'].'</td><td><button class="btn btn-sm btn-primary" onclick="v('."'".$assinatura['assinatura']."'".');">Visualizar</button></td><td><button class="btn btn-sm btn-primary" onclick="d('."'".$assinatura['assinatura']."'".');">Baixar</button></td></tr>';
		}

		$data .= '</tbody></table></div>';
	}

	echo $data;