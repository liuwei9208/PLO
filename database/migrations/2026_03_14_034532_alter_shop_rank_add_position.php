<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('shop_rank', 'position')) {
            return;
        }
        Schema::table('shop_rank', function (Blueprint $table) {
            $table->dropUnique(['shop_id', 'rank_id']);
        });
        Schema::table('shop_rank', function (Blueprint $table) {
            $table->unsignedTinyInteger('position')->default(1)->after('shop_id');
        });
        $rows = DB::table('shop_rank')->orderBy('shop_id')->orderBy('id')->get();
        $shopPositions = [];
        foreach ($rows as $row) {
            $shopPositions[$row->shop_id] = ($shopPositions[$row->shop_id] ?? 0) + 1;
            DB::table('shop_rank')->where('id', $row->id)->update(['position' => $shopPositions[$row->shop_id]]);
        }
        Schema::table('shop_rank', function (Blueprint $table) {
            $table->unique(['shop_id', 'position']);
        });
    }

    public function down(): void
    {
        Schema::table('shop_rank', function (Blueprint $table) {
            $table->dropUnique(['shop_id', 'position']);
        });
        Schema::table('shop_rank', function (Blueprint $table) {
            $table->dropColumn('position');
        });
        Schema::table('shop_rank', function (Blueprint $table) {
            $table->unique(['shop_id', 'rank_id']);
        });
    }
};
