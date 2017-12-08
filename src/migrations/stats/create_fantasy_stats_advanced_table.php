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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('playerId');
            $table->string('season', 4);
            $table->smallInteger('week')->nullable();
            $table->smallInteger('carries')->nullable();
            $table->smallInteger('touches')->nullable();
            $table->smallInteger('receptions')->nullable();
            $table->smallInteger('targets')->nullable();
            $table->float('receptionPercent', 5, 2)->nullable();
            $table->smallInteger('redzoneTargets')->nullable();
            $table->smallInteger('redzoneTouches')->nullable();
            $table->smallInteger('redzoneG2g')->nullable();
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