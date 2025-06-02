<x-public-shop-layout :shop="$shop">

  <!-- Title -->
  <div class="title">
    <p class="title-label1">CAST PROFILE</p>
    <p class="title-label2">Girls Name</p>
    <h1 class="title-name">
      {{ $cast->name }}
    </h1>
    <p class="title-attr">
      Age {{ $cast->age }}／T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
    </p>
  </div>

</x-public-shop-layout>
