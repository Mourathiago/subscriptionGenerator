<?php
	require_once '../class/functions.class.php';

	$db = new functions();

	$data = $db -> select('funcionario', '*', 'id = '.$_POST['id']);

	$ad = $data[0]['ad'] ? 'checked' : '';

	$dados = '<div class="row"><div class="col-6"><label>Nome</label><input type="text" class="form-control" value="'.$data[0]['nome'].'" readonly></div><div class="col-6"><label>Setor</label><input type="text" class="form-control" value="'.$data[0]['setor'].'" readonly></div><div class="col-6"><label>Usuário</label><input type="text" class="form-control" value="'.$data[0]['user'].'" name="user"></div><div class="col-6"><label>Senha</label><input type="password" class="form-control" value="exemplo de senha" name="pass"></div><div class="col-6 mt-3 text-center"><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="admin" '.$ad.'><label class="custom-control-label" for="defaultUnchecked">Admin</label></div></div><div class="col-6 mt-3 text-center"><button class="btn btn-sm btn-success" onclick="l('.$_POST['id'].')">Salvar</button><button class="btn btn-sm btn-danger" onclick="m('.$_POST['id'].');">Excluir</button></div></div>';

	echo $dados;