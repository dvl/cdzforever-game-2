@layout('layout.base')

@section('title')
    404
@endsection

@section('content')
<?php $messages = array('We need a map.', 'I think we\'re lost.', 'We took a wrong turn.'); ?>

<h1><?php echo $messages[mt_rand(0, count($messages) - 1)]; ?></h1>
<p>Sorry, but the page you were trying to view does not exist.</p>
<p>It looks like this was the result of either:</p>
<ul>
    <li>a mistyped address</li>
    <li>an out-of-date link</li>
</ul>
<p>Perhaps you would like to go to our <?php echo HTML::link('/', 'home page'); ?>?</p>
@endsection
