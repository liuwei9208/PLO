<x-admin-layout>
    <div class="p-4 mx-auto max-w-full md:p-6">
        <div x-data="{ pageName: `メインビジュアル画像を編集` }">
            <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success"
                style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #badbcc; border-radius: 0.375rem; color: #0f5132; background-color: #d1e7dd;">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger"
                style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #f5c2c7; border-radius: 0.375rem; color: #842029; background-color: #f8d7da;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @role('admin')
            <form action="{{ route('admin.main-visual.index') }}" method="GET" id="shop_form"
                class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="p-4 sm:p-6">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">店舗</label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 w-full max-w-[380px] bg-transparent">
                        <select name="shop" id="shop_select"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            :class="isOptionSelected && 'text-gray-800 dark:text-white/90'" @change="document.getElementById('shop_form').submit()">
                            @foreach ($shops as $s)
                                <option value="{{ $s->slug }}" @selected($s->id === $shop->id)>{{ $s->slug === 'headquarter' ? 'グループ' : $s->name }}</option>
                            @endforeach
                        </select>
                        <span
                            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </form>
        @endrole
        @role('shop')
            <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="p-4 sm:p-6">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">店舗</label>
                    <div class="text-sm text-gray-800 dark:text-white/90">{{ $shop->slug === 'headquarter' ? 'グループ' : $shop->name }}</div>
                </div>
            </div>
        @endrole

        <form method="post" action="{{ route('admin.main-visual.index') }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @role('admin')
                <input type="hidden" name="shop" value="{{ $shop->slug }}">
            @endrole

            @foreach ($slots as $index => $slot)
                @php
                    $num = $index + 1;
                    $isRequired = $num === 1;
                @endphp
                <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="p-4 sm:p-6">
                        <div class="flex flex-col gap-4 lg:flex-row lg:items-start">
                            <div class="flex-shrink-0">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    画像 {{ $num }}@if ($isRequired)
                                        <span class="text-error-500">*</span>
                                    @endif
                                </label>
                                <div
                                    class="main-visual-gallery-item dropzone relative flex h-40 w-40 items-center justify-center overflow-hidden rounded-xl border border-dashed border-gray-300 bg-gray-50 dark:border-gray-700 dark:bg-gray-900"
                                    data-slot="{{ $num }}">
                                    <label for="image_{{ $num }}" class="dz-clickable flex h-full w-full cursor-pointer items-center justify-center">
                                        @if ($slot->image_path)
                                            <img src="{{ asset('storage/' . $slot->image_path) }}" alt="画像{{ $num }}"
                                                class="main-visual-gallery-img absolute inset-0 h-full w-full object-cover">
                                            <input type="hidden" name="path_{{ $num }}" value="{{ $slot->image_path }}">
                                        @else
                                            <div class="dz-message flex h-[68px] w-[68px] items-center justify-center rounded-full bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                                                <svg class="fill-current" width="29" height="28" viewBox="0 0 29 28" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14.5019 3.91699C14.2852 3.91699 14.0899 4.00891 13.953 4.15589L8.57363 9.53186C8.28065 9.82466 8.2805 10.2995 8.5733 10.5925C8.8661 10.8855 9.34097 10.8857 9.63396 10.5929L13.7519 6.47752V18.667C13.7519 19.0812 14.0877 19.417 14.5019 19.417C14.9161 19.417 15.2519 19.0812 15.2519 18.667V6.48234L19.3653 10.5929C19.6583 10.8857 20.1332 10.8855 20.426 10.5925C20.7188 10.2995 20.7186 9.82463 20.4256 9.53184L15.0838 4.19378C14.9463 4.02488 14.7367 3.91699 14.5019 3.91699ZM5.91626 18.667C5.91626 18.2528 5.58047 17.917 5.16626 17.917C4.75205 17.917 4.41626 18.2528 4.41626 18.667V21.8337C4.41626 23.0763 5.42362 24.0837 6.66626 24.0837H22.3339C23.5766 24.0837 24.5839 23.0763 24.5839 21.8337V18.667C24.5839 18.2528 24.2482 17.917 23.8339 17.917C23.4197 17.917 23.0839 18.2528 23.0839 18.667V21.8337C23.0839 22.2479 22.7482 22.5837 22.3339 22.5837H6.66626C6.25205 22.5837 5.91626 22.2479 5.91626 21.8337V18.667Z"
                                                        fill=""></path>
                                                </svg>
                                            </div>
                                        @endif
                                        <input name="image_{{ $num }}" id="image_{{ $num }}" type="file"
                                            accept=".jpg,.jpeg,.png,.gif,.webp" class="main-visual-gallery-input hidden">
                                    </label>
                                    @if ($slot->image_path && !$isRequired && $slot->id)
                                        <form method="POST" action="{{ route('admin.main-visual.destroy-image', $slot->id) }}"
                                            class="absolute right-2 top-2 z-10"
                                            onsubmit="return confirm('この画像を削除しますか？')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="main-visual-gallery-remove flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-white/10">
                                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
                                                        fill=""></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-1">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">リンク先 URL</label>
                                <input name="link_url_{{ $num }}" type="url" value="{{ old('link_url_' . $num, $slot->link_url) }}"
                                    placeholder="https://"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="flex items-center justify-between px-5">
                <button type="submit"
                    class="inline-flex items-center gap-2 rounded-lg bg-brand-500 px-4 py-3.5 text-sm font-medium text-white shadow-theme-xs transition hover:bg-brand-600">
                    保存する
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.main-visual-gallery-input').forEach(input => {
                const item = input.closest('.main-visual-gallery-item')
                const pathInput = item.querySelector('input[name^="path_"]')

                input.addEventListener('change', (e) => {
                    if (e.target.files.length === 0) return

                    const file = e.target.files[0]
                    const src = URL.createObjectURL(file)
                    const existingImg = item.querySelector('.main-visual-gallery-img')
                    if (existingImg) existingImg.remove()

                    const img = document.createElement('img')
                    img.src = src
                    img.className = 'main-visual-gallery-img absolute inset-0 h-full w-full object-cover'
                    img.alt = 'preview'
                    item.querySelector('label').prepend(img)

                    if (pathInput) pathInput.remove()
                })
            })
        })
    </script>
</x-admin-layout>
