<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('partner_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('contact_address');
            $table->string('payment_info')->nullable();
            $table->text('contract_details')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->enum('status', ['Active', 'Not Active'])->default('Active');
            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
