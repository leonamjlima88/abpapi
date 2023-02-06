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
        Schema::create('bank', function (Blueprint $table) {
            $table->id();
            $table->char('code', 3);
            $table->string('name');
            $table->timestamps();
        });

        DB::table('bank')->insert(
          [
              [
                  'code'=> "000",
                  'name'=> "Caixa Fundo Fixo",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "001",
                  'name'=> "Banco do Brasil",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "003",
                  'name'=> "Banco da Amazônia",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "004",
                  'name'=> "Banco do Nordeste",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "021",
                  'name'=> "Banestes",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "025",
                  'name'=> "Banco Alfa",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "027",
                  'name'=> "Besc",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "029",
                  'name'=> "Banerj",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "031",
                  'name'=> "Banco Beg",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "033",
                  'name'=> "Banco Santander Banespa",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "036",
                  'name'=> "Banco Bem",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "037",
                  'name'=> "Banpará",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "038",
                  'name'=> "Banestado",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "039",
                  'name'=> "BEP",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "040",
                  'name'=> "Banco Cargill",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "041",
                  'name'=> "Banrisul",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "044",
                  'name'=> "BVA",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "045",
                  'name'=> "Banco Opportunity",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "047",
                  'name'=> "Banese",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "062",
                  'name'=> "Hipercard",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "063",
                  'name'=> "Ibibank",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "065",
                  'name'=> "Lemon Bank",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "066",
                  'name'=> "Banco Morgan Stanley Dean Witter",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "069",
                  'name'=> "BPN Brasil",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "070",
                  'name'=> "Banco de Brasília – BRB",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "072",
                  'name'=> "Banco Rural",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "073",
                  'name'=> "Banco Popular",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "074",
                  'name'=> "Banco J. Safra",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "075",
                  'name'=> "Banco CR2",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "076",
                  'name'=> "Banco KDB",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "077",
                  'name'=> "Banco Inter",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "096",
                  'name'=> "Banco BMF",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "104",
                  'name'=> "Caixa Econômica Federal",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "107",
                  'name'=> "Banco BBM",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "116",
                  'name'=> "Banco Único",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "151",
                  'name'=> "Nossa Caixa",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "175",
                  'name'=> "Banco Finasa",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "184",
                  'name'=> "Banco Itaú BBA",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "204",
                  'name'=> "American Express Bank",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "208",
                  'name'=> "Banco Pactual",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "212",
                  'name'=> "Banco Matone",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "213",
                  'name'=> "Banco Arbi",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "214",
                  'name'=> "Banco Dibens",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "217",
                  'name'=> "Banco Joh Deere",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "218",
                  'name'=> "Banco Bonsucesso",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "222",
                  'name'=> "Banco Calyon Brasil",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "224",
                  'name'=> "Banco Fibra",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "225",
                  'name'=> "Banco Brascan",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "229",
                  'name'=> "Banco Cruzeiro",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "230",
                  'name'=> "Unicard",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "233",
                  'name'=> "Banco GE Capital",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "237",
                  'name'=> "Bradesco",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "237",
                  'name'=> "Next",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "241",
                  'name'=> "Banco Clássico",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "243",
                  'name'=> "Banco Stock Máxima",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "246",
                  'name'=> "Banco ABC Brasil",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "248",
                  'name'=> "Banco Boavista Interatlântico",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "249",
                  'name'=> "Investcred Unibanco",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "250",
                  'name'=> "Banco Schahin",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "252",
                  'name'=> "Fininvest",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "254",
                  'name'=> "Paraná Banco",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "263",
                  'name'=> "Banco Cacique",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=>"260",
                  'name'=> "Nubank",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "265",
                  'name'=> "Banco Fator",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "266",
                  'name'=> "Banco Cédula",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "300",
                  'name'=> "Banco de la Nación Argentina",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "318",
                  'name'=> "Banco BMG",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "320",
                  'name'=> "Banco Industrial e Comercial",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "356",
                  'name'=> "ABN Amro Real",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "341",
                  'name'=> "Itau",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "347",
                  'name'=> "Sudameris",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "351",
                  'name'=> "Banco Santander",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "353",
                  'name'=> "Banco Santander Brasil",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "366",
                  'name'=> "Banco Societe Generale Brasil",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "370",
                  'name'=> "Banco WestLB",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "376",
                  'name'=> "JP Morgan",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "389",
                  'name'=> "Banco Mercantil do Brasil",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "394",
                  'name'=> "Banco Mercantil de Crédito",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "399",
                  'name'=> "HSBC",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "409",
                  'name'=> "Unibanco",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "412",
                  'name'=> "Banco Capital",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "422",
                  'name'=> "Banco Safra",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "453",
                  'name'=> "Banco Rural",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "456",
                  'name'=> "Banco Tokyo Mitsubishi UFJ",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "464",
                  'name'=> "Banco Sumitomo Mitsui Brasileiro",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "477",
                  'name'=> "Citibank",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "479",
                  'name'=> "Itaubank (antigo Bank Boston)",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "487",
                  'name'=> "Deutsche Bank",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "488",
                  'name'=> "Banco Morgan Guaranty",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "492",
                  'name'=> "Banco NMB Postbank",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "494",
                  'name'=> "Banco la República Oriental del Uruguay",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "495",
                  'name'=> "Banco La Provincia de Buenos Aires",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "505",
                  'name'=> "Banco Credit Suisse",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "600",
                  'name'=> "Banco Luso Brasileiro",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "604",
                  'name'=> "Banco Industrial",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "610",
                  'name'=> "Banco VR",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "611",
                  'name'=> "Banco Paulista",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "612",
                  'name'=> "Banco Guanabara",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "613",
                  'name'=> "Banco Pecunia",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "623",
                  'name'=> "Banco Panamericano",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "626",
                  'name'=> "Banco Ficsa",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "630",
                  'name'=> "Banco Intercap",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "633",
                  'name'=> "Banco Rendimento",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "634",
                  'name'=> "Banco Triângulo",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "637",
                  'name'=> "Banco Sofisa",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "638",
                  'name'=> "Banco Prosper",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "643",
                  'name'=> "Banco Pine",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "652",
                  'name'=> "Itaú Holding Financeira",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "653",
                  'name'=> "Banco Indusval",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "654",
                  'name'=> "Banco A.J. Renner",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "655",
                  'name'=> "Banco Votorantim",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "707",
                  'name'=> "Banco Daycoval",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "719",
                  'name'=> "Banif",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "721",
                  'name'=> "Banco Credibel",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "734",
                  'name'=> "Banco Gerdau",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "735",
                  'name'=> "Banco Neon",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "738",
                  'name'=> "Banco Morada",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "739",
                  'name'=> "Banco Galvão de Negócios",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "740",
                  'name'=> "Banco Barclays",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "741",
                  'name'=> "BRP",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "743",
                  'name'=> "Banco Semear",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "745",
                  'name'=> "Banco Citibank",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "746",
                  'name'=> "Banco Modal",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "747",
                  'name'=> "Banco Rabobank International",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "748",
                  'name'=> "Banco Cooperativo Sicredi",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "749",
                  'name'=> "Banco Simples",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "751",
                  'name'=> "Dresdner Bank",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "752",
                  'name'=> "BNP Paribas",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "753",
                  'name'=> "Banco Comercial Uruguai",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "755",
                  'name'=> "Banco Merrill Lynch",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "756",
                  'name'=> "Banco Cooperativo do Brasil",
                  'created_at' => Carbon::now(),
              ],
              [
                  'code'=> "757",
                  'name'=> "KEB",
                  'created_at' => Carbon::now(),
              ],
          ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank');
    }
};
