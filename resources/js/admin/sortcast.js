mport axios from 'axios'

let shop = '';
let is_public = '';
let castName = '';
let selectedDate = '';
let dragSrcEl;

if (document.querySelector('#search_form_shop')) {
    shop = document.querySelector('#search_form_shop').value;

    document.querySelector('#search_form_shop').addEventListener('change', async (e) => {
        e.preventDefault();
        shop = e.target.value;
        await getCastsSchedule(castName,shop,is_public,selectedDate);
    });
}

console.log(window.apiToken);

document.addEventListener('DOMContentLoaded', async function() {
    // 日付ナビゲーション機能
    const scheduleDate = document.querySelector('.schedule-date');
    const prevWeekBtn = document.querySelector('.prev-week-btn');
    const nextWeekBtn = document.querySelector('.next-week-btn');
    const dateTabs = document.querySelector('.date-tabs');

    // 現在の日付を設定（テスト用：6/9）
    let currentDate = new Date();
    console.log({currentDate});

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
        const todayWeekStart = getWeekStart(today);
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

            tab.addEventListener('click', async () => {
                // アクティブなタブを更新
                document.querySelectorAll('.date-tab').forEach(t => {
                    t.classList.remove('active');
                    t.innerHTML = t.textContent;
                });
                tab.classList.add('active');
                tab.innerHTML = `${month}/${day}(${weekday})<div class="active-indicator"></div>`;

                // スケジュール日付を更新
                scheduleDate.textContent = `${formatDate(date)}の出勤予定`;
                selectedDate = date.toDateString()
                await getCastsSchedule(castName, shop, is_public, selectedDate);
            });

            dateTabs.appendChild(tab);
        }
    }

    // 初期表示
    generateDateTabs(currentWeekStart);
    console.log(currentWeekStart);
    selectedDate = currentDate.toDateString();
    await getCastsSchedule(castName, shop, is_public, selectedDate);
    scheduleDate.textContent = `${formatDate(currentWeekStart)}の出勤予定`;
    updatePrevWeekButtonState();
    // 先週ボタンのクリックイベント
    prevWeekBtn.addEventListener('click', async () => {
        if (prevWeekBtn.classList.contains('week-btn-disabled')) {
            return;
        }

        const newWeekStart = new Date(currentWeekStart);
        newWeekStart.setDate(currentWeekStart.getDate() - 7);
        currentWeekStart = newWeekStart;

        generateDateTabs(currentWeekStart);
        scheduleDate.textContent = `${formatDate(currentWeekStart)}の出勤予定`;
        updatePrevWeekButtonState();

        selectedDate = currentWeekStart.toDateString();
        await getCastsSchedule(castName, shop, is_public, selectedDate);
    });

    // 翌週ボタンのクリックイベント
    nextWeekBtn.addEventListener('click', async () => {
        const newWeekStart = new Date(currentWeekStart);
        newWeekStart.setDate(currentWeekStart.getDate() + 7);
        currentWeekStart = newWeekStart;

        generateDateTabs(currentWeekStart);
        scheduleDate.textContent = `${formatDate(currentWeekStart)}の出勤予定`;
        updatePrevWeekButtonState();

        // 追加: 翌週ボタンでリストをリフレッシュ
        selectedDate = currentWeekStart.toDateString();
        await getCastsSchedule(castName, shop, is_public, selectedDate);
    });
});

function convertDateTimeToTime(dateTime) {
    const date = new Date(dateTime);
    return date.toLocaleTimeString('ja-JP', { hour: '2-digit', minute: '2-digit', hour12: false , hourCycle: 'h23' , separator: ':'});
}

async function updateCastRanking(allCastRanking) {
    try {
        // await axios.get('/sanctum/csrf-cookie', { withCredentials: true });
        const response = await axios.post('/api/cast/updateranking', {
            allCastRanking
        }, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': 'Bearer ' + window.apiToken
            },
            // credentials: 'include'
            // withCredentials: true
        });

        console.log('サーバーレスポンス:', response.data);

        if (response.data.status === 'success') {
            console.log('更新成功:', response.data);
            return response.data;
        } else {
            throw new Error(response.data.message || '更新に失敗しました');
        }
    } catch (error) {
        console.error('エラーが発生しました:', error);
        if (error.response) {
            console.error('エラーレスポンス:', error.response.data);
            alert('更新中にエラーが発生しました: ' + (error.response.data.message || error.message));
        } else if (error.request) {
            console.error('リクエストエラー:', error.request);
            alert('サーバーからの応答がありません。ネットワーク接続を確認してください。');
        } else {
            console.error('リクエスト設定エラー:', error.message);
            alert('リクエストの処理中にエラーが発生しました: ' + error.message);
        }
        throw error;
    }
}

/*
* キャストの出勤・予約を取得する関数
* @param {string} date - 日付
*/
async function getCastsSchedule(castName, shop, is_public, date_l) {
    try {
        console.log('リクエストパラメータ:', {
            castName,
            shop,
            is_public,
            date_l,
        });
        // await axios.get('/sanctum/csrf-cookie', { withCredentials: true });
        const response = await axios.post('/api/cast/sorted', {
            castName: castName,
            shop: shop,
            public: is_public,
            date: date_l,
        }, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': 'Bearer ' + window.apiToken
            },
            // credentials: 'include'
            // withCredentials: true
        });

        console.log('サーバーレスポンス:', response.data);

        if (response.data.status === 'success') {
            console.log('取得成功:', response.data);
            const casts = response.data.casts;

            const imgUrl = window.location.origin + '/storage/';
            document.querySelector('.sort-cast-container').innerHTML = casts.map((cast, index) => {
                let attendanceStartTime = convertDateTimeToTime(cast.start_datetime);
                let attendanceEndTime = convertDateTimeToTime(cast.end_datetime);

                return `
                    <div class="cast-card" draggable="true" data-id="${cast.id}" data-rank="${cast.rank ? cast.rank : index + 1}">
                        <div class="cast-rank">
                            <input name=${cast.name} type="number" value=${cast.rank ? cast.rank : index + 1} />
                        </div>
                        <div class="cast-info">
                            <div class="cast-avatar">
                                <img src=${imgUrl + cast.gallery_1} />
                            </div>
                            <div class="cast-detail">
                                ${cast.name}<br>
                                ${attendanceStartTime} - ${attendanceEndTime}
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            document.querySelectorAll('.cast-card').forEach(card => {
                card.addEventListener('dragstart', (e) => {
                    dragSrcEl = e.target;
                    e.target.classList.add('dragging');
                });

                card.addEventListener('dragend', (e) => {
                    e.target.classList.remove('dragging');
                });

                card.addEventListener('dragover', (e) => {
                    e.preventDefault();
                });

                card.addEventListener('drop', async (e) => {
                    e.preventDefault();
                    const dragDstEl = e.target.closest(".cast-card");
                    if (dragSrcEl !== dragDstEl) {
                        if (
                            dragSrcEl.nextSibling === dragDstEl ||
                            dragDstEl.nextSibling === dragSrcEl
                        ) {
                            const parent = dragDstEl.parentNode;
                            if (dragSrcEl.nextSibling === dragDstEl) {
                                parent.insertBefore(dragDstEl, dragSrcEl);
                            } else {
                                parent.insertBefore(dragSrcEl, dragDstEl);
                            }
                        } else {
                            dragDstEl.parentNode.insertBefore(dragSrcEl, dragDstEl);
                        }

                        const allCastRanking = [];
                        document.querySelectorAll('.cast-card').forEach((card, index) => {
                            allCastRanking.push({
                                id: card.dataset.id,
                                rank: index + 1
                            })
                        })

                        const response = await updateCastRanking(allCastRanking);

                        if (response.status === 'success') {
                            document.querySelectorAll('.cast-card').forEach((card, index) => {
                                card.querySelector("input").value = index + 1
                            })
                        } else {
                            temp = dragSrcEl.dataset.id;
                            dragSrcEl.dataset.id = dragDstEl.dataset.id;
                            dragDstEl.dataset.id = temp;

                            throw new Error(response.message || '更新に失敗しました');
                        }
                    }
                });

                const rankInput = card.querySelector("input");
                rankInput.addEventListener('change', async (e) => {
                    let dstCardNo = parseInt(e.target.value, 10) - 1;
                    const container = card.parentElement;
                    const cards = Array.from(container.querySelectorAll('.cast-card'));
                    const currentIdx = cards.indexOf(card);
                    console.log("111", dstCardNo, currentIdx, cards.length)

                    if (dstCardNo >= 0) {
                        if (dstCardNo == currentIdx) {
                            return
                        }
                        if (dstCardNo > cards.length - 1) {
                            dstCardNo = cards.length - 1;
                        }
                        // Remove the card from its current position
                        container.removeChild(card);
                        // Insert the card at the new position
                        if (dstCardNo > cards.length - 1) {
                            container.appendChild(card);
                        } else {
                            if (dstCardNo > currentIdx) {
                                container.insertBefore(card, cards[dstCardNo + 1]);
                            } else {
                                container.insertBefore(card, cards[dstCardNo]);
                            }
                        }

                        // Update all ranks and send to server
                        const allCastRanking = [];
                        container.querySelectorAll('.cast-card').forEach((c, idx) => {
                            c.querySelector("input").value = idx + 1;
                            allCastRanking.push({
                                id: c.dataset.id,
                                rank: idx + 1
                            });
                        });

                        const response = await updateCastRanking(allCastRanking);

                        console.log("1111", response.status)
                        if (response.status === 'success') {
                            document.querySelectorAll('.cast-card').forEach((card, index) => {
                                card.querySelector("input").value = index + 1
                            })
                        } else {
                            throw new Error(response.message || '更新に失敗しました');
                        }
                    } else {
                        rankInput.value = parseInt(card.dataset.rank);
                        return
                    }
                })
            });

            return {selectedDate};
        } else {
            throw new Error(response.data.message || 'データの取得に失敗しました');
        }
    } catch (error) {
        console.error('エラーが発生しました:', error);
        if (error.response) {
            // サーバーからのエラーレスポンス
            console.error('エラーレスポンス:', error.response.data);
            alert('データの取得中にエラーが発生しました: ' + (error.response.data.message || error.message));
        } else if (error.request) {
            // リクエストは送信されたがレスポンスがない
            console.error('リクエストエラー:', error.request);
            alert('サーバーからの応答がありません。ネットワーク接続を確認してください。');
        } else {
            // リクエストの設定中にエラーが発生
            console.error('リクエスト設定エラー:', error.message);
            alert('リクエストの処理中にエラーが発生しました: ' + error.message);
        }
    }
}
