Olá {{ $user }}!

Para confirmar a sua inscrição no CDZForever clique no endereço abaixo:
{{ URL::to_action('register@activate', array($code)) }}

----------------------------------------------------------------------------
Este é um email automático, favor não responda
Staff CdzForever