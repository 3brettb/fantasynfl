<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyDraftPicksTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_draft_picks";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('draft_id');
            $table->unsignedBigInteger('team_id')->comment('Team Place of Pick');
            $table->unsignedBigInteger('owner_id')->comment('Team Owner of Pick');
            $table->unsignedBigInteger('player_id')->nullable();
            $table->smallInteger('round')->nullable();
            $table->smallInteger('overall')->nullable();
            $table->tinyInteger('type');
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