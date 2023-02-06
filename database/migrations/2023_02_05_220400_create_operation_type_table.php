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
        Schema::create('operation_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('document_type')->nullable()->comment('[0..1] 0-Entrada, 1-Saída');
            $table->tinyInteger('issue_purpose')->nullable()->comment('[0..3] 0-Normal, 1-Complementar, 2-Ajuste, 3-Devolução');
            $table->string('operation_nature_description');
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
        Schema::dropIfExists('operation_type');
    }
};
