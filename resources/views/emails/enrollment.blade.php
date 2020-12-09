
@component('mail::message')
# Hola {{$user->name}}
## Tu matrícula ha sido procesada con éxito.
## Sus credenciales para el aula virtual son los siguientes: 
## <b>Usuario: {{$student->dni}}</b>
## <b>Contraseña: La misma de la plataforma</b>

{{-- {{ HTML::image('assets/images/vouchers/1.jpg', 'alt text', array('class' => 'css-class')) }} --}}
Ingresa al aula virtual clickeando el siguiente botón.
@component('mail::button', ['url' => 'https://aula-virtual.academia-el-tambo.teampixeland.com/'])
Aula Virtual 
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
