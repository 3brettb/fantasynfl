<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyStatsPlayerDetailsTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_stats_player_details";
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->string('status', 20);
            $table->string('injuryGameStatus');
            $table->tinyInteger('jerseyNumber');
            $table->timestamps();
            $table->primary('id');
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