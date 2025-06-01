<div class="mv">
  <div class="mv-main">
    <img src="{{ asset('assets/img/shop/' . $shop->slug . '/mv/main-sm.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/' . $shop->slug . '/mv/main-lg.jpg') }}" alt="" class="pc-only">
  </div>
</div>

<style>
.sp-only {
  display: none;
}
.pc-only {
  display: block;
}
@media (max-width: 767px) {
  .sp-only {
    display: block;
  }
  .pc-only {
    display: none;
  }
}
</style>
