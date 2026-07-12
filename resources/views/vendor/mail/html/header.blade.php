@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<h5 class="logo-text fw-bold m-1">
            Brightlabs
</h5>
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
