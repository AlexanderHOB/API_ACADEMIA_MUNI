
@component('mail::message')
# Hola {{$user->name}}
Gracias por crear una cuenta. Por Favor veríficala usando el siguiente boton:

@component('mail::button', ['url' => route('verify',$user->verification_token)])
Confirmar mi cuenta
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
