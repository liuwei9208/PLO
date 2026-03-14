@props([
    'date' => '12/25',
    'name' => 'キャスト名',
    'age' => '00',
    'height' => '160',
    'bust' => '85',
    'braSize' => 'C',
    'waist' => '60',
    'hip' => '83',
    'message' => '女の子メッセージ女の子メッセージ女の子メッセージ女の子メッセージ女の子メッセージ女の子メッセージ',
    'shopName' => 'ラブストーリー',
    'shopSlug' => 'lovestory',
    'imageUrl' => null,
    'frameImageUrl' => null,
    'profileUrl' => '#',
    'showNew' => true,
])

@php
    // Format date - if it's already formatted (m/d), use it, otherwise format it
    $formattedDate = $date;
    
    // Convert showNew string to boolean if needed
    if (is_string($showNew)) {
        $showNew = $showNew === 'true' || $showNew === '1';
    }
@endphp

<a href="{{ $profileUrl }}" class="newface-card">
    <div class="newface-card-content">
        <!-- Date and New Badge -->
        <div class="newface-card-top">
            <div class="newface-card-date-group">
                <span class="newface-card-date">{{ $formattedDate }}</span>
                @if($showNew)
                    <span class="newface-card-new">New</span>
                @endif
            </div>
            <div class="newface-card-divider"></div>
        </div>

        <!-- Image Section -->
        <div class="newface-card-image" aria-label="{{ $name }}">
            <div class="newface-card-image-wrapper">
                @if(!empty($imageUrl))
                    <img src="{{ $imageUrl }}" alt="{{ $name }}" class="newface-card-image-photo">
                @else
                    <div class="newface-card-image-placeholder" aria-hidden="true"></div>
                @endif

                @if(!empty($frameImageUrl))
                    <img src="{{ $frameImageUrl }}" alt="" class="newface-card-image-frame">
                @endif
            </div>
        </div>

        <!-- Information Section -->
        <div class="newface-card-info">
            <!-- Name and Measurements + Message -->
            <div class="newface-card-details">
                <div class="newface-card-name-group">
                    <h3 class="newface-card-name">{{ $name }}（{{ $age }}）</h3>
                    <p class="newface-card-measurements">
                        T.{{ $height }} B.{{ $bust }}({{ $braSize }}) W.{{ $waist }} H.{{ $hip }}
                    </p>
                </div>

                <div class="newface-card-message">
                    <div class="newface-card-message-content">
                        <p class="newface-card-message-text">{{ $message }}</p>
                    </div>
                </div>
            </div>

            <!-- Shop Button -->
            <span class="newface-card-shop-button">
                <span class="newface-card-shop-button-text">{{ $shopName }}</span>
            </span>
        </div>
    </div>
</a>

@once
  @vite(['resources/scss/groups/newface-card.scss'])
@endonce
