<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('quantity')->default(0);
            $table->string('color')->nullable();;
            $table->string('matter')->default('Bois');
            $table->unsignedInteger('discount')->default(0);
            $table->decimal('price', 8, 2);
            $table->enum('status', ['En Stock', 'Epuise'])->default('En Stock');
            $table->string('slug')->nullable();;
            $table->foreignId('category_id');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }

}
