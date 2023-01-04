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
        Schema::create('vinculo_empregaticio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_key')->unique();
            $table->string('cargo');
            $table->string('departamento');
            $table->foreign('user_key')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->timestamps();
        });

        DB::table('vinculo_empregaticio')->insert([
            ['id' => 1, 'cargo' => 'DevFullStack ','departamento' => 'Tecnologia',
            'user_key' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
