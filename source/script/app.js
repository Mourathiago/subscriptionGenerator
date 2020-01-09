function l()
{
	$.ajax(
	{
		url: 'source/php/home.php',
		success: function (data)
		{
			if (data != 0 && data != 'null')
			{
				$('#b').html(data);
			}
		}
	});
}

function m()
{
	$.ajax(
	{
		url: 'source/php/models.php',
		success: function (data)
		{
			if (data != 0 && data != 'null')
			{
				$('#b').html(data);
			}
		}
	});
}

function v(u)
{
	let h = '', b = '<div class="row"><div class="col-12 text-center"><img src="source/img/'+u+'"></div></div>';
	c(h, b);
}

function d(u)
{
	fetch('source/img/'+u)
	  .then(resp => resp.blob())
	  .then(blob => {
	    const url = window.URL.createObjectURL(blob);
	    const a = document.createElement('a');
	    a.style.display = 'none';
	    a.href = url;
	    a.download = 'assinatura.jpg';
	    document.body.appendChild(a);
	    a.click();
	    window.URL.revokeObjectURL(url);
	    a.remove();
	  })
	  .catch((e) => console.log(e));
}

function f(i)
{
	
}

function s(i)
{
	
}

function a(i)
{
	
}

function n()
{
	let h = 'Novo Funcionário', b, result = {};
	b = '<form id="new" class="row"><div class="col-6"><label>Nome</label><input type="text" class="form-control" name="nome" autocomplete="off" autofocus required></div><div class="col-6"><label>Setor</label><input type="text" class="form-control" name="setor" autocomplete="off" required></div><div class="col-6"><label>Login</label><input type="text" class="form-control" name="login" autocomplete="off" required></div><div class="col-6"><label>Senha</label><input type="password" class="form-control" name="senha" autocomplete="off" required></div><div class="col-12 text-right"><input type="submit" class="btn btn-sm btn-success" value="Criar"></div></form>';
	c(h, b);
	$('#new').submit(function (e)
	{
		e.preventDefault();

		let a = $('#new').serializeArray();

	    $.each(a, function(i, field){
			result[field.name] = field.value;
		});

		$.ajax(
		{
			type: 'POST',
			data: result,
			url: 'source/php/newF.php',
			success: function (data)
			{
				console.log(data);
			}
		});
	});
}

function p()
{
	let h = 'Novo Modelo', b;
	b = '<form id="new" class="row"><div class="col-6"><label>Nome</label><input type="text" class="form-control" name="nome" autocomplete="off" autofocus required></div><div class="col-6"><label>Imagem</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Imagem</span></div><div class="custom-file"><input type="file" class="custom-file-input" id="img" ><label class="custom-file-label" for="img">Escolha uma imagem</label></div></div></div><div class="col-12 text-right"><input type="submit" class="btn btn-sm btn-success" value="Criar"></div></form>';
	c(h, b);
	$('#new').submit(function (e)
	{
		e.preventDefault();
		let a = new FormData();
		a.append('file', $('#img')[0].files[0]);
		a.append('name', $('input[name=nome]').val());

		$.ajax(
		{
			url : 'source/php/newM.php',
	       type : 'POST',
	       data : a,
	       processData: false,
	       contentType: false,
	       success : function(data)
	       {
	           console.log(data);
	       }
		});
	});
}

function c(h = '', b = '', f = '')
{
	$('#modalTitle').html(h);
	$('#modalBody').html(b);
	$('#modalFooter').html(f);
	$('#modal').modal('show');
}

function e()
{
	$.ajax(
	{
		url: 'source/php/exit.php',
		success: function (data)
		{
			window.location.href = 'entrar.php';
		}
	});
}

$('.modal').on('shown.bs.modal', function ()
{
    $(this).find('[autofocus]').focus();
});