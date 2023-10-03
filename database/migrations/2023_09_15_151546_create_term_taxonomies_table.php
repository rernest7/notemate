<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('term_taxonomies', function (Blueprint $table) {
            $table->id();
            // a category its assigned
            $table->bigInteger('term_id')->unsigned()->index();
            // a parent category
            $table->bigInteger('parent_id')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term_taxonomies');
    }
};
