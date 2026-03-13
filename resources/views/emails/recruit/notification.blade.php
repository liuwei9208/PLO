<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: sans-serif; font-size: 14px; line-height: 1.6; color: #333; }
    table { border-collapse: collapse; width: 100%; max-width: 600px; }
    th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }
    th { background: #f5f5f5; font-weight: 600; width: 140px; }
  </style>
</head>
<body>
  <p>求人応募がありました。</p>
  <table>
    <tr><th>種別</th><td>{{ $application->type === 'male' ? '男性' : '女性' }}</td></tr>
    <tr><th>希望店舗</th><td>{{ $application->shop }}</td></tr>
    <tr><th>氏名</th><td>{{ $application->name }}</td></tr>
    @if($application->furigana)<tr><th>フリガナ</th><td>{{ $application->furigana }}</td></tr>@endif
    <tr><th>メールアドレス</th><td>{{ $application->email }}</td></tr>
    @if($application->phone)<tr><th>電話番号</th><td>{{ $application->phone }}</td></tr>@endif
    @if($application->age)<tr><th>年齢</th><td>{{ $application->age }}</td></tr>@endif
    @if($application->experience)<tr><th>経験</th><td>{{ $application->experience }}</td></tr>@endif
    @if($application->subject)<tr><th>件名</th><td>{{ $application->subject }}</td></tr>@endif
    <tr><th>問い合わせ内容</th><td>{!! nl2br(e($application->inquiry)) !!}</td></tr>
    <tr><th>応募日時</th><td>{{ $application->created_at->format('Y-m-d H:i') }}</td></tr>
  </table>
</body>
</html>
