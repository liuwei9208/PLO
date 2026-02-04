<div class="banner-photodiary">
  <div class="banner-photodiary-background" aria-hidden="true">
    <img src="{{ asset('assets/img/groups/banner.jpg') }}"  class="banner-photodiary-bg-image" alt="">
    <div class="banner-photodiary-overlay"></div>
  </div>
  <div class="banner-photodiary-content">
    <p class="banner-photodiary-title-en">Photo Diary</p>
    <div class="banner-photodiary-title-ja-wrapper">
      <p class="banner-photodiary-title-ja">写メ日記</p>
    </div>
  </div>
</div>
<div class="banner-vector-scroll">
  <img src="{{ asset('assets/img/groups/Vector.png') }}" alt="">
</div>
@once
  @vite('resources/scss/groups/banner.scss')
@endonce
