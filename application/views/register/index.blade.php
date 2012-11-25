@layout('layout.base')

@section('title')
	Registro
@endsection

@section('content')
	<h3>Criar nova conta</h3>
	<p>Preencha o formulário abaixo para criar sua conta e começe a jogar agora mesmo.</p>
	<hr>

	{{ Former::horizontal_open()->method('POST')  }}

	{{ Former::text('username', 'Usuário')->required()->min(3)->max(32)->placeholder('Seu nick no jogo...') }}

	{{ Former::xlarge_text('email', 'E-mail')->required()->min(3)->max(32)->placeholder('E-mail para confirmação do cadastro...') }}

	{{ Former::small_password('password', 'Senha')->required()->min(3)->max(32)->placeholder('Sua senha...') }}

	{{ Former::small_password('password-check', 'Confirmação')->required()->min(3)->max(32)->placeholder('Confirmação...') }}

	{{ Former::select('sex', 'Sexo')->options(array('M' => 'Masculino', 'F' => 'Feminino'))->required() }}

	{{ Former::select('state', 'Estado')->fromQuery(State::all(), 'name')->required() }}

	{{ Former::xlarge_text('invite', 'Convite')->required()->min(3)->max(32)->placeholder('Código do convite recebido :)') }}

	{{ Former::checkbox('rules', '')->text('Li e concordo com as '.HTML::link('internal/rules','Regras do jogo').' e com os '.HTML::link('internal/terms','Termos de Uso').'.')->required() }}

	{{ Former::actions(Former::primary_submit('Enviar'), Former::inverse_reset('Limpar')) }}

	{{ Former::token() }}

	{{ Former::close() }}
@endsection