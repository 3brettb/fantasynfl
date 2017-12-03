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
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->string('oppTeamAbbr', 20)->nullable();
            $table->float('percentOwned', 5, 2);
            $table->float('percentOwnedChange', 5, 2);
            $table->float('percentStarted', 5, 2);
            $table->float('percentStartedChange', 5, 2);
            $table->smallInteger('depthChartOrder')->nullable();
            $table->smallInteger('numAdds')->nullable();
            $table->smallInteger('numDrops')->nullable();
            $table->float('averagePoints', 5, 2)->nullable();
            $table->float('seasonPoints', 5, 2)->nullable();
            $table->smallInteger('positionRank')->nullable();
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