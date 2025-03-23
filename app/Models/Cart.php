<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('obat_id')->constrained('obats')->onDelete('cascade');
    $table->integer('quantity')->default(1);
    $table->timestamps();
});

    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
};