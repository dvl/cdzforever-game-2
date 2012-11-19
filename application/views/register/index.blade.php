@layout('layout.base')

@section('title')
	Registro
@endsection

@section('content')
	@if (Session::has('errors'))
		<div class="alert alert-error">Por favor, corrija os seguintes erros antes de continuar:
			{{ HTML::ul($errors); }}
		</div>
	@else
		<p>Preencha o formulário abaixo para criar sua conta e começe a jogar agora mesmo.</p>
	@endif
	<hr>
	{{ Form::horizontal_open() }}

	{{ Form::control_group(Form::label('username', 'Usuário:'), Form::xlarge_text('username', null, array('placeholder' => 'Seu nick no jogo...'))) }}

	{{ Form::control_group(Form::label('email', 'E-Mail:'), Form::xlarge_text('email', null, array('placeholder' => 'E-mail para confirmação do cadastro..'))) }}

	{{ Form::control_group(Form::label('password', 'Senha:'), Form::password('password', array('placeholder' => 'Sua senha...'))) }}
	{{ Form::control_group(Form::label('password-check', 'Confirme:'), Form::password('password-check', array('placeholder' => 'Confirmação...')), '', Form::block_help('Durante a fase de desenvolvimento o registro de novos usuários é registro a convidados.')) }}

	{{ Form::control_group(Form::label('genre', 'Sexo:'),Form::select('genre', array('Masculino', 'Feminino'))) }}

	{{ Form::control_group(Form::label('invite', 'Código:'), Form::xlarge_text('invite', null, array('placeholder' => 'Código do convite recebido :)'))) }}

	{{ Form::control_group(Form::label('checkbox', ''), Form::labelled_checkbox('rules', 'Li e concordo com as '.HTML::link('internal/rules','Regras').''), '', Form::labelled_checkbox('terms', 'Li e concordo com os '.HTML::link('internal/terms','Termos de Uso').'', 'terms')) }}

	{{ Form::actions(array(Buttons::primary_submit('Enviar'))) }}
	{{ Form::token() }}
	{{ Form::close() }}
@endsection