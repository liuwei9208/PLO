<x-admin-layout>
  @push('head')
  <script>
    const token = '{{ $token }}';
    const memberId = {{ $member->id }};
    const shopId = {{ $shop_id ?? 0 }};
    const isAdmin = {{ auth()->user()?->hasRole('admin') ? 'true' : 'false' }};

    function updatePrice() {
      let total = 0;
      for (let i = 1; i <= 4; i++) {
        const sel = document.getElementById('course' + i);
        const cnt = parseInt(document.getElementById('course' + i + '_count')?.value || 0);
        total += Number(sel?.options[sel.selectedIndex]?.dataset?.price || 0) * cnt;
      }
      const extSel = document.getElementById('extend');
      const extCnt = parseInt(document.getElementById('extend_count')?.value || 0) || 0;
      total += Number(extSel?.options[extSel?.selectedIndex]?.dataset?.price || 0) * extCnt;
      for (let i = 1; i <= 5; i++) {
        const sel = document.getElementById('option' + i);
        const cnt = parseInt(document.getElementById('option' + i + '_count')?.value || 0);
        total += Number(sel?.options[sel?.selectedIndex]?.dataset?.price || 0) * cnt;
      }
      const appSel = document.getElementById('appointment');
      const appCnt = parseInt(document.getElementById('appointment_count')?.value || 0);
      total += Number(appSel?.options[appSel?.selectedIndex]?.dataset?.price || 0) * appCnt;
      const discount = Number(document.getElementById('discount')?.value || 0);
      total += discount;
      const ploDay = document.getElementById('plo_day')?.checked;
      const point = ploDay ? Math.floor(total * 0.1) : Math.floor(total * 0.03);
      document.getElementById('price').value = total;
      document.getElementById('point').value = point;
    }

    async function onShopChange(shopIdVal) {
      if (!shopIdVal) return;
      try {
        const response = await fetch(`/api/member/getValues`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
          },
          body: JSON.stringify({ shop_id: shopIdVal }),
        });
        if (response.ok) {
          const data = await response.json();
          const castOpts = (data.casts || []).map(c => `<option value="${c.id}">${c.name}</option>`).join('');
          document.getElementById('cast').innerHTML = '<option value="">選択してください</option>' + castOpts;
          const courseOpts = (data.courses || []).map(c => `<option value="${c.id}" data-price="${c.price}">${c.course}</option>`).join('');
          for (let i = 1; i <= 4; i++) {
            document.getElementById('course' + i).innerHTML = '<option value="" data-price="0">選択してください</option>' + courseOpts;
          }
          const extOpts = (data.extends || []).map(e => `<option value="${e.id}" data-price="${e.price}">${e.extend}(${Number(e.price).toLocaleString()}円)</option>`).join('');
          document.getElementById('extend').innerHTML = '<option value="" data-price="0">選択してください</option>' + extOpts;
          const optOpts = (data.options || []).map(o => `<option value="${o.option_id}" data-price="${o.price}">${o.name || o.option?.name}(${Number(o.price || 0).toLocaleString()}円)</option>`).join('');
          for (let i = 1; i <= 5; i++) {
            document.getElementById('option' + i).innerHTML = '<option value="" data-price="0">選択してください</option>' + optOpts;
          }
          const appOpts = (data.appoints || []).map(a =>
            `<option value="0" data-price="${a.panel_price}" data-id="${a.id}">パネル指名</option><option value="1" data-price="${a.repeat_price}" data-id="${a.id}">本指名</option>`
          ).join('');
          document.getElementById('appointment').innerHTML = '<option value="" data-price="0">選択してください</option>' + appOpts;
        }
      } catch (error) {
        console.error(error);
      }
    }

    async function saveVisit(e) {
      e.preventDefault();
      const formShopId = document.getElementById('form_shop_id');
      const formData = {
        member_id: memberId,
        shop_id: isAdmin && formShopId ? formShopId.value : shopId,
        cast: document.getElementById('cast').value,
        course1: document.getElementById('course1').value,
        course1_count: document.getElementById('course1_count').value || 0,
        course1_price: document.getElementById('course1').options[document.getElementById('course1').selectedIndex]?.dataset?.price || 0,
        course2: document.getElementById('course2').value,
        course2_count: document.getElementById('course2_count').value || 0,
        course2_price: document.getElementById('course2').options[document.getElementById('course2').selectedIndex]?.dataset?.price || 0,
        course3: document.getElementById('course3').value,
        course3_count: document.getElementById('course3_count').value || 0,
        course3_price: document.getElementById('course3').options[document.getElementById('course3').selectedIndex]?.dataset?.price || 0,
        course4: document.getElementById('course4').value,
        course4_count: document.getElementById('course4_count').value || 0,
        course4_price: document.getElementById('course4').options[document.getElementById('course4').selectedIndex]?.dataset?.price || 0,
        extend: document.getElementById('extend').value,
        extend_count: document.getElementById('extend_count')?.value || 0,
        extend_price: document.getElementById('extend').options[document.getElementById('extend').selectedIndex]?.dataset?.price || 0,
        option1: document.getElementById('option1').value,
        option1_count: document.getElementById('option1_count').value || 0,
        option1_price: document.getElementById('option1').options[document.getElementById('option1').selectedIndex]?.dataset?.price || 0,
        option2: document.getElementById('option2').value,
        option2_count: document.getElementById('option2_count').value || 0,
        option2_price: document.getElementById('option2').options[document.getElementById('option2').selectedIndex]?.dataset?.price || 0,
        option3: document.getElementById('option3').value,
        option3_count: document.getElementById('option3_count').value || 0,
        option3_price: document.getElementById('option3').options[document.getElementById('option3').selectedIndex]?.dataset?.price || 0,
        option4: document.getElementById('option4').value,
        option4_count: document.getElementById('option4_count').value || 0,
        option4_price: document.getElementById('option4').options[document.getElementById('option4').selectedIndex]?.dataset?.price || 0,
        option5: document.getElementById('option5').value,
        option5_count: document.getElementById('option5_count').value || 0,
        option5_price: document.getElementById('option5').options[document.getElementById('option5').selectedIndex]?.dataset?.price || 0,
        point_use: document.getElementById('point_use').value || 0,
        point: document.getElementById('point').value || 0,
        price: document.getElementById('price').value || 0,
        memo: document.getElementById('memo').value || '',
        discount: document.getElementById('discount')?.value || 0,
        plo_day: document.getElementById('plo_day').checked ? 'on' : '',
        appointmentType: document.getElementById('appointment').options[document.getElementById('appointment').selectedIndex]?.value || '',
        appointmentID: document.getElementById('appointment').options[document.getElementById('appointment').selectedIndex]?.dataset?.id || '',
        appointmentPrice: (document.getElementById('appointment').options[document.getElementById('appointment').selectedIndex]?.dataset?.price || 0) * (document.getElementById('appointment_count').value || 0),
        appointment_count: document.getElementById('appointment_count').value || 0,
      };
      try {
        const response = await fetch(`/api/member/qrupdate`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
          },
          body: JSON.stringify(formData),
        });
        if (response.ok) {
          window.location.reload();
        } else {
          alert('保存に失敗しました');
        }
      } catch (error) {
        alert('エラーが発生しました');
      }
    }

    async function editExtend(id) {
      const editBtn = document.getElementById('edit_extend_btn_' + id);
      const saveBtn = document.getElementById('save_extend_btn_' + id);
      const cancelBtn = document.getElementById('cancel_extend_btn_' + id);
      const extendVal = document.getElementById('extend_val_' + id);
      const extendEdit = document.getElementById('extend_edit_' + id);
      if (editBtn) editBtn.style.display = 'none';
      if (saveBtn) saveBtn.style.display = 'inline-block';
      if (cancelBtn) cancelBtn.style.display = 'inline-block';
      if (extendVal) extendVal.style.display = 'none';
      if (extendEdit) extendEdit.style.display = 'flex';
    }

    function cancelExtend(id) {
      const editBtn = document.getElementById('edit_extend_btn_' + id);
      const saveBtn = document.getElementById('save_extend_btn_' + id);
      const cancelBtn = document.getElementById('cancel_extend_btn_' + id);
      const extendVal = document.getElementById('extend_val_' + id);
      const extendEdit = document.getElementById('extend_edit_' + id);
      if (editBtn) editBtn.style.display = 'inline-block';
      if (saveBtn) saveBtn.style.display = 'none';
      if (cancelBtn) cancelBtn.style.display = 'none';
      if (extendVal) extendVal.style.display = 'block';
      if (extendEdit) extendEdit.style.display = 'none';
    }

    async function saveExtend(id) {
      const extendSelect = document.getElementById('extend_select_' + id);
      const extendCount = document.getElementById('extend_count_' + id);
      const extendPrice = Number(extendSelect?.options[extendSelect?.selectedIndex]?.dataset?.price || 0);
      const formData = {
        id: id,
        extend: extendSelect?.value || '',
        extend_count: extendCount?.value || 0,
        extend_price: extendPrice
      };
      try {
        const response = await fetch(`/api/member/extend_update`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
          },
          body: JSON.stringify(formData),
        });
        if (response.ok) {
          window.location.reload();
        } else {
          alert('更新に失敗しました');
        }
      } catch (error) {
        alert('エラーが発生しました');
      }
    }
  </script>
  @endpush

  <div class="p-4 mx-auto max-w-full md:p-6">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">会員詳細</h2>
      <a href="{{ route('admin.member.index') }}" class="flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">戻る</a>
    </div>

    <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800/50">
      <div class="grid grid-cols-2 md:grid-cols-5 gap-4 p-6">
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">会員番号</label>
          <input type="text" value="{{ $member->id ?? '' }}" readonly class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">携帯番号</label>
          <input type="text" value="{{ $member->tel ?? '' }}" readonly class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">現在のポイント</label>
          <input type="text" value="{{ number_format($today_point ?? 0) }}pt" readonly class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">ニックネーム</label>
          <input type="text" value="{{ $member->name ?? '' }}" readonly class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">会員名</label>
          <input type="text" value="{{ $member->subname ?? '' }}" readonly class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
        </div>
      </div>
    </div>

    <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800/50">
      <form id="visitForm" onsubmit="saveVisit(event)" class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div class="space-y-4">
            @if(auth()->user()?->hasRole('admin') && $shops->count() > 1)
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">店舗</label>
              <select id="form_shop_id" onchange="onShopChange(this.value)" class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
                @foreach($shops as $s)
                <option value="{{ $s->id }}" {{ ($shop_id ?? 0) == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                @endforeach
              </select>
            </div>
            @endif
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">キャスト名</label>
              <select id="cast" name="cast" class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
                <option value="">選択してください</option>
                @foreach($casts as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">指名</label>
              <div class="flex items-center gap-2">
                <select id="appointment" name="appointment" onchange="updatePrice()" class="flex-1 rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
                  <option value="" data-price="0">選択してください</option>
                  @foreach($appoints as $a)
                  <option value="0" data-price="{{ $a->panel_price }}" data-id="{{ $a->id }}">パネル指名</option>
                  <option value="1" data-price="{{ $a->repeat_price }}" data-id="{{ $a->id }}">本指名</option>
                  @endforeach
                </select>
                <span>×</span>
                <input type="number" id="appointment_count" name="appointment_count" value="0" min="0" max="60" onchange="updatePrice()" class="w-16 rounded-lg border border-gray-300 bg-white px-2 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm text-right">
              </div>
            </div>
            @for($i = 1; $i <= 4; $i++)
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">コース</label>
              <div class="flex items-center gap-2">
                <select id="course{{ $i }}" name="course{{ $i }}" onchange="updatePrice()" class="flex-1 rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
                  <option value="" data-price="0">選択してください</option>
                  @foreach($courses as $c)
                  <option value="{{ $c->id }}" data-price="{{ $c->price }}">{{ $c->course }}</option>
                  @endforeach
                </select>
                <button type="button" class="text-gray-400 hover:text-gray-600">&times;</button>
                <input type="number" id="course{{ $i }}_count" name="course{{ $i }}_count" value="0" min="0" max="60" onchange="updatePrice()" class="w-16 rounded-lg border border-gray-300 bg-white px-2 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm text-right">
              </div>
            </div>
            @endfor
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">延長</label>
              <div class="flex items-center gap-2">
                <select id="extend" name="extend" onchange="updatePrice()" class="flex-1 rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
                  <option value="" data-price="0">選択してください</option>
                  @foreach($extends as $e)
                  <option value="{{ $e->id }}" data-price="{{ $e->price }}">{{ $e->extend }}({{ number_format($e->price) }}円)</option>
                  @endforeach
                </select>
                <span>×</span>
                <input type="number" id="extend_count" name="extend_count" value="0" min="0" max="60" onchange="updatePrice()" class="w-16 rounded-lg border border-gray-300 bg-white px-2 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm text-right">
              </div>
            </div>
            @for($i = 1; $i <= 5; $i++)
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">オプション</label>
              <div class="flex items-center gap-2">
                <select id="option{{ $i }}" name="option{{ $i }}" onchange="updatePrice()" class="flex-1 rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
                  <option value="" data-price="0">選択してください</option>
                  @foreach($options as $o)
                  <option value="{{ $o->option_id }}" data-price="{{ $o->price ?? 0 }}">{{ ($o->name ?? $o->option->name ?? '') }}({{ number_format($o->price ?? 0) }}円)</option>
                  @endforeach
                </select>
                <button type="button" class="text-gray-400 hover:text-gray-600">&times;</button>
                <input type="number" id="option{{ $i }}_count" name="option{{ $i }}_count" value="0" min="0" max="60" onchange="updatePrice()" class="w-16 rounded-lg border border-gray-300 bg-white px-2 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm text-right">
              </div>
            </div>
            @endfor
          </div>
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">利用ポイント</label>
              <input type="number" id="point_use" name="point_use" value="0" class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">取得ポイント</label>
              <input type="number" id="point" name="point" value="0" readonly class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
            </div>
            <div class="flex items-center gap-2">
              <input type="checkbox" id="plo_day" name="plo_day" value="1" onchange="updatePrice()" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700">
              <label for="plo_day" class="text-sm font-medium text-gray-700 dark:text-gray-300">PLOの日</label>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">種別</label>
              <select id="type" name="type" class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
                <option value="">選択してください</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">料金</label>
              <input type="number" id="price" name="price" value="0" readonly class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">メモ</label>
              <textarea id="memo" name="memo" rows="4" class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm"></textarea>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">割引</label>
              <select id="discount" name="discount" onchange="updatePrice()" class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 sm:text-sm">
                <option value="0">選択してください</option>
                @for($i = -100; $i >= -50000; $i -= 100)
                <option value="{{ $i }}">{{ number_format(abs($i)) }}円</option>
                @endfor
              </select>
            </div>
          </div>
        </div>
        <div class="-mx-6 -mb-6 mt-8 flex flex-wrap items-center gap-4 border-t border-gray-200 bg-gray-50 px-6 py-6 dark:border-gray-700 dark:bg-gray-800/80">
          <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-8 py-3 text-base font-semibold text-white shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-offset-gray-900">保存</button>
          <a href="{{ route('admin.member.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-8 py-3 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">戻る</a>
        </div>
      </form>
    </div>

    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">来店履歴</h2>
    </div>

    <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800/50">
      <div class="max-w-full overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr class="border-b border-gray-100 dark:border-gray-800">
              <th class="px-5 py-3 sm:px-6 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">来店日</p></th>
              <th class="px-5 py-3 sm:px-6 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">キャスト名</p></th>
              <th class="px-5 py-3 sm:px-6 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">コース</p></th>
              <th class="px-5 py-3 sm:px-6 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">延長</p></th>
              <th class="px-5 py-3 sm:px-6 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">料金</p></th>
              <th class="px-5 py-3 sm:px-6 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">利用ポイント</p></th>
              <th class="px-5 py-3 sm:px-6 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">会員メモ</p></th>
              <th class="px-5 py-3 sm:px-6 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">延長編集</p></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
            @foreach ($histories as $history)
            <tr>
              <td class="px-5 py-4 sm:px-6"><p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $history->created_at ? \Carbon\Carbon::parse($history->created_at)->format('Y-m-d') : '' }}</p></td>
              <td class="px-5 py-4 sm:px-6"><p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $history->casts_name ?? '' }}</p></td>
              <td class="px-5 py-4 sm:px-6"><p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $history->course_name_table ?? '' }}</p></td>
              <td class="px-5 py-4 sm:px-6">
                <span id="extend_val_{{ $history->id }}">{{ $history->extend_name ?? '' }}</span>
                <div id="extend_edit_{{ $history->id }}" style="display:none" class="flex items-center gap-2">
                  <select id="extend_select_{{ $history->id }}" class="rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 sm:text-sm">
                    <option value="" data-price="0">選択してください</option>
                    @foreach(($extendsByShop[$history->shop_id] ?? $extends) as $e)
                    <option value="{{ $e->id }}" data-price="{{ $e->price }}" {{ ($history->extend_id ?? '') == $e->id ? 'selected' : '' }}>{{ $e->extend }}({{ number_format($e->price) }}円)</option>
                    @endforeach
                  </select>
                  <span>×</span>
                  <input type="number" id="extend_count_{{ $history->id }}" value="{{ $history->extend_count ?? 0 }}" min="0" max="60" class="w-16 rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 sm:text-sm text-right">
                </div>
              </td>
              <td class="px-5 py-4 sm:px-6"><p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ number_format($history->price_new ?? 0) }}円</p></td>
              <td class="px-5 py-4 sm:px-6"><p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ number_format($history->point_use ?? 0) }}pt</p></td>
              <td class="px-5 py-4 sm:px-6"><p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $history->memo ?? '' }}</p></td>
              <td class="px-5 py-4 sm:px-6">
                <button type="button" id="edit_extend_btn_{{ $history->id }}" onclick="editExtend({{ $history->id }})" class="flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">編集</button>
                <button type="button" id="save_extend_btn_{{ $history->id }}" style="display:none" onclick="saveExtend({{ $history->id }})" class="flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">保存</button>
                <button type="button" id="cancel_extend_btn_{{ $history->id }}" style="display:none" onclick="cancelExtend({{ $history->id }})" class="flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">キャンセル</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="mt-4 flex items-center justify-between">
      <p class="text-sm text-gray-700 dark:text-gray-400">全{{ $total }}件中 {{ ($page - 1) * $limit + 1 }}-{{ min($page * $limit, $total) }}件を表示</p>
      <div class="flex items-center gap-2">
        @if ($page > 1)
        <a href="{{ request()->fullUrlWithQuery(['page' => $page - 1]) }}" class="flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">前へ</a>
        @endif
        @for ($i = max(1, $page - 2); $i <= min($pages, $page + 2); $i++)
        <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}" class="flex items-center justify-center rounded-lg border {{ $i === $page ? 'border-blue-500 bg-blue-50 text-blue-600 dark:border-blue-500 dark:bg-blue-500/[0.1] dark:text-blue-500' : 'border-gray-300 bg-white text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400' }} px-3 py-2 text-sm font-medium">{{ $i }}</a>
        @endfor
        @if ($page < $pages)
        <a href="{{ request()->fullUrlWithQuery(['page' => $page + 1]) }}" class="flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">次へ</a>
        @endif
      </div>
    </div>

  </div>

  @push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      updatePrice();
    });
  </script>
  @endpush
</x-admin-layout>
