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
    <link rel="stylesheet" href="source/css/style.css">
</head>
<body onload="l();">
    
    <nav class="navbar navbar-expand-lg navbar-dark black">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" onclick="l();">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="m();">Modelos</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" onclick="e();">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="b"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody"></div>
                <div class="modal-footer" id="modalFooter"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="source/script/jquery3-4-0.min.js"></script>
    <script type="text/javascript" src="source/script/popper-Bootstrap.js"></script>
    <script type="text/javascript" src="source/script/Bootstrap-4-1-3.js"></script>
    <script type="text/javascript" src="source/script/app.js"></script>
</body>
</html>