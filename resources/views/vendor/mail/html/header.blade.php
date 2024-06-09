@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="../../../../images/logoSmall.png" class="logo" alt="Passion Driven Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
