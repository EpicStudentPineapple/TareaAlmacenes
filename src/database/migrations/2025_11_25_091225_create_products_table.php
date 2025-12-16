<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCategory');
            $table->string('label');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('idCategory')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('restrict');
        });
   }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
