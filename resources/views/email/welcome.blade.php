Hello {{ $user->name }}

Thank you for creating a new account. 
Please verify you email using this link: {{ route('verify', $user->verification_token) }}