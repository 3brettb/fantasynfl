<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyStatsPlayerNewsTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_stats_player_news";
    
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
            $table->string('timestamp', 50);
            $table->string('source');
            $table->string('headline');
            $table->text('body');
            $table->text('analysis');
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