<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyStatsAdvancedTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_stats_advanced";
    
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
            $table->integer('carries', 4)->nullable();
            $table->integer('touches', 4)->nullable();
            $table->integer('receptions', 4)->nullable();
            $table->integer('targets', 4)->nullable();
            $table->float('receptionPercent', 5, 2)->nullable();
            $table->integer('redzoneTargets', 4)->nullable();
            $table->integer('redzoneTouches', 4)->nullable();
            $table->integer('redzoneG2g', 4)->nullable();
            $table->string('status', 100)->nullable();
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