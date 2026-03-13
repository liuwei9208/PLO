@props(['images' => collect()])

@if($images->isNotEmpty())
<div class="mv-main-slider" data-mv-slider>
    @foreach($images as $index => $img)
    <div class="mv-main-slider-item{{ $index === 0 ? ' is-active' : '' }}" data-mv-slide="{{ $index }}">
        @if($img->link_url)
        <a href="{{ $img->link_url }}" target="_blank" rel="noopener noreferrer" class="mv-main-slider-link">
            <img src="{{ asset('storage/' . $img->image_path) }}" alt="" class="mv-main-slider-img sp-only">
            <img src="{{ asset('storage/' . $img->image_path) }}" alt="" class="mv-main-slider-img pc-only">
        </a>
        @else
        <img src="{{ asset('storage/' . $img->image_path) }}" alt="" class="mv-main-slider-img sp-only">
        <img src="{{ asset('storage/' . $img->image_path) }}" alt="" class="mv-main-slider-img pc-only">
        @endif
    </div>
    @endforeach
</div>
<script>
(function() {
    const el = document.querySelector('[data-mv-slider]');
    if (!el) return;
    const items = el.querySelectorAll('[data-mv-slide]');
    if (items.length <= 1) return;
    let current = 0;
    setInterval(function() {
        items[current].classList.remove('is-active');
        current = (current + 1) % items.length;
        items[current].classList.add('is-active');
    }, 5000);
})();
</script>
@endif
