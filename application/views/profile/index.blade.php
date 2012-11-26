@layout('layout.base')

@section('title')
	Perfil
@endsection

@section('content')
<pre>
	{{ print_r($user) }}
</pre>
@endsection