@layout('layout.base')

@section('content')
<div class="hero-unit">
	<h2>{{ __('Bem vindo(a),') }}</h2>
	<p>{{ __('Seja um Cavaleiro, lute por seu Deus, faça parte do CDZForever!') }}</p>
	<p><a href="http://laravel/register" class="btn btn-primary btn-large">Cadastro</a> <a href="http://laravel/login" class="btn btn-success btn-large">Login</a></p>
</div>
<div class="row">		
	<div class="span4">
		<h2>Browser Game</h2>
		<p>Como podem observar estamos portando o bot para um browser game, algumas caracteristicas serão mantidas outras sofrarão mudanças um tanto...</p>
		<p><a href="http://laravel/news/1" class="btn">Ler tudo &raquo;</a></p>
	</div>

	<div class="span4">
		<h2>Browser Game</h2>
		<p>Como podem observar estamos portando o bot para um browser game, algumas caracteristicas serão mantidas outras sofrarão mudanças um tanto...</p>
		<p><a href="http://laravel/news/1" class="btn">Ler tudo &raquo;</a></p>
	</div>
</div>
@endsection