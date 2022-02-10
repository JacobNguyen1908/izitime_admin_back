@component('mail::message')
# Daily Generate Statistics

## Database
{{env('DB_DATABASE')}}

## Informations
@if ($output === 'NUL')
    SUCCESS
@else
    {{$output}}
@endif

@endcomponent
