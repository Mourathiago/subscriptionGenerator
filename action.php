<?php
require_once "canvas.php";

$img = new canvas();
$padrao = 'modelo_assinatura.png';
$arquivo = 'sergionapolitano-padrao.jpg';
$dados['nome'] = 'Sergio Napolitano';
$dados['setor'] = 'Informatica';

$img->carrega($padrao)
	->hexa('#2b2b2b')
	->legenda($dados['nome'], 14, 15, 50, '', true, 'fonts/RobotoCondensed-Regular.ttf')
	->grava($arquivo);

$img->carrega($arquivo)
	->hexa('#2b2b2b')
	->legenda($dados['setor'], 12, 15, 73, '', true, 'fonts/RobotoCondensed-Regular.ttf')
	->grava($arquivo);

echo $arquivo;								
?>