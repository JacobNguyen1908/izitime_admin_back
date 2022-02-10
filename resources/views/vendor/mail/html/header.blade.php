<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@elseif (trim($slot) === 'IziTime')
<img src="{{ env('APP_URL') }}/assets/imgs/logo.png" class="logo" alt="IziTime Logo" style="max-height: 200px; width: 200px; height: auto">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
