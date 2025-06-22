<x-admin-layout>
  <div class="p-4 mx-auto max-w-7xl md:p-6">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">会員詳細</h2>
      {{-- <a href="{{ route('admin.member.index') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition ring-1 ring-inset ring-gray-300 rounded-lg bg-white shadow-theme-xs hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
        戻る
      </a> --}}
    </div>

    <div class="bg-white rounded-lg shadow-xl overflow-auto border border-gray-200 dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4">
        <div class="flex gap-4">
          <!-- Left side -->
          <div class="w-2/3" style="width: 70%;">
            <!-- Member Info -->
            <table class="w-full border-collapse border-t border-l border-gray-400">
              <tbody>
                <tr>
                  <th class="p-1 w-[120px] text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">会員番号</th>
                  <td class="p-1 border-b border-r border-gray-400"></td>
                  <th class="p-1 w-[120px] text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">ニックネーム</th>
                  <td class="p-1 border-b border-r border-gray-400"></td>
                </tr>
                <tr>
                  <th class="p-1 text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">携帯番号</th>
                  <td class="p-1 border-b border-r border-gray-400"></td>
                  <th class="p-1 text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">会員名</th>
                  <td class="p-1 border-b border-r border-gray-400"></td>
                </tr>
                <tr>
                  <th class="p-1 text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">現在のポイント</th>
                  <td class="p-1 border-b border-r border-gray-400" colspan="3"></td>
                </tr>
              </tbody>
            </table>

            <!-- Visit History -->
            <div class="mt-4 border border-gray-400 border-b-0" style="margin-top: 40px;">
              <table class="w-full text-sm text-center">
                <thead class="bg-gray-100">
                  <tr>
                    <th class="p-1 w-[120px] border-b border-r border-gray-400">来店日</th>
                    <th class="p-1 w-[120px] border-b border-r border-gray-400">キャスト名</th>
                    <th class="p-1 border-b border-r border-gray-400">コース</th>
                    <th class="p-1 w-[80px] border-b border-r border-gray-400">延長</th>
                    <th class="p-1 w-[80px] border-b border-r border-gray-400">料金</th>
                    <th class="p-1 w-[100px] border-b border-r border-gray-400">利用ポイント</th>
                    <th class="p-1 border-b border-r border-gray-400">会員メモ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="p-1 border-b border-r border-gray-400 h-8">2025-06-18</td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400 text-right pr-2">1000</td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                  </tr>
                  @for ($i = 0; $i < 14; $i++)
                  <tr>
                    <td class="p-1 border-b border-r border-gray-400 h-8"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                  </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
          <!-- Right side -->
          <div class="w-1/3" style="width: 30%;">
            <div class="text-right mb-2 font-semibold">2025年6月19日</div>
            <table class="w-full text-sm border-collapse border border-gray-400">
              <tbody>
                <tr>
                  <th class="p-1 w-[100px] font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">利用ポイント</th>
                  <td class="p-1 border-b border-gray-400"><input type="text" value="0" class="p-1 border border-gray-400 text-right w-full"></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">取得ポイント</th>
                  <td class="p-1 border-b border-gray-400"><input type="text" value="500" class="p-1 border border-gray-400 text-right w-full"></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">料金</th>
                  <td class="p-1 border-b border-gray-400"><input type="text" value="500" class="p-1 border border-gray-400 text-right w-full"></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">キャスト名</th>
                  <td class="p-1 border-b border-gray-400"><select class="p-1 border border-gray-400 w-full bg-white"><option></option></select></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">コース</th>
                  <td class="p-1 border-b border-gray-400"><input type="text" class="p-1 border border-gray-400 w-full"></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">延長</th>
                  <td class="p-1 border-b border-gray-400"><input type="text" class="p-1 border border-gray-400 w-full"></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-r border-gray-400 text-left" style="width: 100px;">メモ</th>
                </tr>
                <tr>
                  <td class="p-1" colspan="2"><textarea class="p-1 border border-gray-400 w-full" style="width: 100%; height: 100px;"></textarea></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="mt-4 flex justify-end gap-4">
          <button class="px-8 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" style="background-color: #2563eb; color: white; border-radius: 0.375rem; border: none; cursor: pointer; width: 100px;">保存</button>
          <a href="{{ route('admin.member.qrcode') }}" class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 text-center" style="border-radius: 0.375rem; width: 100px; display: inline-block; text-decoration: none; color: inherit;">戻る</a>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>