
@component('mail::message')
# Hola {{$user->name}}
Gracias por crear una cuenta. Por Favor verifícala usando el siguiente boton:

@component('mail::button', ['url' => route('verify',$user->verification_token)])
Confirmar mi cuenta
@endcomponent
<img src="assets/vouchers/1.jpg" alt="">
Gracias,<br>

{{ config('app.name') }}
@endcomponent
