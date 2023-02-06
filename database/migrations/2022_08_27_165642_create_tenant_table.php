<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('tenant', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 100)->index();
            $table->string('alias_name', 100)->index();
            $table->string('cnpj', 20)->unique()->index();
            $table->string('state_registration', 20)->nullable();
            $table->string('municipal_registration', 20)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('address', 100)->index();
            $table->string('address_number', 15)->nullable();
            $table->string('complement', 100)->nullable();
            $table->string('district', 100);
            $table->foreignId('city_id')->constrained('city');
            $table->string('reference_point', 100)->nullable();
            $table->string('phone_1', 40)->nullable();
            $table->string('phone_2', 40)->nullable();
            $table->string('phone_3', 40)->nullable();
            $table->string('company_email', 100)->nullable();
            $table->string('financial_email', 100)->nullable();
            $table->string('internet_page', 255)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
        
        DB::table('tenant')->truncate();
        DB::table('tenant')->insert([
            [
                'id' => 1,
                'business_name' => 'default',
                'alias_name' => 'default',
                'cnpj' => '43463146000186',
                'address' => '.',
                'district' => '.',
                'city_id' => 1,
            ],
            [
              'id' => 2,
              'business_name' => 'second',
              'alias_name' => 'second',
              'cnpj' => '45284846000139',
              'address' => '.',
              'district' => '.',
              'city_id' => 2,
          ],
        ]); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant');
    }
};
