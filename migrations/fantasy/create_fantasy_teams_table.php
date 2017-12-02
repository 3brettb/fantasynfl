<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyTeamsTable extends Migration
{
    // Define Table Name
    private $table_name = "fantasy_teams";
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('id', 20);
            $table->integer('league_id', 20)->unsigned();
            $table->integer('user_id', 20)->unsigned()->comment('Team Owner');
            $table->string('name', 30);
            $table->string('mascot', 30);
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