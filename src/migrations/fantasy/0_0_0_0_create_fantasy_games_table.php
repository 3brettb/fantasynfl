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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('week_id');
            $table->unsignedBigInteger('home_id')->comment('Home Team Lineup');
            $table->unsignedBigInteger('away_id')->comment('Away Team Lineup');
            $table->unsignedBigInteger('winner_id')->comment('Winning Team');
            $table->boolean('complete');
            $table->tinyInteger('type');
            $table->longText('stats');
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