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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('simplified_name', 30);
            $table->tinyInteger('type')->default(0)->comment('[0..1] 0-Produto, 1-Serviço');
            $table->string('sku_code', 45)->nullable();
            $table->string('ean_code', 45)->nullable();
            $table->string('manufacturing_code', 45)->nullable();
            $table->string('identification_code', 45)->nullable();
            $table->decimal('cost', 18,4)->nullable();
            $table->decimal('profit', 18,4)->nullable();
            $table->decimal('price', 18,4)->nullable();
            $table->decimal('current_quantity', 18,4)->nullable();
            $table->decimal('minimum_quantity', 18,4)->nullable();
            $table->decimal('maximum_quantity', 18,4)->nullable();
            $table->decimal('gross_weight', 18,4)->nullable();
            $table->decimal('net_weight', 18,4)->nullable();
            $table->decimal('packing_weight', 18,4)->nullable();
            $table->tinyInteger('is_to_move_the_stock')->nullable()->comment('[0..1] 0-False, 1-True');
            $table->tinyInteger('is_product_for_scales')->nullable()->comment('[0..1] 0-False, 1-True');
            $table->text('internal_note')->nullable();
            $table->text('complement_note')->nullable();
            $table->tinyInteger('is_discontinued')->nullable()->index()->comment('[0..1] 0-False, 1-True');
            $table->foreignId('unit_id')->constrained('unit');
            $table->foreignId('ncm_id')->constrained('ncm');
            $table->foreignId('category_id')->nullable()->constrained('category');
            $table->foreignId('brand_id')->nullable()->constrained('brand');
            $table->foreignId('size_id')->nullable()->constrained('size');
            $table->foreignId('storage_location_id')->nullable()->constrained('storage_location');
            $table->tinyInteger('genre')->nullable()->index()->comment('[0..3] 0-Nenhum, 1-Masculino, 2-Feminino, 3-Unissex');
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
        Schema::dropIfExists('product');
    }
};
