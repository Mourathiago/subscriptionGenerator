<?php
	session_start();
	if (!isset($_SESSION) || $_SESSION['is_logged'] != true)
	{
		header("Location: entrar.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gerador de Assinaturas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="source/css/bootstrap-4-3-1.min.css">
    <link rel="stylesheet" href="source/css/ajax-4-8-0.min.css">
    <link rel="stylesheet" href="source/css/all.min.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark black">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Requisitar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Usuário</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script type="text/javascript" src="source/script/jquery3-4-0.min.js"></script>
    <script type="text/javascript" src="source/script/bootstrap-4-3-1.js"></script>
    <script type="text/javascript" src="source/script/popper-Bootstrap.js"></script>
    <script type="text/javascript" src="source/script/app.js"></script>
</body>
</html>