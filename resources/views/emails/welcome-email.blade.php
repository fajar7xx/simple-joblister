@component('mail::message')
# Welcome to Joblister

This is a Joblister  website

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
