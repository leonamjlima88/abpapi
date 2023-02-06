<?php

use Carbon\Carbon;
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
        Schema::create('state', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->index();
            $table->char('abbreviation', 2)->unique()->index();
            $table->timestamps();
        });

        DB::table('state')->truncate();
        DB::table('state')->insert([
            ['id' => 1, 'name' => 'Acre', 'abbreviation' => 'AC', "created_at" => Carbon::now()],
            ['id' => 2, 'name' => 'Alagoas', 'abbreviation' => 'AL', "created_at" => Carbon::now()],
            ['id' => 3, 'name' => 'Amapá', 'abbreviation' => 'AP', "created_at" => Carbon::now()],
            ['id' => 4, 'name' => 'Amazonas', 'abbreviation' => 'AM', "created_at" => Carbon::now()],
            ['id' => 5, 'name' => 'Bahia', 'abbreviation' => 'BA', "created_at" => Carbon::now()],
            ['id' => 6, 'name' => 'Ceará', 'abbreviation' => 'CE', "created_at" => Carbon::now()],
            ['id' => 7, 'name' => 'Distrito Federal', 'abbreviation' => 'DF', "created_at" => Carbon::now()],
            ['id' => 8, 'name' => 'Espírito Santo', 'abbreviation' => 'ES', "created_at" => Carbon::now()],
            ['id' => 9, 'name' => 'Goiás', 'abbreviation' => 'GO', "created_at" => Carbon::now()],
            ['id' => 10, 'name' => 'Maranhão', 'abbreviation' => 'MA', "created_at" => Carbon::now()],
            ['id' => 11, 'name' => 'Mato Grosso', 'abbreviation' => 'MT', "created_at" => Carbon::now()],
            ['id' => 12, 'name' => 'Mato Grosso do Sul', 'abbreviation' => 'MS', "created_at" => Carbon::now()],
            ['id' => 13, 'name' => 'Minas Gerais', 'abbreviation' => 'MG', "created_at" => Carbon::now()],
            ['id' => 14, 'name' => 'Pará', 'abbreviation' => 'PA', "created_at" => Carbon::now()],
            ['id' => 15, 'name' => 'Paraíba', 'abbreviation' => 'PB', "created_at" => Carbon::now()],
            ['id' => 16, 'name' => 'Paraná', 'abbreviation' => 'PR', "created_at" => Carbon::now()],
            ['id' => 17, 'name' => 'Pernambuco', 'abbreviation' => 'PE', "created_at" => Carbon::now()],
            ['id' => 18, 'name' => 'Piauí', 'abbreviation' => 'PI', "created_at" => Carbon::now()],
            ['id' => 19, 'name' => 'Rio de Janeiro', 'abbreviation' => 'RJ', "created_at" => Carbon::now()],
            ['id' => 20, 'name' => 'Rio Grande do Norte', 'abbreviation' => 'RN', "created_at" => Carbon::now()],
            ['id' => 21, 'name' => 'Rio Grande do Sul', 'abbreviation' => 'RS', "created_at" => Carbon::now()],
            ['id' => 22, 'name' => 'Rondônia', 'abbreviation' => 'RO', "created_at" => Carbon::now()],
            ['id' => 23, 'name' => 'Roraima', 'abbreviation' => 'RR', "created_at" => Carbon::now()],
            ['id' => 24, 'name' => 'Santa Catarina', 'abbreviation' => 'SC', "created_at" => Carbon::now()],
            ['id' => 25, 'name' => 'São Paulo', 'abbreviation' => 'SP', "created_at" => Carbon::now()],
            ['id' => 26, 'name' => 'Sergipe', 'abbreviation' => 'SE', "created_at" => Carbon::now()],
            ['id' => 27, 'name' => 'Tocantins', 'abbreviation' => 'TO', "created_at" => Carbon::now()],
        ]); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state');
    }
};
