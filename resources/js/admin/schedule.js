document.addEventListener('DOMContentLoaded', function() {
    // 時間選択の要素を取得
    const startTimeSelects = document.querySelectorAll('.start-time');
    const endTimeSelects = document.querySelectorAll('.end-time');

    // 時間選択の変更を監視
    startTimeSelects.forEach((startSelect, index) => {
        const endSelect = endTimeSelects[index];
        const gridCells = document.querySelectorAll('.grid-cells')[index];

        // 時間を分に変換する関数
        function timeToMinutes(timeStr) {
            const [hours, minutes] = timeStr.split(':').map(Number);
            return hours * 60 + minutes;
        }

        // グリッドセルの背景色を更新する関数
        function updateGridBackground() {
            const startTime = startSelect.value;
            const endTime = endSelect.value;
            
            // 選択された時間を分に変換
            const startMinutes = timeToMinutes(startTime);
            const endMinutes = timeToMinutes(endTime);
            
            // グリッドセルを取得
            const cells = gridCells.querySelectorAll('.grid-cell');
            
            // すべてのセルの背景色をリセット
            cells.forEach(cell => {
                cell.style.backgroundColor = '#eee';
            });
            
            // 選択された時間範囲のセルの背景色を変更
            cells.forEach((cell, index) => {
                const cellStartMinutes = 8 * 60 + index * 30; // 8時から30分間隔で計算
                const cellEndMinutes = cellStartMinutes + 30;
                
                if (cellStartMinutes >= startMinutes && cellEndMinutes <= endMinutes) {
                    cell.style.backgroundColor = 'red';
                }
            });
        }

        // 時間選択の変更を監視
        startSelect.addEventListener('change', updateGridBackground);
        endSelect.addEventListener('change', updateGridBackground);
    });

    // フォームの追加と削除の機能
    const scheduleForms = document.querySelectorAll('.schedule-forms');

    // 新しいフォームを作成する関数
    function createNewForm() {
        const newForm = document.createElement('div');
        newForm.className = 'schedule-form active';
        newForm.innerHTML = `
            <button class="delete-form-btn">×</button>
            <div class="form-time-selector">
                <select class="form-start-time">
                    ${generateTimeOptions()}
                </select>
                <span class="form-time-separator">～</span>
                <select class="form-end-time">
                    ${generateTimeOptions()}
                </select>
            </div>
            <button class="register-btn">登録</button>
        `;
        return newForm;
    }

    // 追加ボタンを作成する関数
    function createAddButton() {
        const addBtn = document.createElement('div');
        addBtn.className = 'add-form-btn';
        addBtn.textContent = '＋';
        return addBtn;
    }

    // フォームの追加と削除のイベントを設定する関数
    function setupFormEvents(form) {
        const deleteBtn = form.querySelector('.delete-form-btn');
        deleteBtn.addEventListener('click', function() {
            const addBtn = createAddButton();
            form.replaceWith(addBtn);
            setupAddButtonEvents(addBtn);
        });
    }

    // 追加ボタンのイベントを設定する関数
    function setupAddButtonEvents(addBtn) {
        addBtn.addEventListener('click', function() {
            const newForm = createNewForm();
            this.replaceWith(newForm);
            setupFormEvents(newForm);
        });
    }

    scheduleForms.forEach(scheduleForm => {
        // 既存の追加ボタンにイベントを設定
        const addButtons = scheduleForm.querySelectorAll('.add-form-btn');
        addButtons.forEach(addButton => {
            setupAddButtonEvents(addButton);
        });

        // 既存のフォームの削除ボタンにイベントを設定
        const deleteButtons = scheduleForm.querySelectorAll('.delete-form-btn');
        deleteButtons.forEach(deleteButton => {
            const form = deleteButton.closest('.schedule-form');
            deleteButton.addEventListener('click', function() {
                const addBtn = createAddButton();
                form.replaceWith(addBtn);
                setupAddButtonEvents(addBtn);
            });
        });
    });

    // 時間オプションを生成する関数
    function generateTimeOptions() {
        let options = '';
        for (let hour = 8; hour <= 24; hour++) {
            for (let min = 0; min < 60; min += 30) {
                if (hour === 24 && min === 30) continue;
                const timeStr = `${hour.toString().padStart(2, '0')}:${min.toString().padStart(2, '0')}`;
                options += `<option value="${timeStr}">${timeStr}</option>`;
            }
        }
        return options;
    }
});
