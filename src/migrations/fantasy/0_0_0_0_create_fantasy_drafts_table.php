<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyDraftsTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_drafts";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('season_id');
            $table->boolean('complete');
            $table->tinyInteger('type');
            $table->longText('content')->comment('Draft Order and Historical Picks');
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