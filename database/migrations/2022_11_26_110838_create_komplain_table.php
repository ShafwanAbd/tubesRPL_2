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
        Schema::create('komplain', function (Blueprint $table) {
            $table->id();

            $table->string('idSepatu');
            $table->string('idKonfirmasi');
            $table->string('size')->nullable();
            $table->string('namaSepatu');
            $table->string('nama');
            $table->string('email');
            $table->string('alamat');
            $table->string('status');
            $table->integer('harga');
            $table->string('pesan');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komplain');
    }
};
