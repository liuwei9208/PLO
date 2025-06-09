document.addEventListener('DOMContentLoaded', function() {
    // 日付ナビゲーション機能
    const scheduleDate = document.querySelector('.schedule-date');
    const prevWeekBtn = document.querySelector('.prev-week-btn');
    const nextWeekBtn = document.querySelector('.next-week-btn');
    const dateTabs = document.querySelector('.date-tabs');
    
    // 現在の日付を設定（テスト用：6/9）
    let currentDate = new Date();
    console.log({currentDate});
    // currentDate.setMonth(5); // 6月（0から始まるため5）
    // currentDate.setDate(9);
    let currentWeekStart = getWeekStart(currentDate);
    console.log({currentWeekStart});
    // 週の開始日を取得する関数
    function getWeekStart(date) {
        // const day = date.getDay();
        // console.log({day});
        // const diff = date.getDate() - day;
        // console.log('date: ', date.getDate());
        // console.log({diff});
        const weekStart = new Date(date);
        // weekStart.setDate(diff);
        return weekStart;
    }

    // 日付をフォーマットする関数
    function formatDate(date) {
        const year = date.getFullYear();
        const month = date.getMonth() + 1;
        const day = date.getDate();
        const weekdays = ['日', '月', '火', '水', '木', '金', '土'];
        const weekday = weekdays[date.getDay()];
        return `${year}年${month}月${day}日(${weekday})`;
    }

    // 先週ボタンの無効化状態を更新する関数
    function updatePrevWeekButtonState() {
        const today = new Date();
        // today.setMonth(5); // 6月（0から始まるため5）
        // today.setDate(9);
        const todayWeekStart = getWeekStart(today);
        console.log({todayWeekStart});
        console.log({currentWeekStart});
        console.log(currentWeekStart.getDate());
        console.log(todayWeekStart.getDate());
        if (currentWeekStart.getMonth() === todayWeekStart.getMonth() && currentWeekStart.getDate() === todayWeekStart.getDate()) {
            prevWeekBtn.classList.add('week-btn-disabled');
        } else {
            prevWeekBtn.classList.remove('week-btn-disabled');
        }
    }

    // 日付タブを生成する関数
    function generateDateTabs(startDate) {
        dateTabs.innerHTML = '';
        for (let i = 0; i < 7; i++) {
            const date = new Date(startDate);
            date.setDate(startDate.getDate() + i);
            const month = date.getMonth() + 1;
            const day = date.getDate();
            const weekdays = ['日', '月', '火', '水', '木', '金', '土'];
            const weekday = weekdays[date.getDay()];
            
            const tab = document.createElement('div');
            tab.className = 'date-tab';
            
            // 土曜日と日曜日のクラスを追加
            if (date.getDay() === 0) { // 日曜日
                tab.classList.add('sunday');
            } else if (date.getDay() === 6) { // 土曜日
                tab.classList.add('saturday');
            }
            
            if (i === 0) {
                tab.classList.add('active');
                tab.innerHTML = `${month}/${day}(${weekday})<div class="active-indicator"></div>`;
            } else {
                tab.textContent = `${month}/${day}(${weekday})`;
            }
            
            tab.addEventListener('click', () => {
                // アクティブなタブを更新
                document.querySelectorAll('.date-tab').forEach(t => {
                    t.classList.remove('active');
                    t.innerHTML = t.textContent;
                });
                tab.classList.add('active');
                tab.innerHTML = `${month}/${day}(${weekday})<div class="active-indicator"></div>`;
                
                // スケジュール日付を更新
                scheduleDate.textContent = `${formatDate(date)}の出勤予定`;
            });
            
            dateTabs.appendChild(tab);
        }
    }

    // 初期表示
    generateDateTabs(currentWeekStart);
    scheduleDate.textContent = `${formatDate(currentWeekStart)}の出勤予定`;
    updatePrevWeekButtonState();

    // 先週ボタンのクリックイベント
    prevWeekBtn.addEventListener('click', () => {
        if (prevWeekBtn.classList.contains('week-btn-disabled')) {
            return;
        }
        
        const newWeekStart = new Date(currentWeekStart);
        newWeekStart.setDate(currentWeekStart.getDate() - 7);
        currentWeekStart = newWeekStart;
        
        generateDateTabs(currentWeekStart);
        scheduleDate.textContent = `${formatDate(currentWeekStart)}の出勤予定`;
        updatePrevWeekButtonState();
    });

    // 翌週ボタンのクリックイベント
    nextWeekBtn.addEventListener('click', () => {
        const newWeekStart = new Date(currentWeekStart);
        newWeekStart.setDate(currentWeekStart.getDate() + 7);
        currentWeekStart = newWeekStart;
        
        generateDateTabs(currentWeekStart);
        scheduleDate.textContent = `${formatDate(currentWeekStart)}の出勤予定`;
        updatePrevWeekButtonState();
    });

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
            
            // まず出勤時間の背景色を更新
            cells.forEach((cell, index) => {
                const cellStartMinutes = 8 * 60 + index * 30;
                const cellEndMinutes = cellStartMinutes + 30;
                
                if (cellStartMinutes < endMinutes && cellEndMinutes > startMinutes) {
                    cell.style.backgroundColor = 'red';
                }
            });

            // 次に登録済みのフォームの時間範囲を表示
            const registeredForms = document.querySelectorAll('.schedule-form.registered');
            registeredForms.forEach(form => {
                const formStartTime = form.querySelector('.form-start-time').value;
                const formEndTime = form.querySelector('.form-end-time').value;
                
                const formStartMinutes = timeToMinutes(formStartTime);
                const formEndMinutes = timeToMinutes(formEndTime);
                
                cells.forEach((cell, index) => {
                    const cellStartMinutes = 8 * 60 + index * 30;
                    const cellEndMinutes = cellStartMinutes + 30;
                    
                    if (cellStartMinutes < formEndMinutes && cellEndMinutes > formStartMinutes) {
                        const currentColor = cell.style.backgroundColor;
                        if (currentColor === 'red') {
                            cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                        }
                    }
                });
            });
        }

        // 時間選択の変更を監視
        startSelect.addEventListener('change', updateGridBackground);
        endSelect.addEventListener('change', updateGridBackground);
    });

    // フォームの追加と削除の機能
    const scheduleForms = document.querySelectorAll('.schedule-forms');

    // フォームの追加と削除のイベントを設定する関数
    function setupFormEvents(form) {
        const deleteBtn = form.querySelector('.delete-form-btn');
        const startTimeSelect = form.querySelector('.form-start-time');
        const endTimeSelect = form.querySelector('.form-end-time');
        const registerBtn = form.querySelector('.register-btn');
        const gridCells = document.querySelectorAll('.grid-cells')[0];

        // 時間を分に変換する関数
        function timeToMinutes(timeStr) {
            const [hours, minutes] = timeStr.split(':').map(Number);
            return hours * 60 + minutes;
        }

        // グリッドセルの背景色を更新する関数
        function updateGridBackground() {
            const startTime = startTimeSelect.value;
            const endTime = endTimeSelect.value;
            
            // 選択された時間を分に変換
            const startMinutes = timeToMinutes(startTime);
            const endMinutes = timeToMinutes(endTime);
            
            // グリッドセルを取得
            const cells = gridCells.querySelectorAll('.grid-cell');
            
            // すべてのセルの背景色をリセット
            cells.forEach(cell => {
                cell.style.backgroundColor = '#eee';
            });
            
            // 出勤時間の背景色を更新
            const workStartTime = document.querySelector('.start-time').value;
            const workEndTime = document.querySelector('.end-time').value;
            const workStartMinutes = timeToMinutes(workStartTime);
            const workEndMinutes = timeToMinutes(workEndTime);
            
            cells.forEach((cell, index) => {
                const cellStartMinutes = 8 * 60 + index * 30;
                const cellEndMinutes = cellStartMinutes + 30;
                
                if (cellStartMinutes < workEndMinutes && cellEndMinutes > workStartMinutes) {
                    cell.style.backgroundColor = 'red';
                }
            });
            
            // 登録済みのフォームの時間範囲を表示
            const registeredForms = document.querySelectorAll('.schedule-form.registered');
            registeredForms.forEach(registeredForm => {
                const formStartTime = registeredForm.querySelector('.form-start-time').value;
                const formEndTime = registeredForm.querySelector('.form-end-time').value;
                
                const formStartMinutes = timeToMinutes(formStartTime);
                const formEndMinutes = timeToMinutes(formEndTime);
                
                cells.forEach((cell, index) => {
                    const cellStartMinutes = 8 * 60 + index * 30;
                    const cellEndMinutes = cellStartMinutes + 30;
                    
                    if (cellStartMinutes < formEndMinutes && cellEndMinutes > formStartMinutes) {
                        const currentColor = cell.style.backgroundColor;
                        if (currentColor === 'red') {
                            cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                        }
                    }
                });
            });
        }

        // 時間選択の変更を監視
        startTimeSelect.addEventListener('change', updateGridBackground);
        endTimeSelect.addEventListener('change', updateGridBackground);

        // 登録ボタンのクリックイベント
        registerBtn.addEventListener('click', function() {
            const startTime = startTimeSelect.value;
            const endTime = endTimeSelect.value;
            
            // 選択された時間を分に変換
            const startMinutes = timeToMinutes(startTime);
            const endMinutes = timeToMinutes(endTime);
            
            // グリッドセルを取得
            const cells = gridCells.querySelectorAll('.grid-cell');
            
            // すべてのセルの背景色をリセット
            cells.forEach(cell => {
                cell.style.backgroundColor = '#eee';
            });
            
            // 1. まず出勤時間の背景色を更新
            const workStartTime = document.querySelector('.start-time').value;
            const workEndTime = document.querySelector('.end-time').value;
            const workStartMinutes = timeToMinutes(workStartTime);
            const workEndMinutes = timeToMinutes(workEndTime);
            
            cells.forEach((cell, index) => {
                const cellStartMinutes = 8 * 60 + index * 30;
                const cellEndMinutes = cellStartMinutes + 30;
                
                if (cellStartMinutes < workEndMinutes && cellEndMinutes > workStartMinutes) {
                    cell.style.backgroundColor = 'red';
                }
            });
            
            // 2. クリックしたフォームの時間範囲の背景色を更新
            cells.forEach((cell, index) => {
                const cellStartMinutes = 8 * 60 + index * 30;
                const cellEndMinutes = cellStartMinutes + 30;
                
                if (cellStartMinutes < endMinutes && cellEndMinutes > startMinutes) {
                    const currentColor = cell.style.backgroundColor;
                    if (currentColor === 'red') {
                        cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                    }
                }
            });

            // 3. 登録済みのフォームの時間範囲を表示
            const registeredForms = document.querySelectorAll('.schedule-form.registered');
            registeredForms.forEach(registeredForm => {
                const formStartTime = registeredForm.querySelector('.form-start-time').value;
                const formEndTime = registeredForm.querySelector('.form-end-time').value;
                
                const formStartMinutes = timeToMinutes(formStartTime);
                const formEndMinutes = timeToMinutes(formEndTime);
                
                cells.forEach((cell, index) => {
                    const cellStartMinutes = 8 * 60 + index * 30;
                    const cellEndMinutes = cellStartMinutes + 30;
                    
                    if (cellStartMinutes < formEndMinutes && cellEndMinutes > formStartMinutes) {
                        const currentColor = cell.style.backgroundColor;
                        if (currentColor === 'red') {
                            cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                        }
                    }
                });
            });

            // 登録済み状態に変更
            registerBtn.textContent = '登録済';
            registerBtn.classList.add('registered');
            form.classList.add('registered');
        });

        deleteBtn.addEventListener('click', function() {
            // フォームが登録済みの場合のみ時間グリッドを更新
            if (form.classList.contains('registered')) {
                // グリッドセルを取得
                const cells = gridCells.querySelectorAll('.grid-cell');
                
                // すべてのセルの背景色をリセット
                cells.forEach(cell => {
                    cell.style.backgroundColor = '#eee';
                });
                
                // 出勤時間の背景色を更新
                const workStartTime = document.querySelector('.start-time').value;
                const workEndTime = document.querySelector('.end-time').value;
                const workStartMinutes = timeToMinutes(workStartTime);
                const workEndMinutes = timeToMinutes(workEndTime);
                
                cells.forEach((cell, index) => {
                    const cellStartMinutes = 8 * 60 + index * 30;
                    const cellEndMinutes = cellStartMinutes + 30;
                    
                    if (cellStartMinutes < workEndMinutes && cellEndMinutes > workStartMinutes) {
                        cell.style.backgroundColor = 'red';
                    }
                });
                
                // 登録済みのフォームの時間範囲を表示
                const registeredForms = document.querySelectorAll('.schedule-form.registered');
                registeredForms.forEach(registeredForm => {
                    // 削除対象のフォームは除外
                    if (registeredForm === form) return;
                    
                    const formStartTime = registeredForm.querySelector('.form-start-time').value;
                    const formEndTime = registeredForm.querySelector('.form-end-time').value;
                    
                    const formStartMinutes = timeToMinutes(formStartTime);
                    const formEndMinutes = timeToMinutes(formEndTime);
                    
                    cells.forEach((cell, index) => {
                        const cellStartMinutes = 8 * 60 + index * 30;
                        const cellEndMinutes = cellStartMinutes + 30;
                        
                        if (cellStartMinutes < formEndMinutes && cellEndMinutes > formStartMinutes) {
                            const currentColor = cell.style.backgroundColor;
                            if (currentColor === 'red') {
                                cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                            }
                        }
                    });
                });
            }
            
            // フォームを削除して追加ボタンに置き換え
            const addBtn = createAddButton();
            form.replaceWith(addBtn);
            setupAddButtonEvents(addBtn);
        });
    }

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
