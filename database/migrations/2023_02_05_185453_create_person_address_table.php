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
        Schema::create('person_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('person')->cascadeOnUpdate()->cascadeOnDelete();
            $table->tinyInteger('type')->nullable()->comment('[0-Nenhum, 1-Entrega, 2-Pagamento]');
            $table->string('zip_code', 10)->nullable();
            $table->string('address')->index();
            $table->string('address_number', 15)->nullable();
            $table->string('complement')->nullable();
            $table->string('district');
            $table->foreignId('city_id')->constrained('city');
            $table->string('reference_point')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_address');
    }
};
