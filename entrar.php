<?php
	session_start();
	if (isset($_SESSION) && $_SESSION['is_logged'] == true)
	{
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="source/css/bootstrap-4-3-1.min.css">
    <link rel="stylesheet" href="source/css/ajax-4-8-0.min.css">
    <link rel="stylesheet" href="source/css/all.min.css">
</head>
<body class="info-color-dark">
    
    <div class="container" style="margin-top: 10%">
    	<div class="row">
    		<div class="col-12 text-center mb-5 white-text">
    			<h2>Gerador de assinaturas</h2>
    		</div>
    		<div class="col-4 offset-4 mt-5">
    			<div class="card info-color white-text">
    				<div class="card-body">
						<form class="row" id="login">
							<div class="col-12">
								<label>Usuário</label>
								<input type="text" name="user" class="form-control" autocomplete="off" required>
							</div>
							<div class="col-12">
								<label>Senha</label>
								<input type="password" name="pass" class="form-control" autocomplete="off" required>
							</div>
							<div class="col-12 text-center mt-2">
								<input type="submit" class="btn btn-sm btn-primary" value="Entrar">
							</div>
						</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <script type="text/javascript" src="source/script/jquery3-4-0.min.js"></script>
    <script type="text/javascript" src="source/script/bootstrap-4-3-1.js"></script>
    <script type="text/javascript" src="source/script/popper-Bootstrap.js"></script>
    <script type="text/javascript">
    	$('#login').submit(function (e)
    	{
    		e.preventDefault();
    		let data = {user: $('input[name=user]').val(), pass: $('input[name=pass]').val()};
    		$.ajax(
    		{
    			url: 'source/php/login.php',
    			type: 'POST',
    			data: data,
    			success: function (data)
    			{
    				if (data != 0 && data != 'null')
    				{
						window.location.href = 'index.php';    					
    				}
    				else
    				{
    					alert("Usuário ou senha incorreto!\nPor Favor, tente novamente!");
    				}
    			}
    		});
    	});
    </script>
</body>
</html>