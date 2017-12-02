<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyStatsResearchInfoTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_stats_research_info";
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($table_name, function (Blueprint $table) {
            $table->integer('id', 20)->unsigned()->unique();
            $table->string('oppTeamAbbr', 20)->nullable();
            $table->float('percentOwned', 5, 2);
            $table->float('percentOwnedChange', 5, 2);
            $table->float('percentStarted', 5, 2);
            $table->float('percentStartedChange', 5, 2);
            $table->integer('depthChartOrder', 3)->nullable();
            $table->integer('numAdds', 5)->nullable();
            $table->integer('numDrops', 5)->nullable();
            $table->float('averagePoints', 5, 2)->nullable();
            $table->float('seasonPoints', 5, 2)->nullable();
            $table->integer('positionRank', 3)->nullable();
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
        Schema::drop($table_name);
    }
}