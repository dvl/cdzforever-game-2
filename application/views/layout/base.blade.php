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

	<div class="container">
		<div class="row">
			<header class="span12">
				
			</header>

			<div class="row span3" style="margin-left: 0px;">
				@if (Sentry::check())
					@include('layout.info')
				@endif
				<div class="span3" id="menu">
					<br style="clear: both">
					@include('layout.menu')
				</div>
			</div>

			<div class="row span9">
				<div class="span9" id="content">
					@if (Session::has('info'))
						{{ Alert::info(Session::get('info'), false) }}						
					@elseif (Session::has('error'))
						{{ Alert::error(Session::get('error'), false) }}		
					@elseif (Session::has('success'))
						{{ Alert::success(Session::get('success'), false) }}						
					@endif

					@yield('content')
				</div>
			</div>
		</div>
	</div>  

	<div class="container">
		<div class="row">
			<footer class="span12">
				&copy; CDZForever 2003-{{ date('Y') }}<br />Imagens e Personagens copyright &copy; Masami Kurumada / Shueisha, Toei Animation. Todos os direitos reservados.
			</footer>
		</div>
	</div>


{{ Asset::scripts() }}

{{ Anbu::render() }}
</body>
</html>