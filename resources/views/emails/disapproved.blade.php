
@component('mail::message')
# Hola {{$user->name}}
Tu matrícula ha sido procesada con éxito.

## Su matrícula realizada no cumple con los requisitos necesarios,
## Por favor, Vuelva a matricularse y cumpla con los requisitos correctamente.

{{-- {{ HTML::image('assets/images/vouchers/1.jpg', 'alt text', array('class' => 'css-class')) }} --}}

{{-- @component('mail::button', ['url' => 'https://aula-virtual.academia-el-tambo.teampixeland.com/'])
Aula Virtual 
@endcomponent --}}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
