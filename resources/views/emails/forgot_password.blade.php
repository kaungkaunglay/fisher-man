@component('mail::message')
Hello **{{$user->name}}**,

@component('mail::button', ['url' => url('password/reset', $user->remember_token).'?email='.urlencode($user->email)])

@endcomponent{{-- use double space for line break --}}

@endcomponent
