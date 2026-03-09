<x-public-groups-layout>
  @php
    $confirmationMessage = session('success', 'お問い合わせありがとうございます。担当者よりご連絡いたします。');
  @endphp

  @push('styles')
    <style>
      body.recruit-confirmation-page .main {
        margin-top: 0 !important;
        margin-left: 0 !important;
        width: 100%;
        padding-top: 110px !important;
      }

      body.recruit-confirmation-page .header {
        left: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
      }

      .recruit-confirmation {
        width: min(100%, 920px);
        margin: 0 auto;
        padding: 12px 20px 72px;
        box-sizing: border-box;
      }

      .recruit-confirmation__card {
        width: 100%;
        background: linear-gradient(180deg, #ffffff 0%, #f7f7f7 100%);
        border: 1px solid #d9d9d9;
        border-radius: 28px;
        box-shadow: 0 20px 50px rgba(17, 24, 39, 0.08);
        overflow: hidden;
      }

      .recruit-confirmation__hero {
        padding: 56px 24px 40px;
        text-align: center;
        background:
          radial-gradient(circle at top left, rgba(22, 90, 44, 0.12), transparent 42%),
          radial-gradient(circle at top right, rgba(214, 167, 57, 0.2), transparent 38%),
          #ffffff;
      }

      .recruit-confirmation__eyebrow {
        margin: 0 0 12px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: #165b2c;
      }

      .recruit-confirmation__title {
        margin: 0;
        font-size: clamp(30px, 5vw, 44px);
        line-height: 1.2;
        color: #111827;
      }

      .recruit-confirmation__message {
        max-width: 560px;
        margin: 20px auto 0;
        font-size: 16px;
        line-height: 1.9;
        color: #334155;
      }

      .recruit-confirmation__body {
        padding: 0 24px 40px;
      }

      .recruit-confirmation__note {
        margin: 0 auto;
        max-width: 640px;
        padding: 24px;
        border-radius: 20px;
        background: #f3f7f4;
        color: #1f2937;
        font-size: 15px;
        line-height: 1.8;
        text-align: center;
      }

      .recruit-confirmation__actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 14px;
        margin-top: 28px;
      }

      .recruit-confirmation__action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 220px;
        min-height: 54px;
        padding: 0 24px;
        border-radius: 999px;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
      }

      .recruit-confirmation__action:hover {
        transform: translateY(-1px);
      }

      .recruit-confirmation__action--primary {
        background: #165b2c;
        color: #ffffff;
        box-shadow: 0 14px 32px rgba(22, 91, 44, 0.22);
      }

      .recruit-confirmation__action--secondary {
        background: #ffffff;
        color: #165b2c;
        border: 1px solid #165b2c;
      }

      @media screen and (max-width: 767px) {
        body.recruit-confirmation-page .main {
          padding-top: 60px !important;
        }

        .recruit-confirmation {
          padding: 12px 16px 48px;
        }

        .recruit-confirmation__card {
          border-radius: 22px;
        }

        .recruit-confirmation__hero {
          padding: 40px 20px 28px;
        }

        .recruit-confirmation__body {
          padding: 0 20px 28px;
        }

        .recruit-confirmation__note {
          padding: 20px 18px;
        }

        .recruit-confirmation__action {
          width: 100%;
        }
      }
    </style>
  @endpush

  <section class="recruit-confirmation" aria-labelledby="recruit-confirmation-title">
    <div class="recruit-confirmation__card">
      <div class="recruit-confirmation__hero">
        <p class="recruit-confirmation__eyebrow">Entry Complete</p>
        <h1 id="recruit-confirmation-title" class="recruit-confirmation__title">応募を受け付けました</h1>
        <p class="recruit-confirmation__message">{{ $confirmationMessage }}</p>
      </div>

      <div class="recruit-confirmation__body">
        <p class="recruit-confirmation__note">
          内容を確認のうえ、担当者より順次ご連絡いたします。<br>
          お急ぎの場合は、各店舗まで直接ご連絡ください。
        </p>

        <div class="recruit-confirmation__actions">
          <a href="{{ route('public.recruit.female') }}" class="recruit-confirmation__action recruit-confirmation__action--primary">
            女性求人ページへ
          </a>
          <a href="{{ route('public.recruit.male') }}" class="recruit-confirmation__action recruit-confirmation__action--secondary">
            男性求人ページへ
          </a>
        </div>
      </div>
    </div>
  </section>
</x-public-groups-layout>
@once
  {{-- @vite(['resources/scss/group/_pickup_top.scss','resources/scss/group/diary_top.scss','resources/scss/group/newstop.scss']) --}}
  @vite(['resources/scss/groups/section-title.scss','resources/scss/groups/event-content.scss','resources/scss/groups/newface-content.scss','resources/scss/groups/pickup-content.scss','resources/scss/groups/diary-content.scss','resources/scss/groups/movie-content.scss'])
@endonce
