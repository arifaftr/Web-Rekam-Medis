<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->string('kode', 32)->nullable()->unique()->after('id');
        });

        // Populate kode for existing records
        $rows = DB::table('rekam_medis')->select('id')->get();
        foreach ($rows as $row) {
            $kode = 'RM-' . strtoupper(Str::random(8));
            // ensure uniqueness
            while (DB::table('rekam_medis')->where('kode', $kode)->exists()) {
                $kode = 'RM-' . strtoupper(Str::random(8));
            }
            DB::table('rekam_medis')->where('id', $row->id)->update(['kode' => $kode]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->dropColumn('kode');
        });
    }
};
