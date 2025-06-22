<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
// use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Endroid\QrCode\Encoding\Encoding;
class QRCodeController extends Controller
{
    public function generate($memberId)
    {
      $url = "http://plo-group.jp/admin/member/qrresult?qr={$memberId}";
      $qrCode = new QrCode(
        data: $url,
        encoding: new Encoding('UTF-8'),
        size: 300,
        margin: 10,
      );

      $writer = new PngWriter();
      $result = $writer->write($qrCode);
      Log::info($result->getString());
      Log::info($result->getMimeType());
      return new Response(
          $result->getString(),
          200,
          ['Content-Type' => $result->getMimeType()]
      );
    }
}
?>