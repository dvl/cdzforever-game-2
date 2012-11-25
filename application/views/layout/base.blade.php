<!DOCTYPE html>
<html>
<head>
	<title>CDZForever - @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	{{ Asset::styles() }}
</head>
<body>

	<div class="container" id="wrapper">
			<header></header>

			<div class="row">
				<div class="span3" id="menu">
					<br style="clear: both">
					@include('layout.menu')
				</div>
				<div class="span9" id="content">
					@yield('content')
				</div>
			</div>

			<footer>
				&copy; CDZForever 2003-2012<br />Imagens e Personagens copyright &copy; Masami Kurumada / Shueisha, Toei Animation. Todos os direitos reservados.
			</footer>
	</div>  


{{ Asset::scripts() }}

{{ Anbu::render() }}
</body>
</html>