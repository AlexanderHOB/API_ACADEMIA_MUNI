
@component('mail::message')
# Hola {{$user->name}}
Tu matrícula ha sido procesada con éxito.
Sus credenciales para el aula virtual 
## <b>Usuario: {{$student->dni}}</b>
## <b>Contraseña: {{$student->phone}}</b>


@component('mail::button', ['url' => 'https://aula-virtual.academia-el-tambo.teampixeland.com/'])
Aula Virtual 
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
