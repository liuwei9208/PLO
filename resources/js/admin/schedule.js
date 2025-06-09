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
});
