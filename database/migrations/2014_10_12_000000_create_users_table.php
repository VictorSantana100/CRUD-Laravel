<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('primeiro_nome');
            $table->string('sobrenome');
            $table->string('num_celular');
            $table->string('email')->unique();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['id' => 1, 'primeiro_nome' => 'Victor','sobrenome' => 'Santana',
            'num_celular' => '(73) 981654585','email' => 'santanav589@gmail.com', 'created_at' => now(), 'updated_at' => now()],
        ]);
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
