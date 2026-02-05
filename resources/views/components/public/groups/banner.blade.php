@props([
    'backgroundImage' => asset('assets/img/groups/banner.jpg'),
    'titleEn' => 'Photo Diary',
    'titleJa' => '写メ日記',
    'vectorImage' => asset('assets/img/groups/Vector.png'),
    'overlayOpacity' => '0.25'
])

<div class="banner-photodiary" style="--banner-bg-image: url('{{ $backgroundImage }}'); --banner-overlay-opacity: {{ $overlayOpacity }};">
  <div class="banner-photodiary-background" aria-hidden="true">
    <div class="banner-photodiary-overlay"></div>
  </div>
  <div class="banner-photodiary-content">
    <p class="banner-photodiary-title-en">{{ $titleEn }}</p>
    <div class="banner-photodiary-title-ja-wrapper">
      <p class="banner-photodiary-title-ja">{{ $titleJa }}</p>
    </div>
  </div>
</div>
<div class="banner-vector-scroll">
  <img src="{{ $vectorImage }}" alt="">
</div>
@once
  @vite('resources/scss/groups/banner.scss')
@endonce
