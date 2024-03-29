@layout('layout.base')

@section('title')
    403
@endsection

@section('content')
<?php $messages = array('Ouch.', 'Oh no!', 'Whoops!'); ?>
<h1><?php echo $messages[mt_rand(0, count($messages) - 1)]; ?></h1>

<h3>What does this mean?</h3>

<p>
Something went wrong on our servers while we were processing your request.
We're really sorry about this, and will work hard to get this resolved as
soon as possible.
</p>

<p>Perhaps you would like to go to our <?php echo HTML::link('/', 'home page'); ?>?</p>
@endsection
