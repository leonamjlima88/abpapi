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
        Schema::create('payment_term', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('number_of_installments')->default(1);
            $table->tinyInteger('first_installment_in')->nullable();
            $table->tinyInteger('interval_between_installments')->nullable();
            $table->foreignId('bank_account_id')->constrained('bank');
            $table->foreignId('document_id')->constrained('document');
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
        Schema::dropIfExists('payment_term');
    }
};
