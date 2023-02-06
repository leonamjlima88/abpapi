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
        Schema::create('bank_account', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('bank_id')->constrained('bank');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('bank_account');
    }
};
