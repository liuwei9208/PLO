@props(['id' => 'age-verification-modal'])

<div id="{{ $id }}" class="age-verification-modal" style="display: none;">
    <div class="age-verification-overlay"></div>
    <div class="age-verification-content">
        <div class="age-verification-header">
            <div class="age-verification-logo">
                <img src="{{ asset('assets/img/age.png') }}" alt="年齢確認ロゴ">
            </div>
            {{-- <h2 class="age-verification-title">年齢確認</h2> --}}
        </div>
        <div class="age-verification-body">
            <div class="age-verification-message">
                <p>このサイトは風俗サイトです</p>
                <p>18歳未満の方はEXITへ</p>
            </div>
            <div class="age-verification-buttons">
                <button type="button" class="age-verification-btn age-verification-btn-yes" onclick="confirmAge(true)">
                    ENTER
                </button>
                <button type="button" class="age-verification-btn age-verification-btn-no" onclick="confirmAge(false)">
                    EXIT
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
    height: 100vh;
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
    /* background-color: rgba(0, 0, 0, 0.8); */
}

.age-verification-content {
    position: relative;
    background-color: rgba(255, 255, 255, 0.8);
    /* border-radius: 24px; */
    padding: 40px;
    width: 100%;
    height: 100%;
    text-align: center;
    /* box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); */
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.age-verification-header {
    margin-bottom: 20px;
}

.age-verification-logo {
    /* margin-bottom: 20px; */
}

.age-verification-logo img {
    /* max-width: 200px; */
    width: 50%;
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
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.age-verification-message {
    margin-bottom: 25px;
}

.age-verification-message p {
    font-size: 16px;
    color: #000;
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
    padding: 16px 32px;
    /* border: none; */
    border-radius: 100px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    /* min-width: 160px; */
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 140px;
    height: 140px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #000;
}

.age-verification-btn-yes {
    background-color: #fff !important;
    color: black;
    /* box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3); */
}

.age-verification-btn-yes:hover {
    background-color: #ccc !important;
    transform: translateY(-2px);
    /* box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4); */
}

.age-verification-btn-no {
    background-color: #fff !important;
    color: black;
    /* box-shadow: 0 4px 15px rgba(244, 67, 54, 0.3); */
}

.age-verification-btn-no:hover {
    background-color: #ccc !important;
    transform: translateY(-2px);
    /* box-shadow: 0 6px 20px rgba(244, 67, 54, 0.4); */
}

@media (max-width: 767px) {
    .age-verification-content {
        padding: 30px 20px;
        margin: 15px;
        border-radius: 20px;
    }

    .age-verification-logo img {
        max-width: 150px;
    }

    .age-verification-title {
        font-size: 20px;
    }

    .age-verification-message p {
        font-size: 16px;
    }

    .age-verification-buttons {
        flex-direction: column;
        gap: 12px;
    }

    .age-verification-btn {
        width: 100%;
        padding: 14px 24px;
        font-size: 16px;
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