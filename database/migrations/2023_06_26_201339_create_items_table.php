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
        Schema::create('items', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->bigInteger('user_id')->unsigned()->index()->comment('ユーザーID');
            $table->string('name', 100)->index()->comment('名前');
            $table->string('type',100)->nullable()->default(null)->comment('種別');
            $table->string('detail', 500)->nullable()->default(null)->comment('詳細');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
