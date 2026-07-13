<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('cover_image')->nullable()->after('images');
        });

        // Isi cover_image dari gambar pertama di kolom images untuk record yang sudah ada
        $projects = DB::table('projects')->whereNull('cover_image')->get();
        foreach ($projects as $project) {
            $images = json_decode($project->images, true);
            if (!empty($images)) {
                DB::table('projects')
                    ->where('id', $project->id)
                    ->update(['cover_image' => $images[0]]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
    }
};

