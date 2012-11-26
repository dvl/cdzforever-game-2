@layout('layout.base')

@section('title')
	Login
@endsection

@section('content')
	<h3>Login</h3>
	<hr>

	{{ Former::horizontal_open() }}

	{{ Former::text('username', 'Nome de usuário')->required()->min(3)->max(32)->placeholder('Ou E-mail...') }}

	{{ Former::small_password('password', 'Senha')->required()->min(3)->max(32)->placeholder('Sua senha...') }}

	{{ Former::checkbox('remember', '')->text('Lembrar senha') }}

	{{ Former::actions(Former::primary_submit('Efetuar Login'), Buttons::warning_link('Recuperar senha', 'login/recover')) }}

	{{ Former::token() }}

	{{ Former::close() }}
@endsection