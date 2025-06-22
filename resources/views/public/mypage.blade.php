<x-mypage-layout>
  <div class="p-4 mx-auto max-w-7xl md:p-6">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">会員詳細</h2>
      <a href="{{ route('public.group.home') }}" id="show-qr-button" class="flex items-center px-4 py-3 text-sm font-medium  transition ring-1 ring-inset ring-gray-300 rounded-lg bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 text-center">
        グループTOPへ
      </a>
      <button id="show-qr-button" class="flex items-center px-4 py-3 text-sm font-medium  transition ring-1 ring-inset ring-gray-300 rounded-lg  bg-blue-600 text-white  hover:bg-blue-700">
        QRコード表示
      </button>
    </div>

    <div class="bg-white rounded-lg shadow-xl overflow-auto border border-gray-200 dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4">
        <div class="flex gap-4">
          <!-- Left side -->
          <div class="w-2/3" style="width: 100%;">
            <!-- Member Info -->
            <table class="w-full border-collapse border-t border-l border-gray-400">
              <tbody>
                <tr>
                  <th class="p-1 w-[120px] text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">会員番号</th>
                  <td class="p-1 border-b border-r border-gray-400">{{ $member->id }}</td>
                  <th class="p-1 w-[120px] text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">ニックネーム</th>
                  <td class="p-1 border-b border-r border-gray-400">{{ $member->name }}</td>
                </tr>
                <tr>
                  <th class="p-1 text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">携帯番号</th>
                  <td class="p-1 border-b border-r border-gray-400">{{ $member->tel }}</td>
                  <th class="p-1 text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">会員名</th>
                  <td class="p-1 border-b border-r border-gray-400">{{ $member->subname }}</td>
                </tr>
                <tr>
                  <th class="p-1 text-left font-semibold bg-gray-100 border-b border-r border-gray-400" style="width: 140px;">現在のポイント</th>
                  <td class="p-1 border-b border-r border-gray-400" colspan="3">{{ $pay }}</td>
                </tr>
              </tbody>
            </table>

            <!-- Visit History -->
            <div class="mt-4 border border-gray-400 border-b-0" style="margin-top: 40px;">
              <table class="w-full text-sm text-center">
                <thead class="bg-gray-100">
                  <tr>
                    <th class="p-1 w-[120px] border-b border-r border-gray-400">来店日</th>
                    <th class="p-1 w-[120px] border-b border-r border-gray-400">店舗名</th>
                    <th class="p-1 w-[120px] border-b border-r border-gray-400">キャスト名</th>
                    <th class="p-1 border-b border-r border-gray-400">コース</th>
                    <th class="p-1 w-[100px] border-b border-r border-gray-400">利用ポイント</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $histories as $history)
                  <tr>
                    <td class="p-1 border-b border-r border-gray-400 h-8">{{ $history->created_at ? \Carbon\Carbon::parse($history->created_at)->format('Y-m-d') : '' }}</td>
                    <td class="p-1 border-b border-r border-gray-400">{{ $history->shop_name }}</td>
                    <td class="p-1 border-b border-r border-gray-400">{{ $history->casts_name }}</td>
                    <td class="p-1 border-b border-r border-gray-400">{{ $history->course_name }}</td>
                    <td class="p-1 border-b border-r border-gray-400">{{ $history->point_use }}</td>
                  </tr>
                  @endforeach
                  {{-- @for ($i = 0; $i < 14; $i++)
                  <tr>
                    <td class="p-1 border-b border-r border-gray-400 h-8"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                    <td class="p-1 border-b border-r border-gray-400"></td>
                  </tr>
                  @endfor --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- QR Code Modal -->
    <div id="qr-modal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
      <div id="qr-modal-content" class="bg-white rounded-lg shadow-xl overflow-hidden flex flex-col" style="max-width: 500px; width: 100%;">
        <div class="flex justify-between items-center p-4 border-b">
          <h3 class="text-lg font-semibold">会員QRコード</h3>
          <button id="close-modal-button" class="text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
          </button>
        </div>
        <div class="p-6 flex-grow flex flex-col items-center justify-center">
            <div class="flex justify-center items-center border-2 border-gray-400 w-full" style="height: 400px; padding: 20px;">
                 <img src="" alt="QRコード" style="width: 100%; height: 100%; object-fit: contain;" id="qrcodeImage">
            </div>
            <p class="mt-4 text-center text-lg">QRコードを読み込んでください</p>
        </div>
        <div class="p-4 border-t flex justify-end bg-gray-50">
          <button id="close-modal-footer-button" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">閉じる</button>
        </div>
      </div>
    </div>

  </div>
</x-mypage-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const memberId = '{{ $member->id }}';
  const showQrButton = document.getElementById('show-qr-button');
  const qrModal = document.getElementById('qr-modal');
  const qrModalContent = document.getElementById('qr-modal-content');
  const closeModalButton = document.getElementById('close-modal-button');
  const closeModalFooterButton = document.getElementById('close-modal-footer-button');
  const qrcodeImage = document.getElementById('qrcodeImage');

  async function openModal() {
    if (memberId.trim() === '') {
      alert('会員番号がありません');
      return;
    }
    const response = await fetch(`/api/qrcode/${encodeURIComponent(memberId)}`);
    const blob = await response.blob();
    const url = URL.createObjectURL(blob);
    qrcodeImage.src = url;

    // qrcodeImage.src = `/qrcode/${encodeURIComponent(memberId)}`;
    qrModal.style.display = 'flex';
  }

  function closeModal() {
    qrModal.style.display = 'none';
  }

  showQrButton.addEventListener('click', openModal);
  closeModalButton.addEventListener('click', closeModal);
  closeModalFooterButton.addEventListener('click', closeModal);

  // Close modal when clicking outside of the content area
  qrModal.addEventListener('click', function (event) {
    if (!qrModalContent.contains(event.target)) {
      closeModal();
    }
  });

  // Close modal with the Escape key
  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && qrModal.style.display === 'flex') {
      closeModal();
    }
  });
});
</script>

