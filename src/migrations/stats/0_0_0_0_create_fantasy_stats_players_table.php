<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyStatsPlayersTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_stats_players";
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->string('esbid', 30)->nullable();
            $table->string('gsisPlayerId', 30)->unique();
            $table->string('name', 150);
            $table->string('firstName', 75);
            $table->string('lastName', 75);
            $table->string('teamAbbr', 10);
            $table->string('position', 5);
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