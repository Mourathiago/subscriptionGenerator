function a()
{
	$.ajax(
	{
		url: 'source/php/home.php',
		success: function (a)
		{
			if (a != 0 && a != 'null')
			{
				$('#b').html(a);
			}
		}
	});
}

function b()
{
	$.ajax(
	{
		url: 'source/php/models.php',
		success: function (a)
		{
			if (a != 0 && a != 'null')
			{
				$('#b').html(a);
			}
		}
	});
}

function c()
{
	$.ajax(
	{
		url: 'source/php/exit.php',
		success: function (a)
		{
			window.location.href = 'entrar.php';
		}
	});
}

function d()
{
	let a = 'Novo Funcionário', b, c = {};
	b = '<form id="new" class="row"><div class="col-6"><label>Nome</label><input type="text" class="form-control" name="nome" autocomplete="off" autofocus required></div><div class="col-6"><label>Setor</label><input type="text" class="form-control" name="setor" autocomplete="off" required></div><div class="col-6"><label>Login</label><input type="text" class="form-control" name="user" autocomplete="off" required></div><div class="col-6"><label>Senha</label><input type="password" class="form-control" name="pass" autocomplete="off" required></div><div class="col-12 text-right"><input type="submit" class="btn btn-sm btn-success" value="Criar"></div></form>';
	r(a, b);
	$('#new').submit(function (e)
	{
		e.preventDefault();

		let d = $('#new').serializeArray();

	    $.each(d, function(i, field){
			c[field.name] = field.value;
		});

		$.ajax(
		{
			type: 'POST',
			data: c,
			url: 'source/php/newF.php',
			success: function (e)
			{
				e = window["s"](e);
				if(e.error)
				{
					alert('Ocorreu um erro durante o processo.\nContate o suporte técnico');
					console.log(e.message);
				}
				else
				{
					window["a"]();
					r('', '', '', 'hide');
				}
			}
		});
	});
}

function e(a)
{
	$.ajax(
	{
		url:'source/php/dataA.php',
		type:'POST',
		data:a,
		success:function(b)
		{
			r('Assinaturas', b);
		}
	});
}

function f(a)
{
	$.ajax(
	{
		url:'source/php/dataF.php',
		type:'POST',
		data:a,
		success: function (b)
		{
			if (b != 0 && b != 'null')
			{
				r('Dados do Funcionário', b);
			}
		}
	});
}

function g(a)
{
	let b = '', c = '<div class="row"><div class="col-12 text-center"><img src="source/img/'+a.a+'"></div></div>';
	r(b, c);
}

function h(a)
{
	fetch('source/img/'+a.a)
	  .then(resp => resp.blob())
	  .then(blob => {
	    const b = window.URL.createObjectURL(blob);
	    const c = document.createElement('a');
	    c.style.display = 'none';
	    c.href = b;
	    c.download = 'assinatura.jpg';
	    document.body.appendChild(c);
	    c.click();
	    window.URL.revokeObjectURL(b);
	    c.remove();
	  })
	  .catch((e) => console.log(e));
}

function i()
{
	let a = 'Novo Modelo', b;
	b = '<form id="new" class="row"><div class="col-6"><label>Nome</label><input type="text" class="form-control" name="nome" autocomplete="off" autofocus required></div><div class="col-6"><label>Imagem</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Imagem</span></div><div class="custom-file"><input type="file" class="custom-file-input" id="img" ><label class="custom-file-label" for="img">Escolha uma imagem</label></div></div></div><div class="col-12 text-right"><input type="submit" class="btn btn-sm btn-success" value="Criar"></div></form>';
	r(a, b);
	$('#new').submit(function (e)
	{
		e.preventDefault();
		let c = new FormData();
		c.append('file', $('#img')[0].files[0]);
		c.append('name', $('input[name=nome]').val());

		$.ajax(
		{
			url:'source/php/newM.php',
	       type:'POST',
	       data:c,
	       processData: false,
	       contentType: false,
	       success : function(d)
	       {
	           d = window["s"](d);
	           if(d.error)
				{
					alert('Ocorreu um erro durante o processo.\nContate o suporte técnico');
					console.log(d.message);
				}
				else
				{
					window["b"]();
					r('', '', '', 'hide');
				}
	       }
		});
	});
}

function j(a)
{
	$.ajax(
	{
		url:'source/php/dataM.php',
		type:'POST',
		data:a,
		success: function (b)
		{
			if (b != 0 && b != 'null')
			{
				r('Modelo', b);
			}
		}
	});
}

function k(a)
{
	let c = {user:$('input[name=user]').val(),pass:$('input[name=pass]').val(),adm:$('input[name=admin]')[0]['checked'],a:a};
	$.ajax(
	{
		url:'source/php/save.php',
		type:'POST',
		data:c,
		success:function(b)
		{
			b = window["s"](b);
			if(b.error)
			{
				alert('Ocorreu um erro durante o processo.\nContate o suporte técnico');
				console.log(b.message);
			}
			else
			{
				alert('Salvo com sucesso');
				r('', '', '', 'hide');
			}
		}
	});
}

function l(a)
{
	$.ajax(
	{
		url:'source/php/delete.php',
		type:'POST',
		data:a,
		success:function(b)
		{
			b = window["s"](b);
			if(b.error)
			{
				alert('Ocorreu um erro durante o processo.\nContate o suporte técnico');
				console.log(b.message);
			}
			else
			{
				alert('Deletado com sucesso');
				window["a"]();
				r('', '', '', 'hide');
			}
		}
	});
}

function m(a)
{
	$('#modalBody').animate(
	{
		marginLeft: '300px',
		opacity: '0'
	}, function ()
	{
		$('#modalBody').html('<div class="row"><div class="col-12"><button class="btn btn-sm btn-secondary" onclick="p({a:'+a.a+'})">Voltar</button></div><div class="col-12"><img src="source/img/modelos/'+a.b+'"></div></div>')
	});

	$('#modalBody').animate(
	{
		marginLeft: '0',
		opacity: '1'
	});
}

function n(a)
{
	$('#modalBody').animate(
	{
		marginLeft: '300px',
		opacity: '0'
	}, function ()
	{
		$('#modalBody').html('<div class="row"><div class="col-12"><button class="btn btn-sm btn-secondary" onclick="p({a:'+a.a+'})">Voltar</button></div><div class="col-12"><img src="source/img/assinaturas/'+a.b+'"></div></div>')
	});

	$('#modalBody').animate(
	{
		marginLeft: '0',
		opacity: '1'
	});
}

function o(a)
{
	$.ajax(
	{
		url:'source/php/generator.php',
		type:'POST',
		data:a,
		success:function(b)
		{
			b = window["s"](b);
			if(b.error)
			{
				alert('Ocorreu um erro durante o processo.\nContate o suporte técnico');
				console.log(b.message);
			}
			else
			{
				f(a.b);
			}
		}
	});
}

function p(a)
{
	$('#modalBody').animate(
	{
		marginLeft: '300px',
		opacity: '0'
	}, function ()
	{
		$.ajax(
		{
			url:'source/php/dataA.php',
			type:'POST',
			data:a,
			success:function(b)
			{
				$('#modalBody').html(b);
			}
		});
	});

	$('#modalBody').animate(
	{
		marginLeft: '0',
		opacity: '1'
	});
}

function q(a)
{
	$.ajax(
	{
		url:'source/php/deleteM.php',
		type:'POST',
		data:a,
		success:function(b)
		{
			b = window["s"](b);
			if(b.error)
			{
				alert('Ocorreu um erro durante o processo.\nContate o suporte técnico');
				console.log(b.message);
			}
			else
			{
				alert('Deletado com sucesso');
				window["b"]();
				r('', '', '', 'hide');
			}
		}
	});
}

function r(a = '', b = '', c = '', d = 'show')
{
	$('#modalTitle').html(a);
	$('#modalBody').html(b);
	$('#modalFooter').html(c);
	$('#modal').modal(d);
}

function s(a)
{
	return JSON.parse(a);
}

$('.modal').on('shown.bs.modal', function ()
{
    $(this).find('[autofocus]').focus();
});