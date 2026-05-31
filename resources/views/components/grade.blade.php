@php
    if ($score >= 90)     { $grade = 5; $class = 'text-success'; }
    elseif ($score >= 75) { $grade = 4; $class = 'text-primary'; }
    elseif ($score >= 50) { $grade = 3; $class = 'text-warning'; }
    else                  { $grade = 2; $class = 'text-error';   }
@endphp

<span class="font-bold {{ $class }}">{{ $grade }}</span>
