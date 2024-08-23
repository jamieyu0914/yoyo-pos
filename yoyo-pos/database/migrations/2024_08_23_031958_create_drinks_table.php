<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // 飲料名稱
            $table->text('description')->nullable();  // 飲料描述
            $table->decimal('price', 8, 2);  // 飲料價格
            $table->string('size')->nullable();  // 飲料大小
            $table->timestamps();  // 自動生成的 created_at 和 updated_at 欄位
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
};
