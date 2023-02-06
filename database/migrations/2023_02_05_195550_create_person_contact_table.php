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
        Schema::create('person_contact', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('person')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('cnpj', 20)->nullable();
            $table->string('type', 80)->nullable();
            $table->text('note')->nullable();
            $table->string('phone', 40)->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_contact');
    }
};
