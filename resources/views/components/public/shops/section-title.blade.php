@props([
    'text' => 'schedule',
    'backgroundColor' => '#2A1A08',
    'gradientStart' => '#FFF2D7',
    'gradientEnd' => '#BD902F',
    'letterSpacing' => '6px',
    'opacity' => null,
    'small' => false
])

<div class="section-title @if($small) section-title-small @endif" style="background-color: {{ $backgroundColor }}; @if($opacity) opacity: {{ $opacity }}; @endif">
    <h2 style="background: linear-gradient(180deg, {{ $gradientStart }} 20.67%, {{ $gradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: {{ $letterSpacing }};">
        {{ $text }}
    </h2>
</div>

