@props([
    'backgroundImage' => asset('assets/img/groups/banner.jpg'),
    'titleEn' => 'Photo Diary',
    'titleJa' => '写メ日記',
    'vectorImage' => asset('assets/img/groups/Vector.png'),
    'overlayOpacity' => '0.25',
    'extraClass' => '',
])

@php
  // Build style attribute dynamically so that specific pages (e.g. recruit male)
  // can opt-out of setting the background image inline and rely on CSS instead.
  $styleParts = [];

  if (!empty($backgroundImage)) {
      $styleParts[] = "--banner-bg-image: url('{$backgroundImage}')";
  }

  $styleParts[] = "--banner-overlay-opacity: {$overlayOpacity}";

  $styleAttribute = implode('; ', $styleParts) . ';';
@endphp

<div class="banner-photodiary {{ $extraClass }}" style="{{ $styleAttribute }}">
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
@once
  @vite('resources/scss/groups/banner.scss')
@endonce
