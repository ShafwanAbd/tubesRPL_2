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
        Schema::create('sepatu', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('merk');
            $table->string('photo')->nullable();
            $table->integer('size')->nullable();
            $table->integer('harga');
            $table->timestamps();
        });

        DB::table('sepatu')->insert(
            array(

                // COMPASS 

                ['nama' => 'Proto Lite Purple',
                'merk' => 'Compass',
                'photo' => 'protoLitePurple.png',
                'harga' => '578000'],
                
                ['nama' => 'Proto Lite Grey',
                'merk' => 'Compass',
                'photo' => 'protoLiteGrey.png',
                'harga' => '578000'],
                
                ['nama' => 'Proto Lite Green',
                'merk' => 'Compass',
                'photo' => 'protoLiteGreen.png',
                'harga' => '578000'],
                
                ['nama' => 'Gazelle Hi Black Gum',
                'merk' => 'Compass',
                'photo' => 'gazelleHiBlackGum.png',
                'harga' => '438000'],
                
                ['nama' => 'Gazelle Low Black Gum',
                'merk' => 'Compass',
                'photo' => 'gazelleLowBlackGum.png',
                'harga' => '408000'],
                
                ['nama' => 'Flight Jkt Low',
                'merk' => 'Compass',
                'photo' => 'flightJktLow.png',
                'harga' => '638000'],
                
                ['nama' => 'Flight Jkt Hi',
                'merk' => 'Compass',
                'photo' => 'flightJktHi.png',
                'harga' => '668000'],
                
                ['nama' => 'Linen Low Dusk',
                'merk' => 'Compass',
                'photo' => 'linenLowDusk.png',
                'harga' => '538000'],
                
                ['nama' => 'Linen Low Sand',
                'merk' => 'Compass',
                'photo' => 'linenLowSand.png',
                'harga' => '538000'],
                
                ['nama' => 'Linen Hi Ash',
                'merk' => 'Compass',
                'photo' => 'linenHiAsh.png',
                'harga' => '568000'],
                
                ['nama' => 'Linen Hi Ocean',
                'merk' => 'Compass',
                'photo' => 'linenHiOcean.png',
                'harga' => '568000'],

                // GEOFF-MAX
                
                ['nama' => 'Maverick Mid Black White',
                'merk' => 'Geoff-Max',
                'photo' => 'Maverick Mid Black White.jpg',
                'harga' => '450000'],
                
                ['nama' => 'Maery Black White',
                'merk' => 'Geoff-Max',
                'photo' => 'Maery Black White.jpg',
                'harga' => '345000'],
                
                ['nama' => 'Vadisk Black White',
                'merk' => 'Geoff-Max',
                'photo' => 'Vadisk Black White.jpg',
                'harga' => '345000'],
                
                ['nama' => 'Timeless Hi Red White',
                'merk' => 'Geoff-Max',
                'photo' => 'Timeless Hi Red White.jpg',
                'harga' => '399000'],

                // VENTELLA

                ['nama' => 'Basic White',
                'merk' => 'Ventella',
                'photo' => 'basicWhite.png',
                'harga' => '210000'],

                ['nama' => 'Public Low Black',
                'merk' => 'Ventella',
                'photo' => 'publicLowBlack.png',
                'harga' => '369900'],

                ['nama' => 'Public Low Maroon',
                'merk' => 'Ventella',
                'photo' => 'publicLowMaroon.png',
                'harga' => '369900'],

                ['nama' => 'Public Low Dark Green',
                'merk' => 'Ventella',
                'photo' => 'publicLowDarkGreen.png',
                'harga' => '369900'],

                ['nama' => 'Public Low Yellow',
                'merk' => 'Ventella',
                'photo' => 'publicLowYellow.png',
                'harga' => '369900'],
                
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sepatu');
    }
};
