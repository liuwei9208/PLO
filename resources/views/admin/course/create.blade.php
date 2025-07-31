<x-admin-layout>
  <form
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/course/add') }}"
  >
    @method('POST')
    @csrf

    <div x-data="{ pageName: `コース追加`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <!-- Name, Price, Description -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white">
      <div class="p-4 sm:p-6">

        <!-- Name -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700">
            コース <span class="text-error-500">*</span>
          </label>
          <input
            name="course_name"
            type="text"
            value="{{ old('course_name') }}"
            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
          >
          @if ($errors->has('course_name'))
            <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('course_name') }}</p>
          @endif
        </div>

        <!-- Price -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700">
            値段 <span class="text-error-500">*</span>
          </label>
          <input
            name="price"
            type="number"
            value="{{ old('price') }}"
            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full max-w-[250px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden text-right"
          ><span class="inline-flex mx-2 text-sm font-medium text-gray-700">円</span>
          @if ($errors->has('price'))
            <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('price') }}</p>
          @endif
        </div>

        <!-- Description -->
        <div>
          <label class="mb-1.5 block text-sm font-medium text-gray-700">
            説明
          </label>
          <textarea
            name="description"
            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
          >{{ old('description') }}</textarea>
        </div>
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
