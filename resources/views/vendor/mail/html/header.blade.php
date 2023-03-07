<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://qqperu.com/images/qqperu.png" alt="Qullqita Qatipay">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
