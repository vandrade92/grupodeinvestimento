<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Acesse o sistema</h3>
				<div class="d-flex justify-content-end social_icon">
					<span id="social_icon_fb"><i class="fab fa-facebook-square"></i></span>
					<span id="social_icon_gl"><i class="fab fa-google-plus-square"></i></span>
					<span id="social_icon_tw"><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				{!! Form::open(['route' => 'user.login','method' => 'post']) !!}
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>

						<input name="username" type="text" class="form-control" placeholder="E-mail">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="password" type="password" class="form-control" placeholder="Senha">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Lembrar-me
					</div>
					<div class="form-group">
						<input type="submit" value="Entrar" class="btn float-right login_btn">
					</div>
				 {!! Form::close()!!}
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center linkregister">
					Não tem uma conta?<a href="#">Registre-se</a>
				</div>
				<div class="d-flex justify-content-center linkforgot">
					<a href="#">Esqueceu sua senha?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<!-- LOGIN ANTIGO USADO PELO GUILHERME AQUINO. SOURCE: https://bootsnipp.com/snippets/vl4R7

<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="utf-8">
      <title>Login | INVESTINDO</title>
      <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
      <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
  </head>
  <body>

    <div class="background">

    </div>

    <section id="conteudo-view" class="login">

      <h1>Investindo</h1>
      <h3>O nosso gerenciador de investimento</h3>

      {!! Form::open(['route' => 'user.login','method' => 'post']) !!}

      <p>Acesse o Sistema</p>

      <label>
        {!! Form::text('username', null,['class' => 'input', 'placeholder' => "Usuário"]) !!}
      </label>

      <label>
          {!! Form::password('password', ['placeholder' => "Senha"]) !!}
      </label>

      {!! Form::submit('Entrar') !!}

      {!! Form::close()!!}

    </section>


  </body>
</html>
-->
