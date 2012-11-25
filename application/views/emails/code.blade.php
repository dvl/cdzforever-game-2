Olá {{ $user }}, 
 
Obrigado pelo seu registro 
 
---------------------------- 
Nome: {{ $user }}  
Senha: {{ $pass }}  
---------------------------- 
 
Clique no link a seguir para ativar a tua conta: 
 
{{ URL::to_action('register@activate', array($code)) }}  
 
---------------------------------------------------------------------------- 
Este é um email automático, favor não responder.