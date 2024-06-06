<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detilpenggajians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gaji_id') ->unsigned();
            $table->bigInteger('penggajian_id') ->unsigned();
            $table->string('tunjangan');
            $table->integer('total_gaji');
            $table->timestamps();           
        });
        Schema::table('detilpenggajians', function (Blueprint $table) {
                     $table->foreign('gaji_id')->references('id')->on('gajis')->onUpdate('cascade')->onDelete('cascade');  
                     $table->foreign('penggajian_id')->references('id')->on('penggajians')->onUpdate('cascade')->onDelete('cascade');  
        });
  
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detilpenggajians', function(Blueprint $table) {
        $table->dropForeign('detilpenggajian_gaji_id_foreign');
        });

        Schema::table('detilpenggajians', function(Blueprint $table) {
        $table->dropIndex('detilpenggajian_gaji_id_foreign');
        });

        Schema::table('detilpenggajians', function(Blueprint $table) {
        $table->dropForeign('detilpengajian_penggajian_id_foreign');
        });

        Schema::table('detilpenggajians', function(Blueprint $table) {
         $table->dropIndex('detilpenggajian_penggajian_id_foreign');
        });
              
        Schema::dropIfExists('detilpenggajians');
    }


};
