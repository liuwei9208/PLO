<x-admin-layout>
  <form
    class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6"
    method="post"
    action="{{ url('/admin/news/add') }}"
    enctype="multipart/form-data"
  >
    @method('POST')
    @csrf

    <div x-data="{ pageName: `Newsを追加`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <!-- Name, Shop, Profile -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6">
        <!-- Shop, Joined -->
        <div class="flex gap-6 mb-6">

          <!-- Shop -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              店舗 <span class="text-error-500">*</span>
            </label>
            <div x-data="{ isOptionSelected: false }" class="relative z-20 w-full max-w-[380px] bg-transparent">
              <select
                name="shop_id"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'"
                @change="isOptionSelected = true"
              >
                @role('admin')
                  <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    店舗を選択してください
                  </option>
                  @foreach ($shops as $shop)
                    <option
                      value="{{ $shop->id }}"
                      class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                      @if ($shop->id == old('shop_id')) selected @endif
                    >
                      {{ $shop->name }}
                    </option>
                  @endforeach
                @endrole
                @role('shop')
                  <option
                    value="{{ $shop->id }}"
                    class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                    selected
                  >
                    {{ $shop->name }}
                  </option>
                @endrole
              </select>
              <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
            </div>
            @if ($errors->has('shop_id'))
              <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('shop_id') }}</p>
            @endif
          </div>

          {{-- <!-- Joined -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              配信日時
            </label>
            <div class="relative">
              <input
                name="published_at"
                type="text"
                class="flatpickr-input dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                value="{{ old('published_at') ?? date('Y-m-d H:i') }}"
              >
              <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z" fill=""></path>
                </svg>
              </span>
            </div>
          </div> --}}
        </div>

        <!-- Age, Height -->
        <div class="flex gap-6 mb-6">
          <div class="w-full">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              タイトル<span class="text-error-500">*</span>
            </label>
            <input
              name="title"
              type="text"
              value=""
              class="w-full dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11   rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
            @if ($errors->has('title'))
              <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('title') }}</p>
            @endif
          </div>
          {{-- <!-- Public -->
          <div x-data="{ publicToggle: true }" class="mt-8">
            <label for="is_public" class="flex mt-1 cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none dark:text-gray-400">
              <div class="relative">
                <input
                  name="is_public"
                  value="1"
                  type="checkbox"
                  id="is_public"
                  class="sr-only"
                  @change="publicToggle = !publicToggle"
                  @checked(true)
                />
                <div class="block h-6 w-11 rounded-full" :class="publicToggle ? 'bg-brand-500 dark:bg-brand-500' : 'bg-gray-200 dark:bg-white/10'"></div>
                <div class="shadow-theme-sm absolute top-0.5 left-0.5 h-5 w-5 rounded-full bg-white duration-300 ease-linear" :class="publicToggle ? 'translate-x-full': 'translate-x-0'"></div>
              </div>
              公開
            </label>
          </div> --}}

        </div>
      <!-- 配信設定 -->
      <div class="mb-6">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
          配信設定
        </label>
        <div class="flex items-center gap-8">
          <!-- 今すぐ配信 -->
          <div class="flex items-center">
            <input
              type="radio"
              name="publish_type" 
              id="publish_now"
              value="1"
              class="h-4 w-4 border-gray-300 text-brand-500 focus:ring-brand-500"
              checked
            >
            <label for="publish_now" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
              今すぐ配信
            </label>
          </div>

          <!-- 予約配信 -->
          <div class="flex items-center">
            <input
              type="radio"
              name="publish_type"
              id="publish_schedule"
              value="2" 
              class="h-4 w-4 border-gray-300 text-brand-500 focus:ring-brand-500"
            >
            <label for="publish_schedule" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
              予約配信
            </label>
          </div>
          <div id="schedule_datetime" class="relative" style="display: none;">
            <input
              name="published_at"
              type="text"
              class="flatpickr-input dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
              value="{{ old('published_at') ?? date('Y-m-d H:i') }}"
              placeholder="日時を選択"
            >
            <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
              <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z" fill=""></path>
              </svg>
            </span>
          </div>

          <!-- 下書き -->
          <div class="flex items-center">
            <input
              type="radio"
              name="publish_type"
              id="publish_draft"
              value="3"
              class="h-4 w-4 border-gray-300 text-brand-500 focus:ring-brand-500"
            >
            <label for="publish_draft" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
              下書き
            </label>
          </div>
        </div>
      </div>
      </div>
    </div>
    


    <!-- 本文 -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
          本文
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <textarea
          name="news_content"
          id="news_content"
          class="w-full"
          rows="10"
        >{{ old('news_content') }}</textarea>
      </div>
    </div>

    <!-- Buttons -->
    <div class="px-5 flex items-center justify-between">
      <button
        type="submit"
        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600"
      >
        保存する
      </button>
    </div>
  </form>
</x-admin-layout>

<!-- FlatpickrのCSSを追加 -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> --}}
@once
  @vite('resources/js/admin/news.js')
@endonce
<!-- 既存のスクリプトを削除 -->
