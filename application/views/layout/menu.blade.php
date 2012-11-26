<?php

if (!Sentry::check()) {
	$links = array(
		array(
			'label' =>'Login',
			'url' => URL::to('login'), 
			'icon' => 'lock',
			'active' => false
		),
		array(
			'label' =>'Registro',
			'url' => URL::to('register'), 
			'icon' => 'home',
			'active' => false
		),
	);
}

else {
	$links = array(
		array(
			'label' => __('Perfil'),
			'url' => URL::to('profile'), 
			'icon' => 'user',
			'active' => false
		),
		array(
			'label' => __('Treinos'),
			'url' => URL::to('pratices'), 
			'icon' => 'book',
			'active' => false
		),
		array(
			'label' => __('Luta'),
			'url' => URL::to('fight'), 
			'icon' => 'fire',
			'count' => 10,
			'active' => false
		),
		array(
			'label' => __('Hospital'),
			'url' => URL::to('hospital'), 
			'icon' => 'heart',
			'active' => false
		),
		array(
			'label' => __('Loja'),
			'url' => URL::to('store'), 
			'icon' => 'shopping-cart',
			'active' => false
		),
		array(
			'label' => __('Armadura'),
			'url' => URL::to('armor'), 
			'icon' => 'leaf',
			'active' => false
		),
		array(
			'label' => __('Quiz'),
			'url' => URL::to('quiz'), 
			'icon' => 'check',
			'active' => false
		),
		array(
			'label' => __('Méritos'),
			'url' => URL::to('bonus'), 
			'icon' => 'gift',
			'active' => false
		),
		array(
			'label' => __('Estatísticas'),
			'url' => URL::to('statics'), 
			'icon' => 'list-alt',
			'active' => false
		),
		array(
			'label' => __('Mensagens'),
			'url' => URL::to('mail'), 
			'icon' => 'envelope',
			'count' => 10,
			'active' => false
		),
		array(
			'label' => __('Relatórios'),
			'url' => URL::to('report'), 
			'icon' => 'briefcase',
			'count' => 10,
			'active' => false
		),
		array(
			'label' => __('Logout'),
			'url' => URL::to('logout'), 
			'icon' => 'off',
			'active' => false
		),
	);
}

echo Navigation::tabs($links, true);
