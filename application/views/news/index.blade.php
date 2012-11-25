@layout('layout.base')

@section('title')
Início
@endsection

@section('content')
<div class="hero-unit">
	<h2>{{ __('Bem vindo(a),') }}</h2>
	<p>{{ __('Seja um Cavaleiro, lute por seu Deus, faça parte do CDZForever!') }}</p>
	<p><a href="http://laravel/register" class="btn btn-primary btn-large">Cadastro</a> <a href="http://laravel/login" class="btn btn-success btn-large">Login</a></p>
</div>

<div class="row" style="margin: -10px auto">		
	<div class="span4" >
				<h2 class="muted">Browser Game</h2>
				<p><span class="label label-success">Por: dvl em 18/11/2012 as 22:18</span></p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
				<p><a class="btn" href="#"><i class="icon-ok"></i> Ler tudo &raquo;</a></p>
	</div>

	<div class="span4">
				<h2 class="muted">Browser Game</h2>
				<p><span class="label label-success">Por: dvl em 18/11/2012 as 22:18</span></p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
				<p><a class="btn" href="#"><i class="icon-ok"></i> Ler tudo &raquo;</a></p>
	</div>
</div>
@endsection