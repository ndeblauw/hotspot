<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_keyword', function (Blueprint $table) {
            $table->foreignId('article_id');
            $table->foreignId('keyword_id');
        });
    }
};
