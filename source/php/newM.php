<?php
try
{
	require_once '../class/functions.class.php';
	require_once '../class/canvas.class.php';
	$db = new functions();
	$img = new canvas();

	$fileName = basename($_FILES['file']['name']);
	$fileExt = explode('/', $_FILES['file']['type']);
	$fileExt = '.'.$fileExt[1];
	$fileTempName = md5(date('Y-m-d H:i:s').$fileName).$fileExt;
	$fileError = $_FILES['file']['error'];
	$uploadFile = '../img/modelos/'.$fileTempName;
	$data['nome'] = $_POST['name'];
	$data['url'] = $fileTempName;

	if($fileError == UPLOAD_ERR_OK)
	{
		
			move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);
			$db -> insert('modelo', $data);
			$id = $db -> select('modelo', 'id', '1 ORDER BY id DESC LIMIT 1');
			$funcionarios = $db -> select('funcionario');
			foreach ($funcionarios as $funcionario)
			{
				$nome = explode(' ', $funcionario['nome']);
				$nomeTemp = count($nome) > 1 ? $nome[0].' '.$nome[count($nome)-1] : $nome[0];
				$nome = count($nome) > 1 ? $nome[0].'_'.$nome[count($nome)-1] : $nome[0];
				$arquivo = $_POST['name'].'-'.$nome.'.jpg';
				$url = '../img/assinaturas/'.$arquivo;
				$img->carrega($uploadFile)
					->hexa('#2b2b2b')
					->legenda($nomeTemp, 14, 15, 50, '', true, '../fonts/RobotoCondensed-Regular.ttf')
					->grava($url);
				$img->carrega($url)
					->hexa('#2b2b2b')
					->legenda($funcionario['setor'], 12, 15, 73, '', true, '../fonts/RobotoCondensed-Regular.ttf')
					->grava($url);
				unset($data);
				$data['modeloid'] = $id[0]['id'];
				$data['funcionarioid'] = $funcionario['id'];
				$data['url'] = $arquivo;
				$db -> insert('assinatura', $data);
			}
			echo json_encode(array(
				'error' => false,
				'message' => 'Success'
			));
	}
	else
	{
	   switch($fileError)
	   {
	     case UPLOAD_ERR_INI_SIZE:   
	          $message = 'Erro ao tentar enviar, o arquivo excede o tamanho permitido.';
	          break;
	     case UPLOAD_ERR_FORM_SIZE:  
	          $message = 'Erro ao tentar enviar, o arquivo excede o tamanho permitido.';
	          break;
	     case UPLOAD_ERR_PARTIAL:    
	          $message = 'Erro: upload não foi concluido.';
	          break;
	     case UPLOAD_ERR_NO_FILE:    
	          $message = 'Erro: nenhum arquivo enviado.';
	          break;
	     case UPLOAD_ERR_NO_TMP_DIR: 
	          $message = 'Erro: servidor sem suporte para upload de arquivo.';
	          break;
	     case UPLOAD_ERR_CANT_WRITE: 
	          $message= 'Erro: falha ao ler arquivo.';
	          break;
	     case  UPLOAD_ERR_EXTENSION: 
	          $message = 'Erro: extensão invalida.';
	          break;
	     default: $message = 'Erro.';
	              break;
	    }
	   	throw new Exception($message);
	}
}
catch(Exception $e)
{
	echo json_encode(array(
		'error' => true,
		'message' => $e -> getMessage()
	));
}