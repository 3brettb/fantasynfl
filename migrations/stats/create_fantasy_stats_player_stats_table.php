<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyStatsPlayerStatsTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_stats_player_stats";
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('id', 20);
            $table->integer('playerId', 20)->unsigned();
            $table->string('season', 4);
            $table->integer('week', 2)->nullable();
            $table->boolean('projected');
            $table->json('data');
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
        Schema::drop($this->table_name);
    }
}