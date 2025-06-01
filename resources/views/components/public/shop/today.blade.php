<a
  href="{{ route('public.shop.cast.profile', ['shop' => $cast->shop->slug, 'id' => $cast->id]) }}"
  class="today-item"
>
  <div class="today-photo">
    <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
  </div>
  <div class="today-status">
    <span class="today-status-label">出勤中</span>
    <span class="today-status-separator">　|　</span>
    <span class="today-status-time">00:00-00:00</span>
  </div>
  <div class="today-profile">
    <span class="today-profile-name">
      {{ $cast->name }}({{ $cast->age }})
    </span>
    <span class="today-profile-size">
      T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
    </span>
  </div>
  <ul class="today-tags">
    @foreach ($cast->personalities as $personality)
      <li class="today-tag">
        {{ $personality->name }}
      </li>
    @endforeach
    @foreach ($cast->styles as $style)
      <li class="today-tag">
        {{ $style->name }}
      </li>
    @endforeach
  </ul>
</a>
