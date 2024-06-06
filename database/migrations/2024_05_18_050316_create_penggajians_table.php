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
        Schema::create('penggajians', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->bigInteger('pegawai_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->double('total');           
            $table->timestamps();           
        });

        Schema::table('penggajians', function (Blueprint $table) {
                     $table->foreign('pegawai_id')->references('id')->on('pegawais')->onUpdate('cascade')->onDelete('cascade');  
                     $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');  
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penggajians', function(Blueprint $table) {
            $table->dropForeign('penggajian_pegawai_id_foreign');
        });

        Schema::table('penggajians', function(Blueprint $table) {
            $table->dropIndex('penggajian_pegawai_id_foreign');
        });

        Schema::table('penggajians', function(Blueprint $table) {
        $table->dropForeign('penggajian_user_id_foreign');
        });

        Schema::table('penggajians', function(Blueprint $table) {
         $table->dropIndex('penggajian_user_id_foreign');
        });
              
        Schema::dropIfExists('penggajians');
    }

};
