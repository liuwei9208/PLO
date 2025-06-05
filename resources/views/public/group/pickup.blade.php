<x-public-group-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- Pickup -->
 <!-- ピックアップ - Pickup Girl -->
 <section class="pickup">
  <div class="section-title">
    <span class="section-title-en">
      <img src="{{ asset('assets/img/group/pickup/title-en.svg') }}" alt="Pickup Girl">
    </span>
    <h2 class="section-title-ja">ピックアップ</h2>
  </div>
  <ul class="pickup-shops">
    <div class="pickup-shop-button" >
      <li class="pickup-shop-detail" data-shop="all">ALL</li>
      <li class="pickup-shop-detail" data-shop="pussycat">プッシー<br class="sm">キャット</li>
      <li class="pickup-shop-detail" data-shop="shizuku">雫</li>
      <li class="pickup-shop-detail" data-shop="miyabi">雅</li>
      <li class="pickup-shop-detail" data-shop="en">艶</li>
      <li class="pickup-shop-detail" data-shop="shiroganeze">シロガネーゼ</li>
      <li class="pickup-shop-detail" data-shop="lovestory">ラブストーリー</li>
    </div>
<<<<<<< HEAD
    {{-- ピックアップ一覧 --}}
=======
>>>>>>> cdb9331 (新しいスタイルシートを追加し、エラーページやピックアップセクションのスタイルを強化しました。また、キャストコントローラーにギャラリーのファイルアップロード機能を追加し、グループコントローラーでのピックアップ表示を改善しました。さらに、ショップコントローラーのキャストプロフィール表示を修正し、フッターのスタイルを調整しました。)
    <div class="pickup-list-detail " data-shop="all">
    @foreach ($pickups as $pickup)
    <a
    href=""
    class="pickup-item --{{ $pickup->cast->shop->slug }}"
  >
    <div class="pickup-photo">
      <img src="{{ asset('storage/' . $pickup->cast->gallery_1) }}" alt="{{ $pickup->cast->name }}">
    </div>
    <span class="pickup-shop">
      {{ $pickup->cast->shop->name }}
    </span>
    <span class="pickup-name">
      {{ $pickup->cast->name }} <small>{{ $pickup->cast->age ? '(' . $pickup->cast->age . ')' : '' }}</small>
    </span>
    <span class="pickup-size">
      B{{ $pickup->cast->bust }}　W{{ $pickup->cast->waist }}　H{{ $pickup->cast->hip }}
    </span>
    <span class="pickup-intro">
      {{ $pickup->cast->appeal_point }}
    </span>
  </a>
    @endforeach
  </div>
  {{-- <a href="{{ route('public.group.pickup') }}" class="pickup-more more-button">もっと見る</a> --}}
  <div class="pagination">

  </div>
</section>
</x-public-group-layout>
@once
  @vite(['resources/scss/group/_pickup.scss'])
@endonce
<script>
/** 詳細ピックアップの「店舗名」ボタン */
document.querySelectorAll('.pickup-shop-detail').forEach(button => {
  if (document.querySelector('.pickup-list-detail').dataset.shop === 'all') {
    initializePagination()
  }
  button.addEventListener('click', () => {
    document.querySelector('.pickup-list-detail').dataset.shop = button.dataset.shop
    document.querySelector('.pickup-list-detail').classList.add('--expanded')
    
    // ページネーションの表示制御
    const pagination = document.querySelector('.pagination')
    if (pagination) {
      if (button.dataset.shop === 'all') {
        pagination.style.display = 'flex'
        initializePagination()
      } else {
        pagination.style.display = 'none'
        // すべてのアイテムのdisplayプロパティを削除
        document.querySelectorAll('.pickup-item').forEach(item => {
          item.style.removeProperty('display')
        })
      }
    }
  })
})
/** ピックアップのページネーション機能 */
function initializePagination() {
  const items = document.querySelectorAll('.pickup-item')
  const perPage = window.innerWidth < 768 ? 7 : 9 // モバイル: 7件、PC: 9件
  const totalItems = items.length
  const totalPages = Math.ceil(totalItems / perPage)
  let currentPage = 1

  // ページネーションのHTMLを生成
  function renderPagination() {
    const paginationContainer = document.querySelector('.pagination')
    if (!paginationContainer) return

    let html = '<ul class="pagination">'
    
    // 前へボタン
    html += `
      <li class="pagination-item ${currentPage === 1 ? 'disabled' : ''}">
        <a class="page-link" href="#" data-page="prev">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </li>
    `

    // ページ番号
    let startPage = Math.max(1, currentPage - 1)
    let endPage = Math.min(totalPages, currentPage + 1)

    if (startPage > 1) {
      html += `
        <li class="pagination-item">
          <a class="page-link" href="#" data-page="1">1</a>
        </li>
      `
      if (startPage > 2) {
        html += `
          <li class="pagination-item disabled">
            <span class="page-link">...</span>
          </li>
        `
      }
    }

    for (let i = startPage; i <= endPage; i++) {
      html += `
        <li class="pagination-item ${i === currentPage ? 'active' : ''}">
          <a class="page-link" href="#" data-page="${i}">${i}</a>
        </li>
      `
    }

    if (endPage < totalPages) {
      if (endPage < totalPages - 1) {
        html += `
          <li class="pagination-item disabled">
            <span class="page-link">...</span>
          </li>
        `
      }
      html += `
        <li class="pagination-item">
          <a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>
        </li>
      `
    }

    // 次へボタン
    html += `
      <li class="pagination-item ${currentPage === totalPages ? 'disabled' : ''}">
        <a class="page-link" href="#" data-page="next">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </li>
    `

    html += '</ul>'
    paginationContainer.innerHTML = html
  }

  // ページの表示を切り替え
  function showPage(page) {
    const start = (page - 1) * perPage
    const end = start + perPage

    items.forEach((item, index) => {
      if (index >= start && index < end) {
        item.style.display = 'block'
      } else {
        item.style.display = 'none'
      }
    })

    currentPage = page
    renderPagination()
  }

  // イベントリスナーを設定
  function bindEvents() {
    const paginationContainer = document.querySelector('.pagination')
    if (!paginationContainer) return

    paginationContainer.addEventListener('click', (e) => {
      e.preventDefault()
      const target = e.target.closest('.page-link')
      if (!target) return

      const page = target.dataset.page
      if (page === 'prev' && currentPage > 1) {
        showPage(currentPage - 1)
      } else if (page === 'next' && currentPage < totalPages) {
        showPage(currentPage + 1)
      } else if (!isNaN(page)) {
        showPage(parseInt(page))
      }
    })
  }

  // 初期表示
  showPage(1)
  renderPagination()
  bindEvents()
}

// 初期表示時のページネーション制御
document.addEventListener('DOMContentLoaded', () => {
  const pickupList = document.querySelector('.pickup-list-detail')
  const pagination = document.querySelector('.pagination')
  
  if (pickupList && pagination) {
    if (pickupList.dataset.shop === 'all') {
      pagination.style.display = 'flex'
      // document.querySelectorAll('.pickup-item').forEach(item => {
      //   item.style.display = 'block'
      // })
      initializePagination()
    } else {
      pagination.style.display = 'none'
      // すべてのアイテムのdisplayプロパティを削除
      document.querySelectorAll('.pickup-item').forEach(item => {
        item.style.removeProperty('display')
      })
    }
  }
})

</script>
