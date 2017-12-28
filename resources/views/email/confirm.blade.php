@component('mail::message')
Hello {{ $user->name }}

You changed your email, so we need to verify this new address. 
Please verify you email using this button: 

@component('mail::button', ['url' => route('verify', $user->verification_token)])
Verify account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
