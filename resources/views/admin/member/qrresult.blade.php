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
                  <td class="p-1 border-b border-r border-gray-400" id="member_id">{{ $member->id }}</td>
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
                  <td class="p-1 border-b border-r border-gray-400" colspan="3">{{ $member->pay }}</td>
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
                  @foreach( $histories as $history)
                  <tr>
                    <td class="p-1 border-b border-r border-gray-400 h-8">{{ $history->created_at ? \Carbon\Carbon::parse($history->created_at)->format('Y-m-d') : '' }}</td>
                    <td class="p-1 border-b border-r border-gray-400">{{ $history->casts_name }}</td>
                    <td class="p-1 border-b border-r border-gray-400">{{ $history->course_name_table }}</td>
                    <td class="p-1 border-b border-r border-gray-400">{{ $history->extension_name }}</td>
                    <td class="p-1 border-b border-r border-gray-400 text-right pr-2">{{ $history->price_new }}</td>
                    <td class="p-1 border-b border-r border-gray-400">{{ $history->point_use }}</td>
                    <td class="p-1 border-b border-r border-gray-400">{{ $history->memo }}</td>
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
          <!-- Right side -->
          <div class="w-1/3" style="width: 30%;">
            <div class="text-right mb-2 font-semibold">{{ \Carbon\Carbon::now()->format('Y年m月d日') }}</div>
            <table class="w-full text-sm border-collapse border border-gray-400">
              <tbody>
                <tr>
                  <th class="p-1 w-[100px] font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">利用ポイント</th>
                  <td class="p-1 border-b border-gray-400"><input type="number" value="0" class="p-1 border border-gray-400 text-right w-full" name="point_use" id="point_use"></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">取得ポイント</th>
                  <td class="p-1 border-b border-gray-400"><input type="number" name="point" id="point" value="0" class="p-1 border border-gray-400 text-right w-full" readonly></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">PLOの日</th>
                  <td class="p-1 border-b border-gray-400"><input type="checkbox" name="plo_day" id="plo_day" value="1" class="p-1 border border-gray-400 text-right w-full" onchange="updatePrice()"></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">料金</th>
                  <td class="p-1 border-b border-gray-400"><input name="price" readonly id="price" type="number" value="0" class="p-1 border border-gray-400 text-right w-full"></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">キャスト名</th>
                  <td class="p-1 border-b border-gray-400">
                    <select class="p-1 border border-gray-400 w-full bg-white" name="cast" id="cast">
                      <option value=""></option>
                      @foreach( $casts as $cast )
                      <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">指名</th>
                  <td class="p-1 border-b border-gray-400 flex gap-2"><label><input type="radio" name="appointment" id="appointment" value="0" data-price="{{ $appoints[0]->panel_price }}" data-id="{{ $appoints[0]->id }}" class="p-1 border border-gray-400 text-right w-full" onchange="updatePrice()">パネル指名</label><label><input type="radio" name="appointment" id="appointment" value="1" data-price="{{ $appoints[0]->repeat_price }}" data-id="{{ $appoints[0]->id }}" class="p-1 border border-gray-400 text-right w-full" onchange="updatePrice()">本指名</label></td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">コース</th>
                  <td class="p-1 border-b border-gray-400">
                    <select class="p-1 border border-gray-400 w-full bg-white" name="course" id="course" onchange="updatePrice()">
                      <option value="" data-price="0">選択してください</option>
                      @foreach( $courses as $course )
                      <option value="{{ $course->id }}" data-price="{{ $course->price }}">{{ $course->course }}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">延長</th>
                  <td class="p-1 border-b border-gray-400">
                    <select class="p-1 border border-gray-400 w-full bg-white" name="extend" id="extend" onchange="updatePrice()">
                      <option value="" data-price="0">選択してください</option>
                      @foreach( $extends as $extend )
                      <option value="{{ $extend->id }}" data-price="{{ $extend->price }}">{{ $extend->extend }}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                @for($i = 1 ; $i <= 5 ; $i++)
                <tr>
                <th class="p-1 font-semibold bg-gray-100 border-b border-r border-gray-400 text-left" style="width: 100px;">オプション</th>
                  <td class="p-1 border-b border-gray-400 flex gap-2">
                    <select class="p-1 border border-gray-400 w-full bg-white" name="option.{{ $i }}" id="option{{ $i }}" onchange="updatePrice()">
                      <option value="" data-price="0">選択してください</option>
                      @foreach( $options as $option )
                      <option value="{{ $option->id }}" data-price="{{ $option->price }}">{{ $option->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  </tr>
                  @endfor
                <tr>
                  <th class="p-1 font-semibold bg-gray-100 border-r border-gray-400 text-left" style="width: 100px;">メモ</th>
                </tr>
                <tr>
                  <td class="p-1" colspan="2"><textarea class="p-1 border border-gray-400 w-full" style="width: 100%; height: 100px;" name="memo" id="memo"></textarea></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="mt-4 flex justify-end gap-4">
          <button class="px-8 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" style="background-color: #2563eb; color: white; border-radius: 0.375rem; border: none; cursor: pointer; width: 100px;" onclick="saveInfo(event)">保存</button>
          <a href="{{ route('admin.member.qrcode') }}" class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 text-center" style="border-radius: 0.375rem; width: 100px; display: inline-block; text-decoration: none; color: inherit;">戻る</a>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>
<script>
  function updatePrice(){
    const courseSelect = document.getElementById('course');
    const extendSelect = document.getElementById('extend');
    const option1Select = document.getElementById('option1');
    const option2Select = document.getElementById('option2');
    const option3Select = document.getElementById('option3');
    const option4Select = document.getElementById('option4');
    const option5Select = document.getElementById('option5');
    const appointmentRadios = document.getElementsByName('appointment');
    let appointmentType = '';
    let appointmentPrice = 0;
    let appointmentID = '';
    for (const radio of appointmentRadios) {
      if (radio.checked) {
        appointmentType = radio.value;
        appointmentPrice = parseFloat(radio.dataset.price || 0);
        appointmentID = radio.dataset.id;
        break;
      }
    }
    console.log({appointmentPrice});
    // const appointment = document.getElementById('appointment').value;
    const course_price = Number(courseSelect.options[courseSelect.selectedIndex]?.dataset?.price || 0);
    const extend_price = Number(extendSelect.options[extendSelect.selectedIndex]?.dataset?.price || 0);
    const option1_price = Number(option1Select.options[option1Select.selectedIndex]?.dataset?.price || 0);
    const option2_price = Number(option2Select.options[option2Select.selectedIndex]?.dataset?.price || 0);
    const option3_price = Number(option3Select.options[option3Select.selectedIndex]?.dataset?.price || 0);
    const option4_price = Number(option4Select.options[option4Select.selectedIndex]?.dataset?.price || 0);
    const option5_price = Number(option5Select.options[option5Select.selectedIndex]?.dataset?.price || 0);

    const price = course_price + extend_price + option1_price + option2_price + option3_price + option4_price + option5_price + appointmentPrice;

    const plo_day = document.getElementById('plo_day').checked;
    const point = plo_day ? price * 0.1 : price * 0.03;
    console.log(price);
    document.getElementById('price').value = price;
    document.getElementById('point').value = point;
  }
  const token = '{{ $token }}';
  const member_id = '{{ $member->id }}';
  async function saveInfo(event){
    event.preventDefault();
    const point_use = document.getElementById('point_use').value;
    const point = document.getElementById('point').value;
    const price = document.getElementById('price').value;
    const cast = document.getElementById('cast').value;
    const course = document.getElementById('course').value;
    const courseSelect = document.getElementById('course');
    const course_price = courseSelect.options[courseSelect.selectedIndex]?.dataset?.price || 0;
    const extend = document.getElementById('extend').value;
    const extendSelect = document.getElementById('extend');
    const extend_price = extendSelect.options[extendSelect.selectedIndex]?.dataset?.price || 0;
    const option1 = document.getElementById('option1').value;
    const option1Select = document.getElementById('option1');
    const option1_price = option1Select.options[option1Select.selectedIndex]?.dataset?.price || 0;
    const option2 = document.getElementById('option2').value;
    const option2Select = document.getElementById('option2');
    const option2_price = option2Select.options[option2Select.selectedIndex]?.dataset?.price || 0;
    const option3 = document.getElementById('option3').value;
    const option3Select = document.getElementById('option3');
    const option3_price = option3Select.options[option3Select.selectedIndex]?.dataset?.price || 0;
    const option4 = document.getElementById('option4').value;
    const option4Select = document.getElementById('option4');
    const option4_price = option4Select.options[option4Select.selectedIndex]?.dataset?.price || 0;
    const option5 = document.getElementById('option5').value;
    const option5Select = document.getElementById('option5');
    const option5_price = option5Select.options[option5Select.selectedIndex]?.dataset?.price || 0;
    const memo = document.getElementById('memo').value;
    // const member_id = document.getElementById('member_id').value;
    const appointmentRadios = document.getElementsByName('appointment');
    let appointmentType = '';
    let appointmentPrice = 0;
    let appointmentID = '';
    for (const radio of appointmentRadios) {
      if (radio.checked) {
        appointmentType = radio.value;
        appointmentPrice = parseFloat(radio.dataset.price || 0);
        appointmentID = radio.dataset.id;
        break;
      }
    }

    const formData = {
      point_use: point_use,
      point: point,
      price: price,
      cast: cast,
      course: course,
      course_price: course_price,
      extend: extend,
      extend_price: extend_price,
      option1: option1,
      option1_price: option1_price,
      option2: option2,
      option2_price: option2_price,
      option3: option3,
      option3_price: option3_price,
      option4: option4,
      option4_price: option4_price,
      option5: option5,
      option5_price: option5_price,
      memo: memo,
      member_id: member_id,
      appointmentType: appointmentType,
      appointmentID: appointmentID,
      appointmentPrice: appointmentPrice
    };

    try{
      const response = await fetch(`/api/member/qrupdate`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          'Authorization': `Bearer ${token}`
        },
        body: JSON.stringify(formData),
        // credentials: 'include'
      });
      if (response.ok){
        window.location.reload();
      }else{
        console.error('更新に失敗しました');
        alert('更新に失敗しました');
      }
    }catch(error){
      console.error('エラーが発生しました:', error);
      alert('エラーが発生しました');
    }
  }
</script>