@props(['shop'])
<div class="phone-link-container">
  <div class="phone-link-wrapper">
    <div class="phone-link-note">
      <span class="phone-link-note-text">朝8:30〜予約可能</span>
    </div>
    <a href="tel:{{ '0115338988' }}" class="phone-link">
      <img src="{{ asset('assets/img/shop/phone-icon.svg') }}" alt="電話" class="phone-icon">
      <span>{{ '011-533-8988' }}</span>
    </a>
  </div>
</div>
