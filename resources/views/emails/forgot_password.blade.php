@component('mail::message')
Hello **{{$user->name}}**,

@component('mail::button', ['url' => url('/reset-password/'.$token).'?email='.urlencode($user->email)])

@endcomponent{{-- use double space for line break --}}

@endcomponent
