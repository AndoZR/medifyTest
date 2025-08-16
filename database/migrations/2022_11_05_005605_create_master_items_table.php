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
        Schema::create('master_items', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->integer('harga_beli');
            $table->integer('laba');
            $table->string('foto')->nullable();
            $table->string('supplier');
            $table->string('jenis');

            // relasi ke kategori
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')
                ->references('id')->on('kategori_items')
                ->onDelete('cascade'); 

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_items');
    }
};
