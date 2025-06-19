@props(['id' => 'age-verification-modal'])

<div id="{{ $id }}" class="age-verification-modal" style="display: none;">
    <div class="age-verification-overlay"></div>
    <div class="age-verification-content">
        <div class="age-verification-header">
            <div class="age-verification-logo">
                <img src="{{ asset('assets/img/age.png') }}" alt="年齢確認ロゴ">
            </div>
            <h2 class="age-verification-title">年齢確認</h2>
        </div>
        <div class="age-verification-body">
            <div class="age-verification-message">
                <p>このサイトは18歳以上の方のみご利用いただけます。</p>
                <p>あなたは18歳以上ですか？</p>
            </div>
            <div class="age-verification-buttons">
                <button type="button" class="age-verification-btn age-verification-btn-yes" onclick="confirmAge(true)">
                    はい（18歳以上）
                </button>
                <button type="button" class="age-verification-btn age-verification-btn-no" onclick="confirmAge(false)">
                    いいえ（18歳未満）
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.age-verification-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.age-verification-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
}

.age-verification-content {
    position: relative;
    background-color: #fff;
    border-radius: 12px;
    padding: 30px;
    max-width: 500px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.age-verification-header {
    margin-bottom: 20px;
}

.age-verification-logo {
    /* margin-bottom: 20px; */
}

.age-verification-logo img {
    /* max-width: 200px; */
    width:100%;
    height: auto;
    margin: 0 auto;
}

.age-verification-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin: 0;
}

.age-verification-body {
    margin-bottom: 20px;
}

.age-verification-message {
    margin-bottom: 25px;
}

.age-verification-message p {
    font-size: 16px;
    color: #666;
    margin: 10px 0;
    line-height: 1.5;
}

.age-verification-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.age-verification-btn {
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 140px;
}

.age-verification-btn-yes {
    background-color: #4CAF50 !important;
    color: white;
}

.age-verification-btn-yes:hover {
    background-color: #45a049 !important;
}

.age-verification-btn-no {
    background-color: #f44336 !important;
    color: white;
}

.age-verification-btn-no:hover {
    background-color: #da190b;
}

@media (max-width: 767px) {
    .age-verification-content {
        padding: 20px;
        margin: 20px;
    }
    
    .age-verification-logo img {
        max-width: 150px;
    }
    
    .age-verification-title {
        font-size: 20px;
    }
    
    .age-verification-message p {
        font-size: 14px;
    }
    
    .age-verification-buttons {
        flex-direction: column;
    }
    
    .age-verification-btn {
        width: 100%;
    }
}
</style>

<script>
function confirmAge(isAdult) {
    const modal = document.getElementById('{{ $id }}');
    
    if (isAdult) {
        // 18歳以上の場合
        localStorage.setItem('ageVerified', 'true');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    } else {
        // 18歳未満の場合
        alert('申し訳ございませんが、18歳未満の方はご利用いただけません。');
        window.location.href = 'https://www.google.com';
    }
}

// ページ読み込み時に年齢確認をチェック
document.addEventListener('DOMContentLoaded', function() {
    const ageVerified = localStorage.getItem('ageVerified');
    const modal = document.getElementById('{{ $id }}');
    
    if (!ageVerified || ageVerified == 'false') {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
});
</script> 