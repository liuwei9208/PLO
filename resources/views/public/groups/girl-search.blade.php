<x-public-groups-sub-page-layout
  titleEn="Girl Search"
  titleJa="女の子検索"
  :bannerImage="asset('assets/img/groups/movie-banner.jpg')"
  :vectorImage="asset('assets/img/groups/Vector.png')"
  :showButtonGroup="false"
  :showLoadMore="false"
  :showDateSearchBar="false"
>
  <div class="groups-girl-search">
    <div class="groups-girl-search__panel">
      <form action="{{ route('public.groups.searchResult') }}" method="POST" class="groups-girl-search__form">
        @csrf
        
        <!-- Name Search Section -->
        <div class="groups-girl-search__section">
          <div class="groups-girl-search__name-header">
            <p class="groups-girl-search__name-label">女の子名</p>
          </div>
          <div class="groups-girl-search__name-input-group">
            <div class="groups-girl-search__input-wrapper">
              <input 
                type="text" 
                name="name" 
                class="groups-girl-search__input" 
                placeholder="名前入力で検索"
                value="{{ old('name') }}"
              >
            </div>
            <div class="groups-girl-search__radio-group">
              <label class="groups-girl-search__radio-label">
                <input 
                  type="radio" 
                  name="name_match" 
                  value="partial" 
                  class="groups-girl-search__radio"
                  {{ old('name_match', 'partial') === 'partial' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__radio-indicator"></span>
                <span class="groups-girl-search__radio-text">いずれかを含む</span>
              </label>
              <label class="groups-girl-search__radio-label">
                <input 
                  type="radio" 
                  name="name_match" 
                  value="full" 
                  class="groups-girl-search__radio"
                  {{ old('name_match') === 'full' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__radio-indicator"></span>
                <span class="groups-girl-search__radio-text">すべてを含む</span>
              </label>
            </div>
          </div>
        </div>

        <!-- Status Search Section -->
        <div class="groups-girl-search__status-section">
          <div class="groups-girl-search__status-grid">
            <!-- Height -->
            <div class="groups-girl-search__status-item">
              <p class="groups-girl-search__status-label">身長</p>
              <div class="groups-girl-search__select-wrapper">
                <select name="height" class="groups-girl-search__select">
                  <option value="">選択する</option>
                  <option value="150" {{ old('height') === '150' ? 'selected' : '' }}>～150cm</option>
                  <option value="155" {{ old('height') === '155' ? 'selected' : '' }}>151cm～155cm</option>
                  <option value="160" {{ old('height') === '160' ? 'selected' : '' }}>156cm～160cm</option>
                  <option value="165" {{ old('height') === '165' ? 'selected' : '' }}>161cm～165cm</option>
                  <option value="170" {{ old('height') === '170' ? 'selected' : '' }}>170cm～</option>
                </select>
                <svg class="groups-girl-search__select-arrow" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L8 8L15 1" stroke="#021A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>

            <!-- Age -->
            <div class="groups-girl-search__status-item">
              <p class="groups-girl-search__status-label">年齢</p>
              <div class="groups-girl-search__select-wrapper">
                <select name="age" class="groups-girl-search__select">
                  <option value="">選択する</option>
                  @for($i = 18; $i <= 30; $i++)
                    @if($i == 30)
                      <option value="{{ $i }}" {{ old('age') == $i ? 'selected' : '' }}>30歳～</option>
                    @else
                      <option value="{{ $i }}" {{ old('age') == $i ? 'selected' : '' }}>{{ $i }}歳</option>
                    @endif
                  @endfor
                </select>
                <svg class="groups-girl-search__select-arrow" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L8 8L15 1" stroke="#021A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>

            <!-- Bust Cup -->
            <div class="groups-girl-search__status-item">
              <p class="groups-girl-search__status-label">バストカップ</p>
              <div class="groups-girl-search__select-wrapper">
                <select name="bust" class="groups-girl-search__select">
                  <option value="">選択する</option>
                  @foreach(['A','B','C','D','E','F','G','H','I','J'] as $cup)
                    <option value="{{ $cup }}" {{ old('bust') === $cup ? 'selected' : '' }}>{{ $cup }}</option>
                  @endforeach
                </select>
                <svg class="groups-girl-search__select-arrow" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L8 8L15 1" stroke="#021A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>
          </div>
        </div>

        <!-- Personality Section -->
        <div class="groups-girl-search__feature-section">
          <div class="groups-girl-search__feature-header">
            <p class="groups-girl-search__feature-label">性格</p>
          </div>
          <div class="groups-girl-search__feature-options">
            <div class="groups-girl-search__feature-column">
              <label class="groups-girl-search__feature-radio-label">
                <input 
                  type="radio" 
                  name="personality" 
                  value="-1" 
                  class="groups-girl-search__feature-radio"
                  {{ old('personality', '-1') === '-1' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__feature-radio-indicator"></span>
                <span class="groups-girl-search__feature-radio-text">すべて</span>
              </label>
              @foreach($personalities->take(4) as $personality)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="personality" 
                    value="{{ $personality->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('personality') == $personality->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $personality->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($personalities->skip(4)->take(5) as $personality)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="personality" 
                    value="{{ $personality->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('personality') == $personality->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $personality->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($personalities->skip(9) as $personality)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="personality" 
                    value="{{ $personality->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('personality') == $personality->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $personality->name }}</span>
                </label>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Style Section -->
        <div class="groups-girl-search__feature-section">
          <div class="groups-girl-search__feature-header">
            <p class="groups-girl-search__feature-label">スタイル</p>
          </div>
          <div class="groups-girl-search__feature-options">
            <div class="groups-girl-search__feature-column">
              <label class="groups-girl-search__feature-radio-label">
                <input 
                  type="radio" 
                  name="style" 
                  value="-1" 
                  class="groups-girl-search__feature-radio"
                  {{ old('style', '-1') === '-1' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__feature-radio-indicator"></span>
                <span class="groups-girl-search__feature-radio-text">すべて</span>
              </label>
              @foreach($styles->take(4) as $style)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="style" 
                    value="{{ $style->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('style') == $style->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $style->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($styles->skip(4)->take(5) as $style)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="style" 
                    value="{{ $style->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('style') == $style->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $style->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($styles->skip(9) as $style)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="style" 
                    value="{{ $style->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('style') == $style->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $style->name }}</span>
                </label>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Option Section -->
        <div class="groups-girl-search__feature-section">
          <div class="groups-girl-search__feature-header">
            <p class="groups-girl-search__feature-label">オプション</p>
          </div>
          <div class="groups-girl-search__feature-options">
            <div class="groups-girl-search__feature-column">
              <label class="groups-girl-search__feature-radio-label">
                <input 
                  type="radio" 
                  name="option" 
                  value="-1" 
                  class="groups-girl-search__feature-radio"
                  {{ old('option', '-1') === '-1' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__feature-radio-indicator"></span>
                <span class="groups-girl-search__feature-radio-text">すべて</span>
              </label>
              @foreach($options->take(4) as $option)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="option" 
                    value="{{ $option->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('option') == $option->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $option->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($options->skip(4)->take(5) as $option)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="option" 
                    value="{{ $option->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('option') == $option->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $option->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($options->skip(9) as $option)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="option" 
                    value="{{ $option->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('option') == $option->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $option->name }}</span>
                </label>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="groups-girl-search__actions">
          <button type="submit" name="status" value="working" class="groups-girl-search__btn groups-girl-search__btn--working">
            「出勤中」の女の子で検索
          </button>
          <button type="submit" class="groups-girl-search__btn groups-girl-search__btn--castlist">
            キャスト一覧から検索
          </button>
        </div>
      </form>
    </div>

    <!-- Back to Top Button -->
    <div class="groups-girl-search__back-to-top">
      <a href="{{ route('public.groups.home') }}" class="groups-girl-search__back-link">
        トップページへもどる
      </a>
    </div>
  </div>
</x-public-groups-sub-page-layout>

@once
  @vite(['resources/scss/groups/girl-search.scss'])
@endonce
