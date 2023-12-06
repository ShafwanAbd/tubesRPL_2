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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('photo')->nullable();
            $table->string('alamat');
            $table->string('nomerHP');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        
        DB::table('users')->insert(
            array(
                ['name' => 'ADMIN',
                'email' => 'ADMIN@gmail.com',
                'alamat' => 'ADMIN',
                'nomerHP' => 'ADMIN',
                'password' => bcrypt('12345678')],

                ['name' => 'Resa Setyawan',
                'email' => 'Resa@gmail.com',
                'alamat' => 'Tasikmalaya, Jawa Barat',
                'nomerHP' => '082120019232',
                'password' => bcrypt('12345678')]
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
        Schema::dropIfExists('users');
    }
};
