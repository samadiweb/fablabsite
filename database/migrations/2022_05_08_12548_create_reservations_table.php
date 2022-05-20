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
        Schema::create('reservations', function (Blueprint $table) {

            $table->id();
          
            $table->date('date_reservation');
            $table->date('date_seance');
            $table->string('numero_seance');
            $table->string('notes')->nullable();

            $table->foreignId('machine_id')
            ->constrained('machines');

            $table->foreignId('project_id')
            ->constrained('projects');

            $table->foreignId('adherent_id')
            ->constrained('users');

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
        Schema::dropIfExists('projects');
    }
};
