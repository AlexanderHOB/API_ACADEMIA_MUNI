@component('mail::message')
# Hola {{$user->name}}
Has cambiado tu correo electrónico . Por Favor veríficala usando el siguiente boton:


@component('mail::button', ['url' => route('verify',$user->verification_token)])
Confirmar mi cuenta
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
