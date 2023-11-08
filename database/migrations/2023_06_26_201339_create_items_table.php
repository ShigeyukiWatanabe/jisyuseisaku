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
            $table->string('name_id', 100)->nullable()->index()->comment('製品コード');
            $table->string('name', 100)->nullable()->index()->comment('製品名');
            $table->integer('stock')->default(0)->index()->comment('在庫数');
            $table->string('type')->nullable()->default(null)->comment('工程名');
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
