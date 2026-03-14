<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $shopSlugs = ['shizuku', 'miyabi', 'pussycat', 'en', 'siroganeze', 'lovestory'];
        foreach ($shopSlugs as $slug) {
            DB::table('shops')->where('slug', $slug)->update([
                'url' => '/shops/' . $slug . '/',
            ]);
        }
    }

    public function down(): void
    {
        $shopSlugs = ['shizuku', 'miyabi', 'pussycat', 'en', 'siroganeze', 'lovestory'];
        foreach ($shopSlugs as $slug) {
            DB::table('shops')->where('slug', $slug)->update([
                'url' => '/' . $slug . '/',
            ]);
        }
    }
};
