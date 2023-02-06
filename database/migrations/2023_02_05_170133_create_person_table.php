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
        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->index();
            $table->string('alias_name')->index();
            $table->string('cnpj', 20)->index();
            $table->tinyInteger('icms_taxpayer')->nullable()->comment('[0..2] 0-Não, 1-Sim, 2-Isento');
            $table->string('state_registration', 20)->nullable();
            $table->string('municipal_registration', 20)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('address')->index();
            $table->string('address_number', 15)->nullable();
            $table->string('complement')->nullable();
            $table->string('district');
            $table->foreignId('city_id')->constrained('city');
            $table->string('reference_point')->nullable();
            $table->string('phone_1', 40)->nullable();
            $table->string('phone_2', 40)->nullable();
            $table->string('phone_3', 40)->nullable();
            $table->string('company_email')->nullable();
            $table->string('financial_email')->nullable();
            $table->string('internet_page')->nullable();
            $table->text('note')->nullable();
            $table->text('bank_note')->nullable();
            $table->text('commercial_note')->nullable();
            $table->tinyInteger('is_customer')->nullable()->comment('[0..1] 0-False, 1-True');
            $table->tinyInteger('is_seller')->nullable()->comment('[0..1] 0-False, 1-True');
            $table->tinyInteger('is_supplier')->nullable()->comment('[0..1] 0-False, 1-True');
            $table->tinyInteger('is_carrier')->nullable()->comment('[0..1] 0-False, 1-True');
            $table->tinyInteger('is_technician')->nullable()->comment('[0..1] 0-False, 1-True');
            $table->tinyInteger('is_employee')->nullable()->comment('[0..1] 0-False, 1-True');
            $table->tinyInteger('is_other')->nullable()->comment('[0..1] 0-False, 1-True');
            $table->tinyInteger('is_final_customer')->default(0)->comment('[0..1] 0-False, 1-True');
            $table->timestamps();
            $table->foreignId('created_by_user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignId('updated_by_user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignId('tenant_id')->constrained('tenant')->cascadeOnUpdate()->cascadeOnUpdate();            
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person');
    }
};
