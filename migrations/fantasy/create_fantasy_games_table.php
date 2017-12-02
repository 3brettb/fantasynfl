<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyGamesTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_games";
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('id', 20);
            $table->integer('season_id', 20)->unsigned();
            $table->integer('home_id', 20)->unsigned()->comment('Home Team Roster');
            $table->integer('away_id', 20)->unsigned()->comment('Away Team Roster');
            $table->integer('winner_id', 20)->unsigned()->comment('Winning Team');
            $table->boolean('complete');
            $table->integer('type', 4);
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